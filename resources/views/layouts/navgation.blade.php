<nav class="navbar navbar-expand-lg" style="background-color: #074F63" role="navigation" aria-label="Barra de Navegação Principal">
    <div class="container px-2">
        <div class="d-flex align-items-center navbar-brand" role="banner">
            <img src="https://i.ibb.co/C5XR7cB/logo-betel.png" alt="Logo da Igreja Batista Bíblica Betel" width="55" height="55" class="me-2">
            <a href="{{ route('ibbb') }}" id="navbarText" class="text-white text-bold m-0 text-decoration-none" style="font-size: 18px" aria-label="Página inicial da Igreja Batista Bíblica Betel">
                IGREJA BATISTA BÍBLICA BETEL
            </a>
        </div>

        <button class="navbar-toggler border-white text-white" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alternar navegação">
            <span class="fa fa-bars" style="color: white;"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto" role="menubar">
                <li class="nav-item text-bold" role="none">
                    <a class="nav-link active text-white" aria-current="page" href="{{ route('sobre') }}" role="menuitem">Sobre</a>
                </li>
                <li class="nav-item text-bold" role="none">
                    <a class="nav-link active text-white" aria-current="page" href="{{ route('eventos.index') }}" role="menuitem">Eventos</a>
                </li>
                <li class="nav-item text-bold" role="none">
                    <a class="nav-link active text-white" aria-current="page" href="{{ route('cultos.index') }}" role="menuitem">Cultos</a>
                </li>
                @auth
                    <li class="nav-item text-bold" role="none">
                        <a class="nav-link active text-white" aria-current="page" role="menuitem"
                            @if (auth()->user()->tipo_usuario_id == 1) href="{{ route('painel.admin') }}" @else href="{{ route('painel.membro') }}" @endif>Painel</a>
                    </li>
                @endauth
                <li class="nav-item d-lg-none text-bold" role="none">
                    <a class="nav-link active text-white" aria-current="page" name="btnlogin" href="{{ auth()->check() ? route('membros.meusdados', auth()->id()) : '#' }}" role="menuitem">
                        {{ auth()->check() ? name_user(auth()->user()->name) : 'Membros' }}
                    </a>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-3" role="complementary" aria-label="Ícones de Redes Sociais">
                <a href="https://www.facebook.com/IBBBETEL" class="nav-link" aria-label="Página do Facebook da Igreja Batista Bíblica Betel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffff" viewBox="0 0 256 256">
                        <path
                            d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm8,191.63V152h24a8,8,0,0,0,0-16H136V112a16,16,0,0,1,16-16h16a8,8,0,0,0,0-16H152a32,32,0,0,0-32,32v24H96a8,8,0,0,0,0,16h24v63.63a88,88,0,1,1,16,0Z">
                        </path>
                    </svg>
                </a>
                <a href="https://www.instagram.com/igrejabetel80/" class="nav-link" aria-label="Página do Instagram da Igreja Batista Bíblica Betel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffff" viewBox="0 0 256 256">
                        <path
                            d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160ZM176,24H80A56.06,56.06,0,0,0,24,80v96a56.06,56.06,0,0,0,56,56h96a56.06,56.06,0,0,0,56-56V80A56.06,56.06,0,0,0,176,24Zm40,152a40,40,0,0,1-40,40H80a40,40,0,0,1-40-40V80A40,40,0,0,1,80,40h96a40,40,0,0,1,40,40ZM192,76a12,12,0,1,1-12-12A12,12,0,0,1,192,76Z">
                        </path>
                    </svg>
                </a>
                <a href="https://www.youtube.com/" class="nav-link" aria-label="Canal do YouTube da Igreja Batista Bíblica Betel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffff" viewBox="0 0 256 256">
                        <path
                            d="M164.44,121.34l-48-32A8,8,0,0,0,104,96v64a8,8,0,0,0,12.44,6.66l48-32a8,8,0,0,0,0-13.32ZM120,145.05V111l25.58,17ZM234.33,69.52a24,24,0,0,0-14.49-16.4C185.56,39.88,131,40,128,40s-57.56-.12-91.84,13.12a24,24,0,0,0-14.49,16.4C19.08,79.5,16,97.74,16,128s3.08,48.5,5.67,58.48a24,24,0,0,0,14.49,16.41C69,215.56,120.4,216,127.34,216h1.32c6.94,0,58.37-.44,91.18-13.11a24,24,0,0,0,14.49-16.41c2.59-10,5.67-28.22,5.67-58.48S236.92,79.5,234.33,69.52Zm-15.49,113a8,8,0,0,1-4.77,5.49c-31.65,12.22-85.48,12-86,12H128c-.54,0-54.33.2-86-12a8,8,0,0,1-4.77-5.49C34.8,173.39,32,156.57,32,128s2.8-45.39,5.16-54.47A8,8,0,0,1,41.93,68c30.52-11.79,81.66-12,85.85-12h.27c.54,0,54.38-.18,86,12a8,8,0,0,1,4.77,5.49C221.2,82.61,224,99.43,224,128S221.2,173.39,218.84,182.47Z">
                        </path>
                    </svg>
                </a>
            </div>

            <div class="d-none d-lg-flex custom-login-button align-items-center ms-3 gap-3">
                @auth
                    <a href="{{ route('membros.meusdados', auth()->id()) }}" name="btnlogin" class="btn btn-sm btn-dark cor shadow mt-1 border border-white" role="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Fazer login no sistema">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" viewBox="0 0 256 256">
                            <path
                                d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z">
                            </path>
                        </svg>
                        <span class="ms-1 text-bold">{{ name_user(auth()->user()->name) }}</span>
                    </a>
                @else
                    <a href="{{ route('log.in') }}" name="btnlogin" class="btn btn-sm btn-dark cor shadow mt-1 border border-white" role="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Fazer login no sistema">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" viewBox="0 0 256 256">
                            <path
                                d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z">
                            </path>
                        </svg>
                        <span class="ms-1 text-bold">Membros</span>
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<style>
    .nav-link:hover {
        color: #28A745 !important;
        text-decoration: none;
    }
</style>

<script>
    function adjustNavbarText() {
        var navbarText = document.getElementById('navbarText');
        if (window.innerWidth <= 500) {
            navbarText.textContent = 'IBBB';
        } else {
            navbarText.textContent = 'IGREJA BATISTA BÍBLICA BETEL';
        }
    }
    adjustNavbarText();
    window.onresize = adjustNavbarText;
</script>
