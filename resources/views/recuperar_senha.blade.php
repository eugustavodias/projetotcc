@extends('layouts.master')
@section('master')
    <div class="container my-5">
        <div class="container-fluid text-white text-bold mb-3" style="background-color: #074F63">
            <div class="container d-flex align-items-center justify-content-between gap-1">
                <a href="{{ url('/ibbb') }}" title="Voltar" class="btn btn-sm btn-dark border border-white" role="button"
                    data-bs-toggle="tooltip" data-bs-placement="top" aria-label="botão voltar">
                    <span class="text-bold">VOLTAR</span>
                </a>

                <h1 class="display-6 fw-bold text-center m-0 flex-grow-1">RECUPERAR SENHA</h1>
            </div>
        </div>
        <div class="card">
            <div class="card-body bg-light">
                <form action="{{ route('log.update_password', $user) }}" method="post">
                    @csrf @method('PUT')
                    <div class="row row-gap-2">
                    <div class="col-md-6">
                            <label for="password" class="required">Senha</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i
                                        class="fa-solid fa-user-lock"></i></span>
                                <input type="password" id="password1" name="password" class="form-control"
                                    placeholder="Senha" aria-label="Informe sua senha" required>
                                <span class="input-group-text" id="togglePassword1" style="cursor: pointer;">
                                    <i class="fa-solid fa-eye" id="eyeIcon1"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="required">Repetir Senha</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i
                                        class="fa-solid fa-user-lock"></i></span>
                                <input type="password" id="password2" name="repeat_password" class="form-control"
                                    placeholder="Senha" aria-label="Informe sua senha" required>
                                <span class="input-group-text" id="togglePassword2" style="cursor: pointer;">
                                    <i class="fa-solid fa-eye" id="eyeIcon2"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center p-4">
                            <button type="submit" class="btn btn-success float-end border border-dark text-bold"
                                style="width: 200px">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                Entrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var passwordInput1 = document.getElementById('password1');
            var passwordInput2 = document.getElementById('password2');
            var togglePassword1 = document.getElementById('togglePassword1');
            var togglePassword2 = document.getElementById('togglePassword2');
            var eyeIcon1 = document.getElementById('eyeIcon1');
            var eyeIcon2 = document.getElementById('eyeIcon2');
            var eye1 = false;
            var eye2 = false;

            togglePassword1.addEventListener('click', function() {
                const type = passwordInput1.type === 'password' ? 'text' : 'password';
                passwordInput1.type = type;

                if(eye1){
                    eyeIcon1.classList.remove('fa-eye-slash');
                    eyeIcon1.classList.add('fa-eye');
                }else{
                    eyeIcon1.classList.remove('fa-eye');
                    eyeIcon1.classList.add('fa-eye-slash');
                }
                eye1 = !eye1;
            });

            togglePassword2.addEventListener('click', function() {
                const type = passwordInput2.type === 'password' ? 'text' : 'password';
                passwordInput2.type = type;

                if(eye2){
                    eyeIcon2.classList.remove('fa-eye-slash');
                    eyeIcon2.classList.toggle('fa-eye');
                }else{
                    eyeIcon2.classList.remove('fa-eye');
                    eyeIcon2.classList.toggle('fa-eye-slash');
                }
                eye2 = !eye2;
            });

            passwordInput2.addEventListener("input", function(el){
                if(!(passwordInput1.value === passwordInput2.value))
                    console.log('testa ai depois man')
            })
        });
    </script>
@endsection
