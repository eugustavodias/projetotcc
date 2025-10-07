@extends('layouts.master')
@section('master')
    <div class="container-fluid bg-dark text-light py-3">
        <div class="container d-flex align-items-center justify-content-between gap-1">
            <a @if(auth()->user()->tipo_usuario_id == 1) href="{{ route('painel.admin') }}" @else href="{{ route('painel.membro') }}" @endif title="Voltar" class="btn btn-sm btn-primary shadow" role="button"
                data-bs-toggle="tooltip" data-bs-placement="top" aria-label="botão voltar">
                <span>VOLTAR</span>
            </a>

            <h1 class="display-6 fw-bold text-center m-0 flex-grow-1">MEUS DADOS</h1>

            <a title="Cadastrar" class="btn btn-sm btn-primary shadow" role="button" data-bs-toggle="modal"
                data-bs-target="#editarModal" data-bs-placement="top" aria-label="botão editar">
                <span>EDITAR</span>
            </a>
        </div>
    </div>

    <div class="container my-5">
        <div class="card">
            <div class="card-body bg-light">
                <form>
                    <div class="mb-3">
                        <label for="nome" class="form-label">NOME</label>
                        <input type="text" class="form-control text-uppercase" readonly>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nomePai" class="form-label">NOME PAI</label>
                            <input type="text" class="form-control text-uppercase" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="nomeMae" class="form-label">NOME MÃE</label>
                            <input type="text" class="form-control text-uppercase" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="rg" class="form-label">RG</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="idade" class="form-label">IDADE</label>
                            <input type="number" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="cep" class="form-label">CEP</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="rua" class="form-label">RUA</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="col-md-2">
                            <label for="numero" class="form-label">Nº</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="bairro" class="form-label">BAIRRO</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">EMAIL</label>
                            <input type="email" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="telefone" class="form-label">TELEFONE</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="telefone" class="form-label">USUÁRIO</label>
                            <input type="text" class="form-control" id="user"
                                value="{{ isset($user->tipouser) ? $user->tipouser : 'Não definido' }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <form id="formDados" method="POST" action="{{ route('membros.update', $user) }}">
            @csrf @method('PUT')
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarModalLabel">Editar Dados</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nome" class="form-label">NOME</label>
                            <input name="nome" type="text" class="form-control text-uppercase" id="nome">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nomePai" class="form-label">NOME PAI</label>
                                <input name="nomePai" type="text" class="form-control text-uppercase" id="nomePai">
                            </div>
                            <div class="col-md-6">
                                <label for="nomeMae" class="form-label">NOME MÃE</label>
                                <input name="nomeMae" type="text" class="form-control text-uppercase" id="nomeMae">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="cpf" class="form-label">CPF</label>
                                <input name="cpf" type="text" class="form-control" id="cpf">
                            </div>
                            <div class="col-md-4">
                                <label for="rg" class="form-label">RG</label>
                                <input name="rg" type="text" class="form-control" id="rg">
                            </div>
                            <div class="col-md-4">
                                <label for="idade" class="form-label">IDADE</label>
                                <input name="idade" type="text" class="form-control" id="idade">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="cep" class="form-label">CEP</label>
                                <input name="cep" type="text" class="form-control" id="cep">
                            </div>
                            <div class="col-md-4">
                                <label for="rua" class="form-label">RUA</label>
                                <input name="logradouro" type="text" class="form-control" id="logradouro">
                            </div>
                            <div class="col-md-2">
                                <label for="numero" class="form-label">Nº</label>
                                <input name="numero" type="text" class="form-control" id="numero">
                            </div>
                            <div class="col-md-3">
                                <label for="bairro" class="form-label">BAIRRO</label>
                                <input name="bairro" type="text" class="form-control" id="bairro">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">EMAIL</label>
                                <input name="email" type="email" class="form-control" id="email">
                            </div>
                            <div class="col-md-6">
                                <label for="telefone" class="form-label">TELEFONE</label>
                                <input name="celular" type="text" class="form-control" id="celular">
                            </div>
                            <div class="col-md-12">
                                <label for="tipoUsuario" class="form-label">USUÁRIO</label>
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
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Editar dados</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
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
                        url: "{{ route('membros.consulta_cep') }}/"+cep,
                        headers: {
                             'Access-Control-Allow-Headers': '*',
                             'Access-Control-Allow-Origin': '*' 
                        },
                        success: function(data){
                            if (!data.erro) {
                                $('#logradouro').val(data.logradouro);
                                $('#bairro').val(data.bairro);
                            } else {
                                set_error_message('CEP não encontrado!');
                            }
                        },
                        error: function(data){
                            set_error_message('CEP não encontrado!');
                            console.log(data)
                        }
                    })
                } else {
                    set_error_message('CEP inválido!');
                }
            });
        });
    </script>
@endsection
