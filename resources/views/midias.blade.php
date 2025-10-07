@extends('layouts.master')
@section('master')
    <div class="container mt-4">
        <div class="container-fluid text-white text-bold mb-3" style="background-color: #074F63">
            <div class="container d-flex flex-wrap align-items-center justify-content-between gap-2 custom-navbar">
                <a @if(auth()->user()->tipo_usuario_id == 1) href="{{ route('painel.admin') }}" @else href="{{ route('painel.membro') }}" @endif title="Voltar" class="btn btn-sm btn-dark border border-white" role="button"
                    data-bs-toggle="tooltip" data-bs-placement="top" aria-label="botão voltar">
                    <span class="text-bold">VOLTAR</span>
                </a>

                <h1 class="display-6 fw-bold text-center mx-auto my-2">MÍDIAS</h1>

            </div>
        </div>

        <div class="row g-3 align-items-center justify-content-center mt-3">
            <div class="col-md-6 col-sm-6">
                <a href="{{ route('midias.index_by_type', 3) }}"
                    class="d-flex flex-column align-items-center justify-content-center bg-light text-dark text-center border border-dark p-4 rounded text-decoration-none fw-bold"
                    style="height: 150px;">
                    <span class="mb-2 text-bold">VISUALIZAR IMAGENS</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000000"
                        viewBox="0 0 256 256">
                        <path
                            d="M216,44H72A12,12,0,0,0,60,56V76H40A12,12,0,0,0,28,88V200a12,12,0,0,0,12,12H184a12,12,0,0,0,12-12V180h20a12,12,0,0,0,12-12V56A12,12,0,0,0,216,44ZM68,56a4,4,0,0,1,4-4H216a4,4,0,0,1,4,4v72.4l-16.89-16.89a12,12,0,0,0-17,0l-22.83,22.83L116.49,87.51a12,12,0,0,0-17,0L68,119ZM188,200a4,4,0,0,1-4,4H40a4,4,0,0,1-4-4V88a4,4,0,0,1,4-4H60v84a12,12,0,0,0,12,12H188Zm28-28H72a4,4,0,0,1-4-4V130.34l37.17-37.17a4,4,0,0,1,5.66,0l49.66,49.66a4,4,0,0,0,5.65,0l25.66-25.66a4,4,0,0,1,5.66,0L220,139.71V168A4,4,0,0,1,216,172ZM164,84a8,8,0,1,1,8,8A8,8,0,0,1,164,84Z">
                        </path>
                    </svg>
                </a>
            </div>

            <div class="col-md-6 col-sm-6">
                <a href="{{ route('midias.index_by_type', 4) }}"
                    class="d-flex flex-column align-items-center justify-content-center bg-light text-dark text-center border border-dark p-4 rounded text-decoration-none fw-bold"
                    style="height: 150px;">
                    <span class="mb-2 text-bold">VISUALIZAR VÍDEOS</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000000"
                        viewBox="0 0 256 256">
                        <path
                            d="M162.22,108.67l-48-32A4,4,0,0,0,108,80v64a4,4,0,0,0,2.11,3.53,4,4,0,0,0,4.11-.2l48-32a4,4,0,0,0,0-6.66ZM116,136.53V87.47L152.79,112ZM216,44H40A12,12,0,0,0,28,56V168a12,12,0,0,0,12,12H216a12,12,0,0,0,12-12V56A12,12,0,0,0,216,44Zm4,124a4,4,0,0,1-4,4H40a4,4,0,0,1-4-4V56a4,4,0,0,1,4-4H216a4,4,0,0,1,4,4Zm8,40a4,4,0,0,1-4,4H32a4,4,0,0,1,0-8H224A4,4,0,0,1,228,208Z">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection
