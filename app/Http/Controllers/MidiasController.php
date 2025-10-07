<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\TipoAnexos;
use App\Models\Anexos;

class MidiasController extends Controller
{
    public function __construct(Anexos $anexosMD, TipoAnexos $tipoAnexosMD) {
        $this->anexosMD = $anexosMD;
        $this->tipoAnexosMD = $tipoAnexosMD;
    }

    public function index(Request $req) {
        try{
            return view('midias');
        }catch(\Exception $err){
            dd($err);
        }        
    }

    public function store(Request $req, $tipo_anexo) {
        try{
            $extension = $req->file->extension();
            $hash_name = md5($req->file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $caminhosalvamento = ($tipo_anexo == 3 ? "imagens" : 'videos');
            $caminhoarquivo = 'anexos/'.$caminhosalvamento."/".$hash_name;
            
            Storage::disk('public_path')->put($caminhoarquivo, file_get_contents($req->file));

            $anexo = $this->anexosMD->create([
                'titulo' => $req->titulo,
                'descricao' => $req->descricao ?? 'texto',
                'caminho' => $caminhoarquivo,
                'tipo_anexos_id' => $tipo_anexo
            ]);

            return redirect()->back()->with('message', 'Mídia cadastrada com sucesso!');
        }catch(\Exception $err){
            dd($err);
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function update(Request $req, Anexos $midia) {
        try{
            $midia->update([
                'titulo' => $req->titulo,
                'descricao' => $req->descricao ?? 'texto',
            ]);

            return redirect()->back()->with('message', 'Mídia atualizada com sucesso!');
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function delete(Anexos $midia) {
        try{
            $midia->delete();

            return redirect()->back()->with('message', 'Mídia deletada com sucesso!');
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function index_by_type($tipo_anexo) {
        try{
            $midias = $this->anexosMD
                ->select('anexos.*')
                ->leftJoin('eventos as eve', 'eve.anexos_id', '=', 'anexos.id')
                ->leftJoin('estudos as est', 'est.anexos_id', '=', 'anexos.id')
                ->where('tipo_anexos_id', $tipo_anexo)
                ->whereNull('eve.id')
                ->whereNull('est.id')
                ->orderByDesc('id')
                ->paginate(6);
                
            if($tipo_anexo == '3')  $view = "imagens";
            else    $view = "videos";

            return view($view, [
                'midias' => $midias,
            ]);
        }catch(\Exception $err){
            dd($err);
        }   
    }
}
