<?php

namespace App\Http\Controllers;

use App\Models\Anexos;
use App\Models\Cultos;
use App\Models\Eventos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CultosController extends Controller
{
    public function __construct(Anexos $anexosMD, Eventos $eventosMD, Cultos $cultosMD) {
        $this->anexosMD = $anexosMD;
        $this->eventosMD = $eventosMD;
        $this->cultosMD = $cultosMD;
    }

    public function index(Request $req) {
        try {
            $cultos = $this->cultosMD
                ->orderByDesc('data')
                ->paginate(6);
            foreach ($cultos as $culto) {
                preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/]+\/\S+\/|(?:v|e(?:mbed)?)\/|(?:.*[?&]v=))|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $culto->link, $matches);
                $videoId = $matches[1] ?? null;
    
                $culto->thumb = $videoId ? "https://img.youtube.com/vi/{$videoId}/mqdefault.jpg" : null;
               
                $culto->embed = $videoId ? "https://www.youtube.com/embed/{$videoId}" : null;
            }
    
            return view('cultosgravados', ['cultos' => $cultos]);
    
        } catch (\Exception $err) {
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function store(Request $req) {
        try {
            $this->cultosMD->create([
                'nome' => $req->titulo,
                'descricao' => $req->descricao,
                'data' => $req->datagravacao,
                'link' => $req->link_video
            ]);
    
            return redirect()->back()->with('message', 'Culto salvo com sucesso.');
        } catch (\Exception $err) {
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function update(Request $req, Cultos $culto) {
        try{
            $culto->update([
                'nome' => $req->titulo,
                'link' => $req->link_video
            ]);

            return redirect()->back()->withErrors(['message' => 'Culto atualizado com sucesso.']);
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function delete(Cultos $culto) {
        try{
            $culto->delete();

            return redirect()->back()->withErrors(['message' => 'Culto excluido com sucesso.']);
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }
}
