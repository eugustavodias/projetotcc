@extends('layouts.master')
@section('master')
    <div class="container mt-4 pb-3">
        <div class="container-fluid text-white text-bold mb-3" style="background-color: #074F63">
            <div class="container d-flex flex-wrap align-items-center justify-content-between gap-2 custom-navbar">
                <h1 class="display-6 fw-bold text-center mx-auto my-2">PAINEL MEMBRO</h1>
            </div>
        </div>
        <div class="row g-3 align-items-center justify-content-center mt-3">
            <div class="col-md-3 col-sm-6 gap-3">
                <a href="{{ route('membros.meusdados') }}"
                    class="d-flex flex-column align-items-center justify-content-center bg-light text-dark text-center border border-dark p-4 rounded text-decoration-none fw-bold"
                    style="height: 150px;">
                    <span class="mb-2 text-bold">MEUS DADOS</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000000"
                        viewBox="0 0 256 256">
                        <path
                            d="M154.7,142.75a36,36,0,1,0-37.4,0A63.61,63.61,0,0,0,84.8,165.6a4,4,0,0,0,6.4,4.8,56,56,0,0,1,89.6,0,4,4,0,0,0,6.4-4.8A63.65,63.65,0,0,0,154.7,142.75ZM108,112a28,28,0,1,1,28,28A28,28,0,0,1,108,112ZM208,28H64A12,12,0,0,0,52,40V68H32a4,4,0,0,0,0,8H52v48H32a4,4,0,0,0,0,8H52v48H32a4,4,0,0,0,0,8H52v28a12,12,0,0,0,12,12H208a12,12,0,0,0,12-12V40A12,12,0,0,0,208,28Zm4,188a4,4,0,0,1-4,4H64a4,4,0,0,1-4-4V40a4,4,0,0,1,4-4H208a4,4,0,0,1,4,4Z">
                        </path>
                    </svg>
                </a>
            </div>

            <div class="col-md-3 col-sm-6">
                <a href="{{ route('financeiros.index') }}"
                    class="d-flex flex-column align-items-center justify-content-center bg-light text-dark text-center border border-dark p-4 rounded text-decoration-none fw-bold"
                    style="height: 150px;">
                    <span class="mb-2 text-bold">FINANCEIRO</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000000"
                        viewBox="0 0 256 256">
                        <path
                            d="M128,164a36,36,0,1,0-36-36A36,36,0,0,0,128,164Zm0-64a28,28,0,1,1-28,28A28,28,0,0,1,128,100ZM240,60H16a4,4,0,0,0-4,4V192a4,4,0,0,0,4,4H240a4,4,0,0,0,4-4V64A4,4,0,0,0,240,60ZM20,107.26A52.75,52.75,0,0,0,59.26,68H196.74A52.75,52.75,0,0,0,236,107.26v41.48A52.75,52.75,0,0,0,196.74,188H59.26A52.75,52.75,0,0,0,20,148.74ZM236,99a44.8,44.8,0,0,1-31-31h31ZM51,68A44.8,44.8,0,0,1,20,99V68ZM20,157a44.8,44.8,0,0,1,31,31H20Zm185,31a44.8,44.8,0,0,1,31-31v31Z">
                        </path>
                    </svg>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="{{ route('estudos.index') }}"
                    class="d-flex flex-column align-items-center justify-content-center bg-light text-dark text-center border border-dark p-4 rounded text-decoration-none fw-bold"
                    style="height: 150px;">
                    <span class="mb-2 text-bold">ESTUDOS</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000000"
                        viewBox="0 0 256 256">
                        <path
                            d="M104,36H56A12,12,0,0,0,44,48V208a12,12,0,0,0,12,12h48a12,12,0,0,0,12-12V48A12,12,0,0,0,104,36ZM52,76h56V180H52Zm4-32h48a4,4,0,0,1,4,4V68H52V48A4,4,0,0,1,56,44Zm48,168H56a4,4,0,0,1-4-4V188h56v20A4,4,0,0,1,104,212Zm123.74-16.62L194.55,37.57a12,12,0,0,0-14.25-9.3L133.49,38.32a12.1,12.1,0,0,0-9.23,14.3l33.19,157.81a12,12,0,0,0,14.25,9.3l46.81-10.06h0A12.08,12.08,0,0,0,227.74,195.38Zm-83.21-85.27,54.63-11.73,15,71.07-54.63,11.74Zm-6.64-31.56,54.64-11.74,5,23.74-54.64,11.73Zm-2.71-32.4L182,36.09a4,4,0,0,1,.84-.09,3.94,3.94,0,0,1,2.14.64,4,4,0,0,1,1.76,2.58L190.88,59,136.24,70.72,132.09,51A4.07,4.07,0,0,1,135.18,46.15Zm81.65,155.7L170,211.91a4,4,0,0,1-3-.55,4,4,0,0,1-1.76-2.58L161.12,189l54.64-11.73L219.91,197A4.07,4.07,0,0,1,216.83,201.85Z">
                        </path>
                    </svg>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="{{ route('eventos.index') }}"
                    class="d-flex flex-column align-items-center justify-content-center bg-light text-dark text-center border border-dark p-4 rounded text-decoration-none fw-bold"
                    style="height: 150px;">
                    <span class="mb-2 text-bold">EVENTOS</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000000"
                        viewBox="0 0 256 256">
                        <path
                            d="M208,36H180V24a4,4,0,0,0-8,0V36H84V24a4,4,0,0,0-8,0V36H48A12,12,0,0,0,36,48V208a12,12,0,0,0,12,12H208a12,12,0,0,0,12-12V48A12,12,0,0,0,208,36Zm4,172a4,4,0,0,1-4,4H48a4,4,0,0,1-4-4V48a4,4,0,0,1,4-4H76V56a4,4,0,0,0,8,0V44h88V56a4,4,0,0,0,8,0V44h28a4,4,0,0,1,4,4Zm-35.69-90.38-32.24-2.49-12.4-28.71a4,4,0,0,0-7.34,0l-12.4,28.71-32.24,2.49a4,4,0,0,0-2.24,7.08l24.46,20.19L94.45,175a4,4,0,0,0,5.91,4.41L128,163.18l27.64,16.27a4,4,0,0,0,2,.55,4.05,4.05,0,0,0,2.39-.79,4,4,0,0,0,1.49-4.17l-7.46-30.15,24.46-20.19a4,4,0,0,0-2.24-7.08Zm-29.26,22.71a4,4,0,0,0-1.33,4l5.78,23.36L130,155.09a4,4,0,0,0-4.06,0L104.5,167.73l5.78-23.36a4,4,0,0,0-1.33-4L90.19,124.84,115,122.92a4,4,0,0,0,3.36-2.4L128,98.1l9.68,22.42a4,4,0,0,0,3.36,2.4l24.77,1.92Z">
                        </path>
                    </svg>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="{{ route('cultos.index') }}"
                    class="d-flex flex-column align-items-center justify-content-center bg-light text-dark text-center border border-dark p-4 rounded text-decoration-none fw-bold"
                    style="height: 150px;">
                    <span class="mb-2 text-bold">CULTOS</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000000"
                        viewBox="0 0 256 256">
                        <path
                            d="M162.22,108.67l-48-32A4,4,0,0,0,108,80v64a4,4,0,0,0,2.11,3.53,4,4,0,0,0,4.11-.2l48-32a4,4,0,0,0,0-6.66ZM116,136.53V87.47L152.79,112ZM216,44H40A12,12,0,0,0,28,56V168a12,12,0,0,0,12,12H216a12,12,0,0,0,12-12V56A12,12,0,0,0,216,44Zm4,124a4,4,0,0,1-4,4H40a4,4,0,0,1-4-4V56a4,4,0,0,1,4-4H216a4,4,0,0,1,4,4Zm8,40a4,4,0,0,1-4,4H32a4,4,0,0,1,0-8H224A4,4,0,0,1,228,208Z">
                        </path>
                    </svg>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="{{ route('midias.index') }}"
                    class="d-flex flex-column align-items-center justify-content-center bg-light text-dark text-center border border-dark p-4 rounded text-decoration-none fw-bold"
                    style="height: 150px;">
                    <span class="mb-2 text-bold">MÍDIAS</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000000"
                        viewBox="0 0 256 256">
                        <path
                            d="M216,108H71.26L209,71.64a4,4,0,0,0,2.84-4.92l-8.16-30a11.92,11.92,0,0,0-14.54-8.31L36.83,68.61a11.78,11.78,0,0,0-7.26,5.53A11.59,11.59,0,0,0,28.41,83l7.67,28.19A3.87,3.87,0,0,0,36,112v88a12,12,0,0,0,12,12H208a12,12,0,0,0,12-12V112A4,4,0,0,0,216,108ZM126,53.33l38,21.92L116.08,87.9,78.12,66Zm65.16-17.2a4,4,0,0,1,1-.13A3.88,3.88,0,0,1,196,38.81l7.1,26.12L175,72.35,137,50.43Zm-154.7,42a3.86,3.86,0,0,1,2.37-1.8l28.27-7.46,38,21.91L43.25,107.12,36.13,80.94A3.66,3.66,0,0,1,36.5,78.14ZM212,200a4,4,0,0,1-4,4H48a4,4,0,0,1-4-4V116H212Z">
                        </path>
                    </svg>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="{{ route('log.out') }}"
                    class="d-flex flex-column align-items-center justify-content-center bg-light text-dark text-center border border-dark p-4 rounded text-decoration-none fw-bold"
                    style="height: 150px;">
                    <span class="mb-2 text-bold">SAIR</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#000000"
                        viewBox="0 0 256 256">
                        <path
                            d="M116,216a4,4,0,0,1-4,4H48a4,4,0,0,1-4-4V40a4,4,0,0,1,4-4h64a4,4,0,0,1,0,8H52V212h60A4,4,0,0,1,116,216Zm110.83-90.83-40-40a4,4,0,0,0-5.66,5.66L214.34,124H112a4,4,0,0,0,0,8H214.34l-33.17,33.17a4,4,0,0,0,5.66,5.66l40-40A4,4,0,0,0,226.83,125.17Z">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection
