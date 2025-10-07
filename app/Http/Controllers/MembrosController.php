<?php

namespace App\Http\Controllers;

use App\Models\TiposUsuarios;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class MembrosController extends Controller
{
    public function __construct(User $userMD, TiposUsuarios $tiposUsuariosMD) {
        $this->userMD = $userMD;
        $this->tiposUsuariosMD = $tiposUsuariosMD;
    }

    public function index(Request $req) {
        try{
            $users = $this->userMD
                ->orderBy('name')
                ->where(function($mysql) use ($req){
                    if(!$req->filter) return true;
                    $mysql->where('name', 'LIKE', '%'.$req->filter.'%');
                })
                ->paginate(10);
            $tiposUsuarios = $this->tiposUsuariosMD->where('status', true)->get();
            
            return view('listamembros', [
                'users' => $users,
                'tiposUsuarios' => $tiposUsuarios
            ]);
        }catch(\Exception $err){
            dd($err);
        }
    }

    public function create() {
        try{
            return view('cadastromembro');
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function store(Request $req) {
        try{
            if($this->userMD->where('cpf', $req->cpf)->orWhere('email', $req->email)->first()) return redirect()->back()->withErrors(['message' => 'CPF ou Email já cadastrado.']);

            $this->userMD->create([
                'name' => $req->nome,
                'email' => $req->email,
                'password' => bcrypt($req->senha),
                'cpf' => $req->cpf,
                'rg' => $req->rg,
                'telefone' => $req->celular,
                'nomepai' => $req->nomePai,
                'nomemae' => $req->nomeMae,
                'cep' => $req->cep,
                'rua' => $req->logradouro,
                'numeroendereco' => $req->numero,
                'bairro' => $req->bairro,
                'idade' => $req->idade,
                'anexos_id' => 1,
                'tipo_usuario_id' => $req->tipoUsuario
            ]);

            return redirect()->back()->with('message', 'Membro Cadastrado com Sucesso.');
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function esqueciSenha(Request $req) {
        try{
            $this->userMD->where('cpf', $req->cpf)->update([
                'password' => bcrypt('123Ibbb')
            ]);
            return response()->json(['message' => 'Usuário Encontrado, a senha foi alterada para: 123Ibbb'], 200);
        }catch(\Exception $err){
            return response()->json(['message' => $err->getMessage()], 400);
        }
    }

    public function edit(User $user) {
        try{
            $tiposUsuarios = $this->tiposUsuariosMD->where('status', true)->get();
            return view('fichamembroadm', [
                'user' => $user,
                'tiposUsuarios' => $tiposUsuarios
            ]);
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function update(Request $req, User $user) {
        try{
            $user->update([
                'name' => $req->nome,
                'email' => $req->email,
                'cpf' => $req->cpf,
                'rg' => $req->rg,
                'telefone' => $req->celular,
                'nomepai' => $req->nomePai,
                'nomemae' => $req->nomeMae,
                'rua' => $req->logradouro,
                'cep' => $req->cep,
                'numeroendereco' => $req->numero,
                'bairro' => $req->bairro,
                'idade' => $req->idade,
                'tipo_usuario_id' => $req->tipoUsuario ?? $user->tipo_usuario_id
            ]);

            return redirect()->back()->with('message', 'Usuario atualizado com sucesso.');
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function destroy(User $user) {
        try{
            $user->delete();

            return redirect()->back()->with('message', 'Usuario excluido com sucesso.');
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function meusdados() {
        try{
            $user = auth()->user();
            $tiposUsuarios = $this->tiposUsuariosMD->where('status', true)->get();

            return view('fichamembroadm', [
                'user' => $user,
                'tiposUsuarios' => $tiposUsuarios
            ]);
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function consulta_cep($cep) {
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");
        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['erro' => 'CEP não encontrado!'], 400);
        }
    }
}
