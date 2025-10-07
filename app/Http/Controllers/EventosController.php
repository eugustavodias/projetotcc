<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\TipoAnexos;
use App\Models\Eventos;
use App\Models\Anexos;
use App\Models\TiposEventos;

class EventosController extends Controller
{
    public function __construct(Eventos $eventosMD, Anexos $anexosMD, TipoAnexos $tipoAnexosMD, TiposEventos $tiposEventosMD) {
        $this->eventosMD = $eventosMD;
        $this->anexosMD = $anexosMD;
        $this->tipoAnexosMD = $tipoAnexosMD;
        $this->tiposEventosMD = $tiposEventosMD;
    }

    public function index(Request $req) {
        try{
            $eventos = $this->eventosMD->orderBy('tipos_eventos_id')->paginate(6);
            $tipos_eventos = $this->tiposEventosMD->where('status', true)->get();
            
            return view('eventos', [
                'eventos' => $eventos,
                'tipos_eventos' => $tipos_eventos
            ]);
        }catch(\Exception $err){
            dd($err->getMessage());
        }
    }

    public function store(Request $req) {
        try{
            if($req->dataInicial > $req->dataFinal) return redirect()->back()->withErrors(['message' => "Data Inicial não pode ser a maior que a Final."]);
            
            $anexo_id = 1;
            if($req->file){
                $extension = $req->file->extension();
                $hash_name = md5($req->file->getClientOriginalName() . strtotime("now")) . "." . $extension;
                $caminhoarquivo = 'anexos/imagens/'.$hash_name;
                Storage::disk('public_path')->put($caminhoarquivo, file_get_contents($req->file));

                $anexo = $this->anexosMD->create([
                    'titulo' => $req->tituloEvento,
                    'descricao' => $req->descricao ?? 'texto',
                    'caminho' => $caminhoarquivo,
                    'tipo_anexos_id' => 3
                ]);
                $anexo_id = $anexo->id;
            }

            $evento = $this->eventosMD->create([
                'titulo' => $req->tituloEvento,
                'descricao' => $req->descricao ?? 'Descricao',
                'data_inicio' => $req->dataInicial,
                'data_fim' => $req->dataFinal,
                'link' => $req->linkInscricao,
                'anexos_id' => $anexo_id,
                'tipos_eventos_id' => $req->statusEvento,
            ]);

            return redirect()->route('eventos.index')->with('message', 'Evento cadastrado com sucesso!');
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function update(Request $req, Eventos $evento) {
        try{
            if($req->dataInicial > $req->dataFinal) return redirect()->back()->withErrors(['message' => "Data Inicial não pode ser a maior que a Final."]);
            $anexo_id = $evento->anexos_id;

            if($req->file){
                $extension = $req->file->extension();
                $hash_name = md5($req->file->getClientOriginalName() . strtotime("now")) . "." . $extension;
                $caminhoarquivo = 'anexos/imagens/'.$hash_name;
                Storage::disk('public_path')->put($caminhoarquivo, file_get_contents($req->file));

                
                $anexo = $this->anexosMD->create([
                    'titulo' => $req->tituloEvento,
                    'descricao' => $req->descricao ?? 'texto',
                    'caminho' => $caminhoarquivo,
                    'tipo_anexos_id' => 3
                ]);
                $anexo_id = $anexo->id;
            }

            $evento->update([
                'titulo' => $req->tituloEvento,
                'descricao' => $req->descricao ?? 'Descricao',
                'data_inicio' => $req->dataInicial,
                'data_fim' => $req->dataFinal,
                'link' => $req->linkInscricao,
                'anexos_id' => $anexo_id,
                'tipos_eventos_id' => $req->statusEvento,
            ]);

            return redirect()->route('eventos.index')->with('message', 'Evento editado com sucesso!');
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function delete(Eventos $evento) {
        try{
            $evento->delete();

            return redirect()->route('eventos.index')->with('message', 'Evento excluido com sucesso!');
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }
}
