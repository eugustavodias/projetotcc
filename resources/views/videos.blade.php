@extends('layouts.master')
@section('master')
    <div class="container mt-4">
        <div class="container-fluid text-white text-bold mb-3" style="background-color: #074F63">
            <div class="container d-flex flex-wrap align-items-center justify-content-between gap-2 custom-navbar">
                <a href="{{ route('midias.index') }}" title="Voltar" class="btn btn-sm btn-dark border border-white"
                    role="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="botão voltar">
                    <span class="text-bold">VOLTAR</span>
                </a>
                <h1 class="display-6 fw-bold text-center mx-auto my-2">VÍDEOS</h1>
            </div>
        </div>
        @if (auth()->check() && auth()->user()->tipo_usuario_id === 1)
        <div class="d-flex justify-content-end mb-3">
            <a title="Cadastrar" class="btn btn-sm btn-success border border-dark" role="button" data-bs-toggle="modal"
                data-bs-target="#modalCadastrarVideo" data-bs-placement="top" aria-label="botão cadastrar">
                <span class="text-bold">CADASTRAR VÍDEOS</span>
            </a>
        </div>
        @endif

        <div class="row g-4 mb-3">
            @forelse($midias as $midia)
                <div class="col-md-4 d-flex">
                    <div class="card h-100 w-100 border border-dark">
                        <video src="{{ asset($midia->caminho) }}" class="card-img-top" controls
                            style="height: 200px; object-fit: cover;"></video>
                        <div class="card-body d-flex flex-column justify-content-between text-center">
                            <h6 class="card-text">{{ $midia->titulo }}</h6>
                            <p class="text-muted">{{ $midia->descricao }}</p>
                            @if (auth()->check() && auth()->user()->tipo_usuario_id === 1)
                            <hr>
                            <div class="d-flex flex-row justify-content-center">
                                <a class="btn btn-primary btn-sm me-2 border border-dark" href="#" title="Editar"
                                    data-bs-toggle="modal" data-bs-target="{{ '#modalEditarVideo' . $midia->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffff"
                                        viewBox="0 0 256 256">
                                        <path
                                            d="M227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H216a8,8,0,0,0,0-16H115.32l112-112A16,16,0,0,0,227.32,73.37ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.69,147.32,64l24-24L216,84.69Z">
                                        </path>
                                    </svg>
                                </a>

                                <form action="{{ route('midias.delete', $midia->id) }}" method="post">
                                    @csrf @method('delete')
                                    <button type="submit" title="Excluir"
                                        class="btn btn-danger btn-sm me-2 border border-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffff"
                                            viewBox="0 0 256 256">
                                            <path
                                                d="M216,48H168V40a16,16,0,0,0-16-16H104A16,16,0,0,0,88,40v8H40A16,16,0,0,0,24,64v8a8,8,0,0,0,8,8H224a8,8,0,0,0,8-8V64A16,16,0,0,0,216,48ZM104,40h48V48H104Zm96,56a8,8,0,0,0-8,8V200a16,16,0,0,1-16,16H80a16,16,0,0,1-16-16V104a8,8,0,0,0-16,0V200a32.09,32.09,0,0,0,32,32h96a32.09,32.09,0,0,0,32-32V104A8,8,0,0,0,200,96Zm-48,16a8,8,0,0,0-8,8v64a8,8,0,0,0,16,0V120A8,8,0,0,0,152,112ZM104,112a8,8,0,0,0-8,8v64a8,8,0,0,0,16,0V120A8,8,0,0,0,104,112Z">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            @endif

                            <div class="modal fade" id="{{ 'modalEditarVideo' . $midia->id }}" tabindex="-1"
                                aria-labelledby="modalEditarVideoLabel" aria-hidden="true">
                                <form action="{{ route('midias.update', $midia->id) }}" method="post">
                                    @csrf @method('PUT')
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-bold" id="modalEditarVideoLabel">Editar Vídeo
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="formEditarVideo">
                                                    <div class="mb-3">
                                                        <label for="editarTituloVideo" class="form-label">Título</label>
                                                        <input value="{{ $midia->titulo }}" name="titulo" type="text"
                                                            class="form-control" id="editarTituloVideo"
                                                            placeholder="Digite o título" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editarDescricaoVideo"
                                                            class="form-label">Descrição</label>
                                                        <textarea name="descricao" class="form-control" id="editarDescricaoVideo" rows="3"
                                                            placeholder="Digite a descrição" required>{{ $midia->descricao }}</textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="submit" id="salvarEdicaoVideo"
                                                    class="btn btn-success border border-dark text-bold">Salvar
                                                    Alterações</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <tr>
                    <td colspan="3">
                        <h4 class="text-center text-danger">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            NÃO HÁ VÍDEOS DISPONÍVEIS!
                        </h4>
                    </td>
                </tr>
            @endforelse
        </div>
        {!! $midias->links() !!}

        <div class="modal fade" id="modalCadastrarVideo" tabindex="-1" aria-labelledby="modalCadastrarVideoLabel"
            aria-hidden="true">
            <form action="{{ route('midias.store', 4) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-bold" id="modalCadastrarVideoLabel">Cadastrar Novo Vídeo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="tituloVideo" class="form-label">Título</label>
                                <input name="titulo" type="text" class="form-control" id="tituloVideo"
                                    placeholder="Digite o título" required>
                            </div>
                            <div class="mb-3">
                                <label for="descricaoVideo" class="form-label">Descrição</label>
                                <textarea name="descricao" class="form-control" id="descricaoVideo" rows="3" placeholder="Digite a descrição"
                                    required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="arquivoVideo" class="form-label">Adicionar Vídeo</label>
                                <input name="file" type="file" class="form-control" id="arquivoVideo"
                                    accept="video/*" required>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" id="salvarVideo"
                                class="btn btn-success border border-dark text-bold">Cadastrar Vídeo</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
