<?php

namespace App\Http\Controllers;

use App\Models\Anexos;
use App\Models\Financeiro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FinanceiroController extends Controller
{
    public function __construct(Financeiro $financeiroMD, Anexos $anexosMD) {
        $this->financeiroMD = $financeiroMD;
        $this->anexosMD = $anexosMD;
    }

    public function index() {
        try{
            $financeiros = $this->financeiroMD->orderBy('data', 'desc')->paginate(10);

            return view('financeiro', [
                'financeiros' => $financeiros
            ]);
        }catch(\Exception $err){
            dd($err);
        }
    }

    public function store(Request $req) {
        try{
            if(!$req->file) return redirect()->back()->withErrors(['message' => 'Arquivo é necessário para salvar.']);

            $extension = $req->file->extension();
            $hash_name = md5($req->file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $caminhoarquivo = 'anexos/documentos/'.$hash_name;
            
            $anexo = $this->anexosMD->create([
                'titulo' => $req->nome,
                'descricao' => $req->nome ?? 'Relatório Financeiro',
                'caminho' => $caminhoarquivo,
                'tipo_anexos_id' => 2
            ]);

            $this->financeiroMD->create([
                'nome' => $req->nome,
                'data' => $req->data,
                'anexo_id' => $anexo->id
            ]);
            Storage::disk('public_path')->put($caminhoarquivo, file_get_contents($req->file));

            return redirect()->back()->withErrors(['message' => 'Documento financeiro salvo com sucesso.']);
        }catch(\Exception $err){
            dd('para', $err);
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function delete(Financeiro $financeiro) {
        try{
            $financeiro->delete();

            return redirect()->back()->withErrors(['message' => 'Documento financeiro excluido com sucesso.']);
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function download(Financeiro $financeiro) {
        try{
            $anexo = $this->anexosMD->find($financeiro->anexo_id);

            return Storage::disk('public_path')->download($anexo->caminho, $anexo->titulo.substr($anexo->caminho, strpos($anexo->caminho, '.')));
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }
}
