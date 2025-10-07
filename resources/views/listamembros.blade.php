@extends('layouts.master')
@section('master')
    <div class="container my-5">
        <div class="container my-5">
            <div class="container-fluid text-white text-bold mb-3" style="background-color: #074F63;">
                <div class="container d-flex align-items-center justify-content-between flex-wrap py-2">
                    <a href="{{ route('painel.admin') }}" title="Voltar"
                        class="btn btn-sm btn-dark border border-white fw-bold text-nowrap" role="button"
                        data-bs-toggle="tooltip" data-bs-placement="top" aria-label="botão voltar">
                        VOLTAR
                    </a>

                    <h1 class="display-6 fw-bold text-center flex-grow-1 m-0 text-md-center">
                        Membros
                    </h1>
                </div>
            </div>

            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                <form action="{{ route('membros.index') }}" method="GET" class="d-flex flex-grow-1">
                    <input class="form-control me-1 w-100" type="search" name="filter" placeholder="Pesquisar"
                        aria-label="Pesquisar" value="{{ request('filter') }}">
                    <button class="btn btn-outline-dark fw-bold border-dark text-nowrap w-50"
                        type="submit">Pesquisar</button>
                </form>

                <a title="Cadastrar"
                    class="btn btn-success border border-dark text-nowrap fw-bold w-100 w-md-auto mt-2 mt-md-0"
                    role="button" data-bs-toggle="modal" data-bs-target="#cadastrarcpf" data-bs-placement="top"
                    aria-label="botão cadastrar">
                    NOVO MEMBRO
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Nº</th>
                            <th scope="col" class="text-center">NOME MEMBRO</th>
                            <th scope="col" class="text-center">AÇÃO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td class="text-center">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td class="text-center gap-2">
                                    <a class="btn btn-info btn-sm me-2 mb-custom border border-dark"
                                        href="{{ route('membros.edit', $user->id) }}" title="Visualizar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffff"
                                            viewBox="0 0 256 256">
                                            <path
                                                d="M247.31,124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57,61.26,162.88,48,128,48S61.43,61.26,36.34,86.35C17.51,105.18,9,124,8.69,124.76a8,8,0,0,0,0,6.5c.35.79,8.82,19.57,27.65,38.4C61.43,194.74,93.12,208,128,208s66.57-13.26,91.66-38.34c18.83-18.83,27.3-37.61,27.65-38.4A8,8,0,0,0,247.31,124.76ZM128,192c-30.78,0-57.67-11.19-79.93-33.25A133.47,133.47,0,0,1,25,128,133.33,133.33,0,0,1,48.07,97.25C70.33,75.19,97.22,64,128,64s57.67,11.19,79.93,33.25A133.46,133.46,0,0,1,231.05,128C223.84,141.46,192.43,192,128,192Zm0-112a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Z">
                                            </path>
                                        </svg>
                                    </a>

                                    <a class="btn btn-danger btn-sm me-2 border border-dark"
                                        href="{{ route('membros.destroy', $user->id) }}" title="Excluir">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffff"
                                            viewBox="0 0 256 256">
                                            <path
                                                d="M216,48H168V40a16,16,0,0,0-16-16H104A16,16,0,0,0,88,40v8H40A16,16,0,0,0,24,64v8a8,8,0,0,0,8,8H224a8,8,0,0,0,8-8V64A16,16,0,0,0,216,48ZM104,40h48V48H104Zm96,56a8,8,0,0,0-8,8V200a16,16,0,0,1-16,16H80a16,16,0,0,1-16-16V104a8,8,0,0,0-16,0V200a32.09,32.09,0,0,0,32,32h96a32.09,32.09,0,0,0,32-32V104A8,8,0,0,0,200,96Zm-48,16a8,8,0,0,0-8,8v64a8,8,0,0,0,16,0V120A8,8,0,0,0,152,112ZM104,112a8,8,0,0,0-8,8v64a8,8,0,0,0,16,0V120A8,8,0,0,0,104,112Z">
                                            </path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    <h4 class="text-center text-danger">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                        MEMBROS NÃO LOCALIZADOS!
                                    </h4>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            {!! $users->links() !!}
        </div>

        <div class="modal fade" id="cadastrarcpf" tabindex="-1" aria-labelledby="cadastrocpfModalLabel" aria-hidden="true">
            <form id="formCPF" method="POST" action="{{ route('membros.store') }}">
                @csrf
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-bold" id="cadastrocpfModalLabel">Cadastrar novo membro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nome" class="form-label">NOME</label>
                                <input name="nome" type="text" class="form-control text-uppercase" id="nome"
                                    required>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nomePai" class="form-label">NOME PAI</label>
                                    <input name="nomePai" type="text" class="form-control text-uppercase" id="nomePai"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="nomeMae" class="form-label">NOME MÃE</label>
                                    <input name="nomeMae" type="text" class="form-control text-uppercase" id="nomeMae"
                                        required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="cpf" class="form-label">CPF</label>
                                    <input name="cpf" type="text" class="form-control cpfInput" id="cpf"
                                        required>
                                </div>
                                <div class="col-md-4">
                                    <label for="rg" class="form-label">RG</label>
                                    <input name="rg" type="text" class="form-control" id="rg" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="idade" class="form-label">IDADE</label>
                                    <input name="idade" type="text" class="form-control" id="idade" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="cep" class="form-label">CEP</label>
                                    <input name="cep" type="text" class="form-control" id="cep" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="rua" class="form-label">RUA</label>
                                    <input name="logradouro" type="text" class="form-control" id="logradouro"
                                        required>
                                </div>
                                <div class="col-md-3">
                                    <label for="numero" class="form-label">Nº</label>
                                    <input name="numero" type="text" class="form-control" id="numero" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="bairro" class="form-label">BAIRRO</label>
                                    <input name="bairro" type="text" class="form-control" id="bairro" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="email" class="form-label">EMAIL</label>
                                    <input name="email" type="email" class="form-control" id="email" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="telefone" class="form-label">TELEFONE</label>
                                    <input name="celular" type="text" class="form-control" id="celular" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="tipoUsuario" class="form-label">USUÁRIO</label>
                                    <select name="tipoUsuario" class="form-select" id="tipouser" required>
                                        <option hidden selected disabled>Selecione...</option>
                                        @foreach ($tiposUsuarios as $tipoUsuario)
                                            <option value="{{ $tipoUsuario->id }}">
                                                {{ $tipoUsuario->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" id="salvarCPF"
                                class="btn btn-success border border-dark text-bold">Cadastrar novo membro</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $(document).ready(function() {
            $("#celular").mask("(00) 0 0000-0000");
            $(".cpfInput").mask("000.000.000-00");
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
