@extends('layouts.master')
@section('master')
    <div class="container my-4">
        <div class="container-fluid text-white text-bold mb-3" style="background-color: #074F63">
            <div class="container d-flex flex-wrap align-items-center justify-content-between gap-2 custom-navbar">
                <a @if (auth()->user()->tipo_usuario_id == 1) href="{{ route('painel.admin') }}" @else href="{{ route('painel.membro') }}" @endif
                    title="Voltar" class="btn btn-sm btn-dark border border-white" role="button" data-bs-toggle="tooltip"
                    data-bs-placement="top" aria-label="botão voltar">
                    <span class="text-bold">VOLTAR</span>
                </a>

                <h1 class="display-6 fw-bold text-center mx-auto my-2">FICHA MEMBRO</h1>
            </div>
        </div>
        <div class="d-flex justify-content-end mb-3">
            <a title="Cadastrar" class="btn btn-sm btn-success border border-dark" role="button" data-bs-toggle="modal"
                data-bs-target="#editardados" data-bs-placement="top" aria-label="botão editar">
                <span class="text-bold">EDITAR</span>
            </a>
        </div>

        <div class="card">
            <div class="card-body bg-light">
                <form>
                    <div class="mb-3">
                        <label for="nome" class="form-label">NOME</label>
                        <input type="text" class="form-control text-uppercase" value="{{ $user->name }}" readonly>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nomePai" class="form-label">NOME PAI</label>
                            <input type="text" class="form-control text-uppercase" value="{{ $user->nomepai }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="nomeMae" class="form-label">NOME MÃE</label>
                            <input type="text" class="form-control text-uppercase" value="{{ $user->nomemae }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="cpf" value="{{ $user->cpf }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="rg" class="form-label">RG</label>
                            <input type="text" class="form-control" id="rg" value="{{ $user->rg }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="idade" class="form-label">IDADE</label>
                            <input type="number" class="form-control" id="idade" value="{{ $user->idade }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 col-lg-2">
                            <label for="cep" class="form-label">CEP</label>
                            <input type="text" class="form-control"
                                value="{{ isset($user->cep) ? $user->cep : 'Não tá trazendo' }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="rua" class="form-label">RUA</label>
                            <input type="text" class="form-control" value="{{ $user->rua }}" readonly>
                        </div>
                        <div class="col-md-4 col-lg-2">
                            <label for="numero" class="form-label">Nº</label>
                            <input type="text" class="form-control" value="{{ $user->numeroendereco }}" readonly>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <label for="bairro" class="form-label">BAIRRO</label>
                            <input type="text" class="form-control" value="{{ $user->bairro }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">EMAIL</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" readonly>

                        </div>
                        <div class="col-md-3">
                            <label for="telefone" class="form-label">TELEFONE</label>
                            <input type="text" class="form-control" id="celular" value="{{ $user->telefone }}"
                                readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="telefone" class="form-label">USUÁRIO</label>
                            <select name="tipoUsuario" @disabled(auth()->check()) class="form-select" id="tipouser"
                                required>
                                @foreach ($tiposUsuarios as $tipoUsuario)
                                    <option value="{{ $tipoUsuario->id }}" @selected(isset($user) && $user->tipo_usuario_id == $tipoUsuario->id)>
                                        {{ $tipoUsuario->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editardados" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <form id="formDados" method="POST" action="{{ route('membros.update', $user) }}">
            @csrf @method('PUT')
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-bold" id="editarModalLabel">Editar Dados</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div>
                                <label for="nome" class="form-label">NOME</label>
                                <input name="nome" type="text" class="form-control text-uppercase" id="nome"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <label for="nomePai" class="form-label">NOME PAI</label>
                                <input name="nomePai" type="text" class="form-control text-uppercase" id="nomePai"
                                    value="{{ $user->nomepai }}">
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <label for="nomeMae" class="form-label">NOME MÃE</label>
                                <input name="nomeMae" type="text" class="form-control text-uppercase" id="nomeMae"
                                    value="{{ $user->nomemae }}">
                            </div>
                            <div class="col-md-4">
                                <label for="cpf" class="form-label">CPF</label>
                                <input name="cpf" type="text" class="form-control" id="#cpf"
                                    value="{{ $user->cpf }}">
                            </div>
                            <div class="col-md-4">
                                <label for="rg" class="form-label">RG</label>
                                <input name="rg" type="text" class="form-control" id="rg"
                                    value="{{ $user->rg }}">
                            </div>
                            <div class="col-md-4">
                                <label for="idade" class="form-label">IDADE</label>
                                <input name="idade" type="text" class="form-control" id="idade"
                                    value="{{ $user->idade }}">
                            </div>
                            <div class="col-md-4 col-lg-3">
                                <label for="cep" class="form-label">CEP</label>
                                <input name="cep" type="text" class="form-control" id="cep"
                                    value="{{ isset($user->cep) ? $user->cep : 'Não tá trazendo' }}">
                            </div>
                            <div class="col-md-8 col-lg-6">
                                <label for="rua" class="form-label">RUA</label>
                                <input name="logradouro" type="text" class="form-control" id="logradouro"
                                    value="{{ $user->rua }}">
                            </div>
                            <div class="col-md-4 col-lg-3 mb-2">
                                <label for="numero" class="form-label">Nº</label>
                                <input name="numero" type="text" class="form-control" id="numero"
                                    value="{{ $user->numeroendereco }}">
                            </div>
                            <div class="col-md-8 col-lg-6">
                                <label for="bairro" class="form-label">BAIRRO</label>
                                <input name="bairro" type="text" class="form-control" id="bairro"
                                    value="{{ $user->bairro }}">
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <label for="email" class="form-label">EMAIL</label>
                                <input name="email" type="email" class="form-control" id="email"
                                    value="{{ $user->email }}">
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label for="telefone" class="form-label">TELEFONE</label>
                                <input name="celular" type="text" class="form-control" id="celular"
                                    value="{{ $user->telefone }}">
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label for="telefone" class="form-label">USUÁRIO</label>
                                <select name="tipoUsuario" class="form-select" id="tipouser" required
                                    @disabled(auth()->user()->id == 2)>
                                    @foreach ($tiposUsuarios as $tipoUsuario)
                                        <option value="{{ $tipoUsuario->id }}" @selected(isset($user) && $user->tipo_usuario_id == $tipoUsuario->id)>
                                            {{ $tipoUsuario->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-success border border-dark text-bold">Editar dados</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#celular").mask("(00) 0 0000-0000");
            $("#cpf").mask("000.000.000-00");
            $("#rg").mask("0000000000");
            $("#idade").mask("00");

            $('#cep').on('input', function() {
                const cep = $(this).val().replace(/\D/g, '');
                $(this).val(cep.replace(/^(\d{5})(\d{3})$/, '$1-$2'));
            });

            $('#cep').on('blur', function() {
                const cep = $(this).val().replace(/\D/g, '');
                if (cep.length === 8) {
                    $.ajax({
                        type: 'GET',
                        url: "{{ route('membros.consulta_cep') }}/" + cep,
                        headers: {
                            'Access-Control-Allow-Headers': '*',
                            'Access-Control-Allow-Origin': '*'
                        },
                        success: function(data) {
                            if (!data.erro) {
                                $('#logradouro').val(data.logradouro);
                                $('#bairro').val(data.bairro);
                            } else {
                                set_error_message('CEP não encontrado!');
                            }
                        },
                        error: function(data) {
                            set_error_message('CEP não encontrado!');
                        }
                    })
                } else {
                    set_error_message('CEP inválido!');
                }
            });
        });
    </script>
@endsection
