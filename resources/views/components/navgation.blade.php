<nav class="navbar navbar-expand-lg bg-light" role="navigation" aria-label="Barra de Navegação Principal">
    <div class="container px-2">
        <!-- Logo e Nome -->
        <div class="d-flex align-items-center navbar-brand" role="banner">
            <img src="https://i.ibb.co/C5XR7cB/logo-betel.png" alt="Logo da Igreja Batista Bíblica Betel" width="55"
                height="55" class="me-2">
            <a href="{{ url('/ibbb') }}" id="navbarText" class="text-dark m-0"
                style="text-decoration: none; font-size: 18px"
                aria-label="Página inicial da Igreja Batista Bíblica Betel">IGREJA BATISTA BÍBLICA BETEL</a>
        </div>

        <!-- Botão para expandir a navbar em dispositivos móveis -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu de Navegação e Ícones de Redes Sociais -->
        <div class="collapse navbar-collapse justify-content-between gap-5" id="navbarNavDropdown">
            <!-- Menu de Navegação Centralizado -->
            <ul class="navbar-nav mx-auto gap-3" role="menubar">
                <li class="nav-item" role="none">
                    <a class="nav-link active" aria-current="page" href="{{ url('/ibbb/sobre') }}"
                        role="menuitem">Sobre</a>
                </li>
                <li class="nav-item" role="none">
                    <a class="nav-link active" aria-current="page" href="{{ url('/ibbb/cultos') }}"
                        role="menuitem">Cultos</a>
                </li>
                <li class="nav-item" role="none">
                    <a class="nav-link active" aria-current="page" href="{{ url('/ibbb/eventos') }}"
                        role="menuitem">Eventos</a>
                </li>
                <li class="nav-item" role="none">
                    <a class="nav-link active" aria-current="page" href="{{ url('/ibbb/midias') }}"
                        role="menuitem">Mídias</a>
                </li>
                <li class="nav-item d-lg-none" role="none">
                    <a href="{{ url('/ibbb/login') }}" title="Login" name="btnlogin" class="nav-link text-primary"
                        role="menuitem">Login</a>
                </li>
            </ul>

            <!-- Ícones de Redes Sociais -->
            <div class="d-flex align-items-center gap-3" role="complementary" aria-label="Ícones de Redes Sociais">
                <a href="https://www.facebook.com/IBBBETEL" class="nav-link"
                    aria-label="Página do Facebook da Igreja Batista Bíblica Betel">
                    <!-- Ícone do Facebook -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000"
                        viewBox="0 0 256 256">
                        <path
                            d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm8,191.63V152h24a8,8,0,0,0,0-16H136V112a16,16,0,0,1,16-16h16a8,8,0,0,0,0-16H152a32,32,0,0,0-32,32v24H96a8,8,0,0,0,0,16h24v63.63a88,88,0,1,1,16,0Z">
                        </path>
                    </svg>
                </a>
                <a href="https://www.instagram.com/igrejabetel80/" class="nav-link"
                    aria-label="Página do Instagram da Igreja Batista Bíblica Betel">
                    <!-- Ícone do Instagram -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000"
                        viewBox="0 0 256 256">
                        <path
                            d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160ZM176,24H80A56.06,56.06,0,0,0,24,80v96a56.06,56.06,0,0,0,56,56h96a56.06,56.06,0,0,0,56-56V80A56.06,56.06,0,0,0,176,24Zm40,152a40,40,0,0,1-40,40H80a40,40,0,0,1-40-40V80A40,40,0,0,1,80,40h96a40,40,0,0,1,40,40ZM192,76a12,12,0,1,1-12-12A12,12,0,0,1,192,76Z">
                        </path>
                    </svg>
                </a>
                <a href="https://www.youtube.com/" class="nav-link"
                    aria-label="Canal do YouTube da Igreja Batista Bíblica Betel">
                    <!-- Ícone do YouTube -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000"
                        viewBox="0 0 256 256">
                        <path
                            d="M164.44,121.34l-48-32A8,8,0,0,0,104,96v64a8,8,0,0,0,12.44,6.66l48-32a8,8,0,0,0,0-13.32ZM120,145.05V111l25.58,17ZM234.33,69.52a24,24,0,0,0-14.49-16.4C185.56,39.88,131,40,128,40s-57.56-.12-91.84,13.12a24,24,0,0,0-14.49,16.4C19.08,79.5,16,97.74,16,128s3.08,48.5,5.67,58.48a24,24,0,0,0,14.49,16.41C69,215.56,120.4,216,127.34,216h1.32c6.94,0,58.37-.44,91.18-13.11a24,24,0,0,0,14.49-16.41c2.59-10,5.67-28.22,5.67-58.48S236.92,79.5,234.33,69.52Zm-15.49,113a8,8,0,0,1-4.77,5.49c-31.65,12.22-85.48,12-86,12H128c-.54,0-54.33.2-86-12a8,8,0,0,1-4.77-5.49C34.8,173.39,32,156.57,32,128s2.8-45.39,5.16-54.47A8,8,0,0,1,41.93,68c30.52-11.79,81.66-12,85.85-12h.27c.54,0,54.38-.18,86,12a8,8,0,0,1,4.77,5.49C221.2,82.61,224,99.43,224,128S221.2,173.39,218.84,182.47Z">
                        </path>
                    </svg>
                </a>
            </div>

            <!-- Botão de Login (Visível em todas as telas) -->
            <div class="d-none d-lg-flex custom-login-button align-items-center ms-3">
                <a href="{{ url('/ibbb/login') }}" title="Login" name="btnlogin"
                    class="btn btn-sm btn-primary shadow mt-1" role="button" data-bs-toggle="tooltip"
                    data-bs-placement="top" aria-label="Fazer login no sistema">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff"
                        viewBox="0 0 256 256">
                        <path
                            d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z">
                        </path>
                    </svg>
                    <span class="ms-1">Login</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<footer class="text-center py-3 bg-light fixed-bottom" role="contentinfo" aria-label="Rodapé">
    <small>Direitos Reservados</small>
</footer>

<footer class="text-center text-lg-start bg-body-tertiary text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Company name
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>

<!-- Script para ajustar o texto do nome -->
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
