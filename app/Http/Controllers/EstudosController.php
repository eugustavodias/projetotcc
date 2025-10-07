<?php

namespace App\Http\Controllers;

use App\Models\Anexos;
use App\Models\Estudos;
use App\Models\TipoAnexos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EstudosController extends Controller
{
    public function __construct(private Anexos $anexosMD, private TipoAnexos $tipoAnexosMD, private Estudos $estudosMD) {
        $this->anexosMD = $anexosMD;
        $this->tipoAnexosMD = $tipoAnexosMD;
        $this->estudosMD = $estudosMD;
    }

    public function index(Request $req) {
        try{
            $estudos = $this->estudosMD->latest()->paginate(6);
            $tipos_anexos = $this->tipoAnexosMD->where('id', '<>', 1)->get();

            return view('estudos', [
                'estudos' => $estudos,
                'tipos_anexos' => $tipos_anexos
            ]);
        }catch(\Exception $err){
            dd($err);
        }        
    }

    public function store(Request $req) {
        try{
            if(!$req->thumb_file) return redirect()->back()->with('message', 'Arquivos devem ser enviados!');

            $extension = $req->thumb_file->extension();
            $hash_name = md5($req->thumb_file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $caminhoarquivo = 'anexos/imagens/'.$hash_name;
            Storage::disk('public_path')->put($caminhoarquivo, file_get_contents($req->thumb_file));

            $anexo = $this->anexosMD->create([
                'titulo' => $req->titulo,
                'descricao' => $req->titulo,
                'caminho' => $caminhoarquivo,
                'tipo_anexos_id' => 3
            ]);
            
            $this->estudosMD->create([
                'nome' => $req->titulo,
                'data' => date('Y-m-d'),
                'link' => $req->link,
                'anexos_id' => $anexo->id,
            ]);

            return redirect()->route('estudos.index')->with('message', 'Estudo cadastrado com sucesso!');
        }catch(\Exception $err){
            dd($err);
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function update(Request $req, Estudos $estudo) {
        try{
            $anexo_id = $estudo->anexos_id;
            if($req->anexo_thumb){
                $extension = $req->anexo_thumb->extension();
                $hash_name = md5($req->anexo_thumb->getClientOriginalName() . strtotime("now")) . "." . $extension;
                $caminhoarquivo = 'anexos/imagens/'.$hash_name;
                Storage::disk('public_path')->put($caminhoarquivo, file_get_contents($req->anexo_thumb));
    
                $anexo = $this->anexosMD->create([
                    'titulo' => $req->titulo,
                    'descricao' => $req->titulo,
                    'caminho' => $caminhoarquivo,
                    'tipo_anexos_id' => 3
                ]);
                $anexo_id = $anexo->id;
            }
            
            $estudo->update([
                'nome' => $req->titulo,
                'data' => date('Y-m-d'),
                'link' => $req->url,
                'anexos_id' => $anexo_id,
            ]);

            return redirect()->route('estudos.index')->with('message', 'Estudo atualizado com sucesso!');
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function delete(Estudos $estudo) {
        try{
            $estudo->delete();

            return redirect()->back()->with('message', 'Estudo deletado com sucesso!');
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }
}
