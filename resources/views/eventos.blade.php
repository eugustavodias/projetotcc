@extends('layouts.master')
@section('master')
    <div class="container my-4">
        <div class="container-fluid text-white text-bold mb-3" style="background-color: #074F63">
            <div class="container d-flex flex-wrap align-items-center justify-content-between gap-2 custom-navbar">
                <a href="javascript: history.go(-1)" title="Voltar" class="btn btn-sm btn-dark border border-white"
                    role="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="botão voltar">
                    <span class="text-bold">VOLTAR</span>
                </a>

                <h1 class="display-6 fw-bold text-center mx-auto my-2">EVENTOS</h1>

            </div>
        </div>
        @if (auth()->check() && auth()->user()->tipo_usuario_id === 1)
            <div class="d-flex justify-content-end mb-3">
                <a title="Cadastrar" class="btn btn-sm btn-success border border-dark" role="button" data-bs-toggle="modal"
                    data-bs-target="#cadastrarModal" data-bs-placement="top" aria-label="botão cadastrar">
                    <span class="text-bold">CADASTRAR</span>
                </a>
            </div>
        @endif
        <div class="row">
            @forelse($eventos as $evento)
                <div class="col-md-4 d-flex">
                    <div class="card mb-4 shadow-sm border border-dark w-100">
                        <div class="d-flex align-items-center justify-content-center overflow-hidden"
                            style="height: 300px;">
                            <img class="card-img-top w-100 h-100 object-fit-cover"
                                src="{{ asset($evento->anexo->caminho) }}" alt="Vestibular Bíblico 2025">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-between text-center">
                            <h5 class="card-text">{{ $evento->titulo }}</h5>
                            @if ((auth()->check() && auth()->user()->tipo_usuario_id === 1) || $evento->tipos_eventos_id !== 2)
                                <p class="card-text mb-2">
                                    <a href="{{ url($evento->link) }}"
                                        class="text-decoration-none text-primary">Inscrever-se</a>
                                </p>
                            @endif
                            @if ($evento->tipos_eventos_id == 1)
                                <span class="badge bg-success">{{ $evento->tipo_evento->nome }}</span>
                            @elseif($evento->tipos_eventos_id == 2)
                                <span class="badge bg-danger">{{ $evento->tipo_evento->nome }}</span>
                            @elseif($evento->tipos_eventos_id == 3)
                                <span class="badge bg-danger">{{ $evento->tipo_evento->nome }}</span>
                            @else
                                <span class="badge bg-secondary">{{ $evento->tipo_evento->nome }}</span>
                            @endif
                            <hr>
                            <p class="mb-1"><i class="bi bi-clock"></i> Período Inscrição</p>
                            <p class="text-muted">
                                {{ dataFormat($evento->data_inicio) }} <strong>até</strong>
                                {{ dataFormat($evento->data_fim) }}
                            </p>
                            @if (auth()->check() && auth()->user()->tipo_usuario_id === 1)
                                <hr>
                                <div class="d-flex flex-row justify-content-center">
                                    <div>
                                        <a class="btn btn-primary btn-sm me-2 border border-dark" href=""
                                            title="Editar" data-bs-toggle="modal"
                                            data-bs-target="{{ '#editarModal' . $evento->id }}" data-bs-placement="top"
                                            aria-label="botão editar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="#ffff" viewBox="0 0 256 256">
                                                <path
                                                    d="M227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H216a8,8,0,0,0,0-16H115.32l112-112A16,16,0,0,0,227.32,73.37ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.69,147.32,64l24-24L216,84.69Z">
                                                </path>
                                            </svg>
                                        </a>

                                        <div class="modal fade" id="{{ 'editarModal' . $evento->id }}" tabindex="-1"
                                            aria-labelledby="editarModalLabel" aria-hidden="true">
                                            <form action="{{ route('eventos.update', $evento->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf @method('PUT')
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-bold" id="editarModalLabel">Editar
                                                                Evento</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="tituloEvento" class="form-label">Título</label>
                                                                <input name="tituloEvento" type="text"
                                                                    class="form-control" id="tituloEvento"
                                                                    placeholder="Digite o título do evento"
                                                                    value="{{ $evento->titulo }}" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="linkInscricao" class="form-label">Link de
                                                                    Inscrição</label>
                                                                <input name="linkInscricao" type="url"
                                                                    class="form-control" value="{{ $evento->link }}"
                                                                    id="linkInscricao"
                                                                    placeholder="Digite o link de inscrição" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="imagemEvento" class="form-label">Adicionar
                                                                    Imagem</label>
                                                                <input name="file" type="file" class="form-control"
                                                                    id="imagemEvento" accept="image/png, image/jpeg">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="statusEvento" class="form-label">Status do
                                                                    Evento</label>
                                                                <select name="statusEvento" class="form-select"
                                                                    id="statusEvento" required>
                                                                    <option value="" selected disabled>Selecione o
                                                                        status
                                                                    </option>
                                                                    @foreach ($tipos_eventos as $tipo_evento)
                                                                        <option value="{{ $tipo_evento->id }}"
                                                                            @if ($tipo_evento->id == $evento->tipos_eventos_id) selected @endif>
                                                                            {{ $tipo_evento->nome }}
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="mb-3 row">
                                                                <div class="col-md-6">
                                                                    <label for="dataInicial" class="form-label">Data
                                                                        Inicial</label>
                                                                    <input name="dataInicial" type="date"
                                                                        class="form-control"
                                                                        value="{{ $evento->data_inicio }}"
                                                                        id="dataInicial" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="dataFinal" class="form-label">Data
                                                                        Final</label>
                                                                    <input name="dataFinal" type="date"
                                                                        class="form-control" id="dataFinal"
                                                                        value="{{ $evento->data_fim }}" required>
                                                                </div>
                                                            </div>
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

                                    <div>
                                        <form action="{{ route('eventos.delete', $evento->id) }}" class="me-2"
                                            method="post">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm border border-dark" type="submit"
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
                            NÃO HÁ EVENTOS DISPONÍVEIS!
                        </h4>
                    </td>
                </tr>
            @endforelse

            {!! $eventos->links() !!}
        </div>
    </div>

    <form action="{{ route('eventos.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="cadastrarModal" tabindex="-1" aria-labelledby="cadastrarModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-bold" id="cadastrarModalLabel">Cadastrar Novo Evento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="tituloEvento" class="form-label">Título</label>
                                <input name="tituloEvento" type="text" class="form-control" id="tituloEvento"
                                    placeholder="Digite o título do evento" required>
                            </div>

                            <div class="mb-3">
                                <label for="linkInscricao" class="form-label">Link de Inscrição</label>
                                <input name="linkInscricao" type="url" class="form-control" id="linkInscricao"
                                    placeholder="Digite o link de inscrição" required>
                            </div>

                            <div class="mb-3">
                                <label for="imagemEvento" class="form-label">Adicionar Imagem</label>
                                <input name="file" type="file" class="form-control" id="imagemEvento"
                                    accept="image/png, image/jpeg" required>
                            </div>

                            <div class="mb-3">
                                <label for="statusEvento" class="form-label">Status do Evento</label>
                                <select name="statusEvento" class="form-select" id="statusEvento" required>
                                    <option value="" selected disabled>Selecione o status</option>
                                    @foreach ($tipos_eventos as $tipo_evento)
                                        <option value="{{ $tipo_evento->id }}">{{ $tipo_evento->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="dataInicial" class="form-label">Data Inicial</label>
                                    <input name="dataInicial" type="date" class="form-control" id="dataInicial"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="dataFinal" class="form-label">Data Final</label>
                                    <input name="dataFinal" type="date" class="form-control" id="dataFinal" required>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-success border border-dark text-bold">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
