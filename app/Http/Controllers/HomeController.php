<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(User $userMD) {
        $this->userMD = $userMD;
    }

    public function login() {
        try{
            return view('membroslogin');
        }catch(\Exception $err){
            dd($err);
            return redirect()->route('log.in')->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function recuperar_senha(Request $req) {
        try{
            $user = $this->userMD->where('cpf', cpf_only_numbers($req->cpf))->first();
            if(!$user) return redirect()->route('log.in')->withErrors(['message' => "Usuário não encontrado, verifique se o CPF está correto."]);
            
            return view('recuperar_senha', [
                'user' => $user
            ]);
        }catch(\Exception $err){
            dd($err);
            return redirect()->route('log.in')->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function update_password(Request $req, User $user) {
        try{
            if(!$user) return redirect()->route('log.in')->withErrors(['message' => "Usuário não encontrado."]);
            if($req->password !== $req->repeat_password) return redirect()->back()->withErrors(['message' => "Senhas com incovergencias."])->withInputs();
            $user->update([
                'password' => bcrypt($req->password)
            ]);

            return redirect()->route('log.in')->withErrors(['message' => 'Senha atualizada com sucesso.']);
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function authentication(Request $req) {
        try{
            if(auth()->attempt(['cpf' => cpf_only_numbers($req->user), 'password' => $req->password])){
                if(auth()->user()->tipo_usuario_id == 1)    return redirect()->route('painel.admin');
                else    return redirect()->route('painel.membro');
            }

            return redirect()->back()->withErrors(['message' => 'CPF ou Senha incorreta!']);
        }catch(\Exception $err){
            return redirect()->back()->withErrors(['message' => $err->getMessage()]);
        }
    }

    public function logout(Request $req) {
        auth()->logout();
        foreach($req->cookie() as $key => $cookie){
            cookie()->forget($key);
        }

        return redirect()->route('ibbb');
    }
}
