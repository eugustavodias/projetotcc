@extends('layouts.master')
@section('master')
    <div class="container my-4">
        <div class="container-fluid text-white text-bold mb-3" style="background-color: #074F63">
            <div class="ontainer d-flex flex-wrap align-items-center justify-content-between gap-2 custom-navbar">
                <a @if (auth()->user()->tipo_usuario_id == 1) href="{{ route('painel.admin') }}" @else href="{{ route('painel.membro') }}" @endif
                    title="Voltar" class="btn btn-sm btn-dark border border-white" role="button" data-bs-toggle="tooltip"
                    data-bs-placement="top" aria-label="botão voltar">
                    <span class="text-bold">VOLTAR</span>
                </a>

                <h1 class="display-6 fw-bold text-center mx-auto my-2">ESTUDOS BÍBLICOS</h1>
            </div>
        </div>
        @if (auth()->check() && auth()->user()->tipo_usuario_id === 1)
            <div class="d-flex justify-content-end mb-3">
                <a title="Cadastrar" class="btn btn-sm btn-success border border-dark" role="button" data-bs-toggle="modal"
                    data-bs-target="#cadastrarEstudo" data-bs-placement="top" aria-label="botão cadastrar">
                    <span class="text-bold">CADASTRAR ESTUDO</span>
                </a>
            </div>
        @endif

        <div class="row">
            @forelse($estudos as $estudo)
                <div class="col-md-4 d-flex">
                    <div class="card mb-4 shadow-sm border border-dark w-100">
                        <div class="d-flex align-items-center justify-content-center overflow-hidden"
                            style="height: 300px;">
                            <img class="card-img-top" src="{{ $estudo->anexo ? asset($estudo->anexo->caminho) : '' }}"
                                alt="Estudo">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-between text-center">
                            <h5 class="card-text">{{ $estudo->nome }}</h5>
                            <div class="">
                                <a href="{{ asset($estudo->link) }}" class="btn btn-dark border border-white">Ver
                                    Estudo</a>
                            </div>
                            @if (auth()->check() && auth()->user()->tipo_usuario_id === 1)
                                <hr>
                                <div class="d-flex flex-row justify-content-center">
                                    <div>
                                        <a class="btn btn-primary btn-sm me-2 border border-dark" href="#"
                                            title="Editar" data-bs-toggle="modal"
                                            data-bs-target="{{ '#editarEstudo' . $estudo->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="#ffff" viewBox="0 0 256 256">
                                                <path
                                                    d="M227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H216a8,8,0,0,0,0-16H115.32l112-112A16,16,0,0,0,227.32,73.37ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.69,147.32,64l24-24L216,84.69Z">
                                                </path>
                                            </svg>
                                        </a>

                                        <div class="modal fade" id="{{ 'editarEstudo' . $estudo->id }}" tabindex="-1"
                                            aria-labelledby="editarEstudoLabel" aria-hidden="true">
                                            <form action="{{ route('estudos.update', $estudo->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf @method('PUT')
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-bold" id="editarEstudoLabel">Editar
                                                                Estudo</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="editarTituloEstudo"
                                                                    class="form-label">Título</label>
                                                                <input value="{{ $estudo->nome }}" name="titulo"
                                                                    type="text" class="form-control"
                                                                    id="editarTituloEstudo" placeholder="Digite o título"
                                                                    required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="editarImagemEstudo" class="form-label">Alterar
                                                                    Imagem</label>
                                                                <input name="anexo_thumb" type="file"
                                                                    class="form-control" id="editarImagemEstudo"
                                                                    accept="image/*">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="editarLinkEstudo" class="form-label">Alterar
                                                                    Link</label>
                                                                <input value="{{ $estudo->link }}" name="url"
                                                                    type="url" class="form-control"
                                                                    id="editarLinkEstudo" placeholder="Digite o link">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <button type="submit" id="salvarEdicaoEstudo"
                                                                class="btn btn-success border border-dark text-bold">
                                                                Salvar Alterações
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div>
                                        <form action="{{ route('estudos.delete', $estudo->id) }}" method="post">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm me-2 border border-dark" type="submit"
                                                title="Excluir">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="#ffff" viewBox="0 0 256 256">
                                                    <path
                                                        d="M216,48H168V40a16,16,0,0,0-16-16H104A16,16,0,0,0,88,40v8H40A16,16,0,0,0,24,64v8a8,8,0,0,0,8,8H224a8,8,0,0,0,8-8V64A16,16,0,0,0,216,48ZM104,40h48V48H104Zm96,56a8,8,0,0,0-8,8V200a16,16,0,0,1-16,16H80a16,16,0,0,1-16-16V104a8,8,0,0,0-16,0V200a32.09,32.09,0,0,0,32,32h96a32.09,32.09,0,0,0,32-32V104A8,8,0,0,0,200,96Zm-48,16a8,8,0,0,0-8,8v64a8,8,0,0,0,16,0V120A8,8,0,0,0,152,112ZM104,112a8,8,0,0,0-8,8v64a8,8,0,0,0,16,0V120A8,8,0,0,0,104,112Z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <tr>
                    <td colspan="3">
                        <h4 class="text-center text-danger">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            NÃO HÁ ESTUDOS DISPONIVEIS DISPONÍVEIS!
                        </h4>
                    </td>
                </tr>
            @endforelse
        </div>
        {!! $estudos->links() !!}
    </div>
    <div class="modal fade" id="cadastrarEstudo" tabindex="-1" aria-labelledby="cadastrarArquivosLabel"
        aria-hidden="true">
        <form action="{{ route('estudos.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-bold" id="cadastrarArquivosLabel">Cadastrar Novo Estudo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formEstudo">
                            <div class="mb-3">
                                <label for="tituloEstudo" class="form-label">Título</label>
                                <input name="titulo" type="text" class="form-control" id="tituloEstudo"
                                    placeholder="Digite o título" required>
                            </div>

                            <div class="mb-3">
                                <label for="imagemEstudo" class="form-label">Adicionar Imagem</label>
                                <input name="thumb_file" type="file" class="form-control" id="imagemEstudo"
                                    accept="image/*" required>
                            </div>
                            <div class="mb-3">
                                <label for="linkEstudo" class="form-label">Adicionar Link</label>
                                <input name="link" type="url" class="form-control" id="linkEstudo"
                                    placeholder="Digite o link" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" id="salvarEstudo" class="btn btn-success border border-dark text-bold">
                            Cadastrar Estudo
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const estudosContainer = document.getElementById('estudosContainer');
            const salvarEstudoButton = document.getElementById('salvarEstudo');

            salvarEstudoButton.addEventListener('click', function() {
                const titulo = document.getElementById('tituloEstudo').value;
                const descricao = document.getElementById('descricaoEstudo').value;
                const arquivo = document.getElementById('arquivoEstudo').files[0];
                const imagem = document.getElementById('imagemEstudo').files[0];
                const link = document.getElementById('linkEstudo').value;

                if (!titulo || !descricao || !imagem || !link) {
                    alert('Por favor, preencha todos os campos!');
                    return;
                }

                const imagemURL = URL.createObjectURL(imagem);

                const estudoCard = `
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="${imagemURL}" class="card-img-top" alt="${titulo}">
                            <div class="card-body">
                                <h5 class="card-title text-center">${titulo}</h5>
                                <p class="card-text text-justify">${descricao}</p>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="${link}" target="_blank" class="btn btn-success">Acessar Link</a>
                                    <button class="btn btn-primary" disabled>Download Arquivo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                estudosContainer.innerHTML += estudoCard;

                document.getElementById('formEstudo').reset();
                const modal = bootstrap.Modal.getInstance(document.getElementById('cadastrarArquivos'));
                modal.hide();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const salvarEdicaoEstudoButton = document.getElementById('salvarEdicaoEstudo');

            salvarEdicaoEstudoButton.addEventListener('click', function() {
                const titulo = document.getElementById('editarTituloEstudo').value;
                const descricao = document.getElementById('editarDescricaoEstudo').value;
                const imagem = document.getElementById('editarImagemEstudo').files[0];
                const arquivo = document.getElementById('editarArquivoEstudo').files[0];
                const link = document.getElementById('editarLinkEstudo').value;

                if (!titulo || !descricao) {
                    alert('Por favor, preencha os campos obrigatórios (Título e Descrição).');
                    return;
                }

                console.log({
                    titulo,
                    descricao,
                    imagem: imagem ? imagem.name : 'Imagem não alterada',
                    arquivo: arquivo ? arquivo.name : 'Arquivo não alterado',
                    link: link || 'Link não alterado',
                });

                const modal = bootstrap.Modal.getInstance(document.getElementById('editarEstudo'));
                modal.hide();

                document.getElementById('formEditarEstudo').reset();
            });
        });
    </script>
@endsection
