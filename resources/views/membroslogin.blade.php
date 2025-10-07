@extends('layouts.master')
@section('master')
    <div class="container my-4">
        <div class="container-fluid text-white text-bold mb-3" style="background-color: #074F63">
            <div class="container d-flex flex-wrap align-items-center justify-content-between gap-2 custom-navbar">
                <a href="{{ url('/ibbb') }}" title="Voltar" class="btn btn-sm btn-dark border border-white" role="button"
                    data-bs-toggle="tooltip" data-bs-placement="top" aria-label="botão voltar">
                    <span class="text-bold">VOLTAR</span>
                </a>

                <h1 class="display-6 fw-bold text-center mx-auto my-2">LOGIN</h1>
            </div>
        </div>
        <div class="card">
            <div class="card-body bg-light">
                <form action="{{ route('log.auth') }}" method="post">
                    @csrf
                    <div class="row row-gap-2">
                        <div class="col-md-6">
                            <label for="user" class="required">CPF</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-user"></i></span>
                                <input type="text" id="user" name="user" class="form-control cpf_mask"
                                    placeholder="CPF" aria-label="User" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="required">Senha</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-user-lock"></i></span>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Senha" aria-label="Informe sua senha" required>
                                <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                    <i class="fa-solid fa-eye" id="eyeIcon"></i>
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

                <div class="mt-2 text-center">
                    <div class="links">
                        Esqueceu sua senha ou é seu primeiro acesso?
                    </div>
                    <div class="links">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#recuperarSenhaModal">Recupere ou Crie sua
                            senha aqui</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('log.recuperar_senha') }}" method="POST">
        @csrf
        <div class="modal fade" id="recuperarSenhaModal" tabindex="-1" role="dialog"
            aria-labelledby="recuperarSenhaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-bold" id="recuperarSenhaModalLabel">Recuperar Senha</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group mb-3">
                                <label for="cpf" class="required">CPF</label>
                                <input type="text" class="form-control cpf_mask" name="cpf" id="cpf" placeholder="000.000.000-00" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success border border-dark text-bold">Recuperar
                                    Senha</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
    
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash'); // Ícone de ocultar senha
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye'); // Ícone de mostrar senha
            }
        });
    </script>
@endsection
