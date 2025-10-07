@extends('layouts.master')
@section('master')
    <div class="container mt-4">
        <div class="container-fluid text-white text-bold mb-3" style="background-color: #074F63">
            <div class="container d-flex flex-wrap align-items-center justify-content-between gap-2 custom-navbar">
                <a href="{{ route('midias.index') }}" title="Voltar" class="btn btn-sm btn-dark border border-white"
                    role="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="botão voltar">
                    <span class="text-bold">VOLTAR</span>
                </a>
                <h1 class="display-6 fw-bold text-center mx-auto my-2">IMAGENS</h1>
            </div>
        </div>
        @if (auth()->check() && auth()->user()->tipo_usuario_id === 1)
            <div class="d-flex justify-content-end mb-3">
                <a title="Cadastrar" class="btn btn-sm btn-success border border-dark" role="button" data-bs-toggle="modal"
                    data-bs-target="#cadastrarImagem" data-bs-placement="top" aria-label="botão cadastrar">
                    <span class="text-bold">CADASTRAR IMAGENS</span>
                </a>
            </div>
        @endif

        <div class="row g-4">
            @forelse ($midias as $midia)
                <div class="col-md-4 d-flex">
                    <div class="card mb-4 shadow-sm border border-dark w-100">
                        <div class="d-flex align-items-center justify-content-center overflow-hidden" style="height: auto;">
                            <img src="{{ asset($midia->caminho) }}" class="card-img-top" alt="Bowser">
                            <a href="{{ asset($midia->caminho) }}" download="Bowser"
                                class="position-absolute top-50 start-50 translate-middle text-center download-icon"
                                target="_blank" title="Baixar Imagem">
                                <svg xmlns="http://www.w3.org/2000/svg" width="52" height="52" fill="#ffffff"
                                    viewBox="0 0 256 256">
                                    <path
                                        d="M220,144v64a4,4,0,0,1-4,4H40a4,4,0,0,1-4-4V144a4,4,0,0,1,8,0v60H212V144a4,4,0,0,1,8,0Zm-94.83,2.83a4,4,0,0,0,5.66,0l40-40a4,4,0,1,0-5.66-5.66L132,134.34V32a4,4,0,0,0-8,0V134.34L90.83,101.17a4,4,0,0,0-5.66,5.66Z">
                                    </path>
                                </svg>
                            </a>
                        </div>

                        <div class="card-body d-flex flex-column justify-content-between text-center">
                            <h5 class="card-text text-center">{{ $midia->titulo }}</h5>
                            <p class="card-text mb-2 text-center">{{ $midia->descricao }}</p>
                            @if (auth()->check() && auth()->user()->tipo_usuario_id === 1)
                            <hr>
                            <div class="d-flex flex-row justify-content-center">
                                <a class="btn btn-primary btn-sm me-2 border border-dark" href="#" title="Editar"
                                    data-bs-toggle="modal" data-bs-target="{{ '#editarImagem' . $midia->id }}">
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
                        </div>
                        <div class="modal fade" id="{{ 'editarImagem' . $midia->id }}" tabindex="-1"
                            aria-labelledby="editarImagemLabel" aria-hidden="true">
                            <form action="{{ route('midias.update', $midia->id) }}" method="post">
                                @csrf @method('PUT')
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-bold" id="editarImagemLabel">Editar Imagem</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formEditarImagem">
                                                <div class="mb-3">
                                                    <label for="titulo" class="form-label">Título</label>
                                                    <input name="titulo" value="{{ $midia->titulo }}" type="text"
                                                        class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="descricao" class="form-label">Descrição</label>
                                                    <textarea name="descricao" class="form-control" rows="3" required>{{ $midia->descricao }}</textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="submit"
                                                class="btn btn-success border border-dark text-bold">Salvar
                                                Alterações</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <tr>
                    <td colspan="3">
                        <h4 class="text-center text-danger">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            NÃO HÁ IMAGENS DISPONÍVEIS!
                        </h4>
                    </td>
                </tr>
            @endforelse
        </div>
        {!! $midias->links() !!}

        <div class="modal fade" id="cadastrarImagem" tabindex="-1" aria-labelledby="cadastrarImagemLabel"
            aria-hidden="true">
            <form action="{{ route('midias.store', 3) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-bold" id="cadastrarImagemLabel">Cadastrar Nova Imagem</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="tituloImagem" class="form-label">Título</label>
                                <input name="titulo" type="text" class="form-control" placeholder="Digite o título"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="arquivoImagem" class="form-label">Adicionar Imagem</label>
                                <input name="file" type="file" class="form-control" accept="image/*" required>
                            </div>
                            <div class="mb-3">
                                <label for="descricaoImagem" class="form-label">Descrição</label>
                                <textarea name="descricao" class="form-control" rows="3" placeholder="Digite a descrição" required></textarea>
                            </div>
            </form>
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-success border border-dark text-bold">Cadastrar
                Imagem</button>
        </div>
    </div>
    </div>
    </form>
    </div>

    <script>
        async function downloadImage(imageUrl, imageName) {
            try {
                const response = await fetch(imageUrl);
                const blob = await response.blob();
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = imageName;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            } catch (error) {
                console.error('Erro ao baixar a imagem:', error);
            }
        }
    </script>
@endsection
