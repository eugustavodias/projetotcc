@extends('layouts.master')
@section('master')
    <div class="container my-5">
        <div class="container-fluid text-white text-bold mb-3" style="background-color: #074F63">
            <div class="container d-flex flex-wrap align-items-center justify-content-between gap-2 custom-navbar">
                <a @if (auth()->user()->tipo_usuario_id == 1) href="{{ route('painel.admin') }}" @else href="{{ route('painel.membro') }}" @endif
                    title="Voltar" class="btn btn-sm btn-dark border border-white" role="button" data-bs-toggle="tooltip"
                    data-bs-placement="top" aria-label="botão voltar">
                    <span class="text-bold">VOLTAR</span>
                </a>

                <h1 class="display-6 fw-bold text-center mx-auto my-2">FINANCEIRO</h1>
            </div>
        </div>
        @if(auth()->user()->tipo_usuario_id == 1)
            <div class="d-flex justify-content-end mb-3">
                <a title="Cadastrar" class="btn btn-sm btn-success border border-dark" role="button" data-bs-toggle="modal"
                    data-bs-target="#cadastrarFinanceiro" data-bs-placement="top" aria-label="botão cadastrar">
                    <span class="text-bold">CADASTRAR RELATÓRIO</span>
                </a>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-sm table-bordered align-middle">
                <thead>
                    <tr>
                        <th scope="col" class="text-center" style="width: 20%">DATA</th>
                        <th scope="col" class="text-center">RELATÓRIO</th>
                        <th scope="col" class="text-center" style="width: 10%">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($financeiros as $financeiro)
                        <tr>
                            <td class="text-center">{{ dataFormat($financeiro->data) }}</td>
                            <td>{{ $financeiro->nome }}</td>
                            <td class="d-flex flex-row justify-content-center">
                                <div>
                                    <a class="btn btn-info btn-sm me-2 mb-custom border border-dark"
                                        href="{{ route('financeiros.download', $financeiro->id) }}" title="Baixar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff"
                                            viewBox="0 0 256 256">
                                            <path
                                                d="M228,144v64a12,12,0,0,1-12,12H40a12,12,0,0,1-12-12V144a12,12,0,0,1,24,0v52H204V144a12,12,0,0,1,24,0Zm-108.49,8.49a12,12,0,0,0,17,0l40-40a12,12,0,0,0-17-17L140,115V32a12,12,0,0,0-24,0v83L96.49,95.51a12,12,0,0,0-17,17Z">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                                @if(auth()->user()->tipo_usuario_id == 1)
                                <div>
                                    <form action="{{ route('financeiros.delete', $financeiro->id) }}" method="post">
                                        @csrf @method('DELETE')
                                        <button type="submit" title="Excluir Financeiro"
                                            class="btn btn-sm btn-danger border border-dark" role="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="#ffff" viewBox="0 0 256 256">
                                                <path
                                                    d="M216,48H168V40a16,16,0,0,0-16-16H104A16,16,0,0,0,88,40v8H40A16,16,0,0,0,24,64v8a8,8,0,0,0,8,8H224a8,8,0,0,0,8-8V64A16,16,0,0,0,216,48ZM104,40h48V48H104Zm96,56a8,8,0,0,0-8,8V200a16,16,0,0,1-16,16H80a16,16,0,0,1-16-16V104a8,8,0,0,0-16,0V200a32.09,32.09,0,0,0,32,32h96a32.09,32.09,0,0,0,32-32V104A8,8,0,0,0,200,96Zm-48,16a8,8,0,0,0-8,8v64a8,8,0,0,0,16,0V120A8,8,0,0,0,152,112ZM104,112a8,8,0,0,0-8,8v64a8,8,0,0,0,16,0V120A8,8,0,0,0,104,112Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <h3 class="text-center text-danger">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    NENHUM RELATÓRIO CADASTRADO!
                                </h3>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {!! $financeiros->links() !!}
    </div>

    <div class="modal fade" id="cadastrarFinanceiro" tabindex="-1" aria-labelledby="cadastrarFinanceiroLabel"
        aria-hidden="true">
        <form action="{{ route('financeiros.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-bold" id="cadastrarFinanceiroLabel">Cadastrar Relatório Financeiro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formFinanceiro">
                            <div class="mb-3">
                                <label for="dataArquivo" class="form-label">Data</label>
                                <input name="data" type="date" class="form-control" id="dataArquivo" required>
                            </div>

                            <div class="mb-3">
                                <label for="nomeArquivo" class="form-label">Nome do relatório</label>
                                <input name="nome" type="text" class="form-control" id="nomeArquivo"
                                    placeholder="Digite o nome do relatório" required>
                            </div>

                            <div class="mb-3">
                                <label for="adicionarArquivo" class="form-label">Adicionar Arquivo</label>
                                <input name="file" type="file" class="form-control" id="adicionarArquivo" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-success border border-dark text-bold"
                            id="salvarFinanceiro">Cadastrar Relatório</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
