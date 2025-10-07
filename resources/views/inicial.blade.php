@extends('layouts.master')
@section('master')
    <div class="container-fluid bg-light py-5 text-center" style="position: relative; overflow: hidden; background: none;">
        <div
            style="background-image: url('https://i.ibb.co/fCR6z4B/IMG-20241222-211948.jpg'); background-size: cover; background-position: center; opacity: 0.3; position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: 1;">
        </div>
        <div style="position: relative; z-index: 2;">
            <img src="https://i.ibb.co/C5XR7cB/logo-betel.png" alt="Igreja Batista Bíblica Betel" class="img-fluid mb-3"
                style="width: 100px;">
            <h1 class="display-5 fw-bold">Igreja Batista Bíblica Betel</h1>
        </div>
    </div>


    <div class="container-fluid text-white py-1" style="background-color: #074F63">
        <div class="container text-center">
            <h1 class="display-6 fw-bold">CULTOS</h1>
        </div>
    </div>

    <div class="container">
        <div class="row p-4">
            <div class="col-lg-3 col-md-6 text-center">
                <img class="rounded-circle" src="https://i.ibb.co/Rj4sp4b/or.png" alt="Culto de Oração" width="180"
                    height="180">
                <h4 class="p-2 font-weight-bold">Culto de Oração</h4>
                <p>Às quartas-feiras, às 19h30.</p>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <img class="rounded-circle" src="https://i.ibb.co/mFy4DSm/jv.png" alt="Culto de Jovens" width="180"
                    height="180">
                <h4 class="p-2 font-weight-bold">Culto de Jovens</h4>
                <p>Aos sábados, às 19h30.</p>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <img class="rounded-circle" src="https://i.ibb.co/j6Lq34s/ebd.png" alt="Escola Bíblica Dominical"
                    width="180" height="180">
                <h4 class="p-2 font-weight-bold">E.B.D</h4>
                <p>Aos domingos, às 09h00.</p>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <img class="rounded-circle" src="https://i.ibb.co/3M6nzNp/EV.png" alt="Culto Evangelístico" width="180"
                    height="180">
                <h4 class="p-2 font-weight-bold">Culto Evangelístico</h4>
                <p>Aos domingos, às 19h30.</p>
            </div>
        </div>
    </div>

    <div class="container-fluid text-light py-1" style="background-color: #074F63">
        <div class="container text-center">
            <h1 class="display-6 fw-bold">IGREJAS E CONGREGAÇÕES</h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row gx-3 gy-3">
            <div class="col-md-3">
                <div class="card h-100 mb-4 shadow-sm border border-dark">
                    <img class="card-img-top" src="https://i.ibb.co/bd5Ftf6/2017-08-09.jpg"
                        alt="Igreja Batista Bíblica Nova Porto Velho">
                    <div class="card-body text-center d-flex flex-column justify-content-between">
                        <h7 class="card-text text-bold">Igreja Batista Bíblica Nova Porto Velho</h7>
                        <p class="card-text"><strong>Pr.</strong> Adonias dos Anjos</p>
                        <a href="https://maps.app.goo.gl/GPrag8L6xj7thauM7" name="btnlocalizacao" target="_blank"
                            class="btn btn-sm btn-dark shadow mt-1 border border-white" role="button"
                            aria-label="Localização">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff"
                                viewBox="0 0 256 256">
                                <path
                                    d="M108,80a20,20,0,1,1,20,20A20,20,0,0,1,108,80ZM60,80a68,68,0,0,1,136,0c0,62.25-59.51,97-62.05,98.42a12,12,0,0,1-11.9,0C119.51,177,60,142.25,60,80Zm24,0c0,38.2,30.71,64.2,44,73.64C141.21,144.15,172,118,172,80a44,44,0,0,0-88,0Zm124.57,65.6a12,12,0,1,0-9.14,22.19C213.56,173.61,220,180.27,220,184c0,4-7.13,11.07-22.77,17.08-18.3,7-42.89,10.92-69.23,10.92s-50.93-3.88-69.23-10.92C43.12,195.07,36,188,36,184c0-3.73,6.44-10.39,20.57-16.21a12,12,0,1,0-9.14-22.19C31.27,152.25,12,164.31,12,184c0,34.14,58.36,52,116,52,29.22,0,56.86-4.44,77.85-12.52C220.1,218,244,205.59,244,184,244,164.31,224.73,152.25,208.57,145.6Z">
                                </path>
                            </svg>
                            <span class=" cor ms-1 text-bold">Localização</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 mb-4 shadow-sm border border-dark">
                    <img class="card-img-top" src="https://i.ibb.co/c6rzpPb/floresta.jpg"
                        alt="Templo Batista Bíblico da Floresta">
                    <div class="card-body text-center d-flex flex-column justify-content-between">
                        <h7 class="card-text text-bold">Templo Batista Bíblico da Floresta</h7>
                        <p class="card-text"><strong>Pr.</strong> Rafael Oliveira</p>
                        <a href="https://maps.app.goo.gl/wy9wmccuiYHrnpN5A" name="btnlocalizacao" target="_blank"
                            class="btn btn-sm btn-dark shadow mt-1 border border-white" role="button"
                            aria-label="Localização">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff"
                                viewBox="0 0 256 256">
                                <path
                                    d="M108,80a20,20,0,1,1,20,20A20,20,0,0,1,108,80ZM60,80a68,68,0,0,1,136,0c0,62.25-59.51,97-62.05,98.42a12,12,0,0,1-11.9,0C119.51,177,60,142.25,60,80Zm24,0c0,38.2,30.71,64.2,44,73.64C141.21,144.15,172,118,172,80a44,44,0,0,0-88,0Zm124.57,65.6a12,12,0,1,0-9.14,22.19C213.56,173.61,220,180.27,220,184c0,4-7.13,11.07-22.77,17.08-18.3,7-42.89,10.92-69.23,10.92s-50.93-3.88-69.23-10.92C43.12,195.07,36,188,36,184c0-3.73,6.44-10.39,20.57-16.21a12,12,0,1,0-9.14-22.19C31.27,152.25,12,164.31,12,184c0,34.14,58.36,52,116,52,29.22,0,56.86-4.44,77.85-12.52C220.1,218,244,205.59,244,184,244,164.31,224.73,152.25,208.57,145.6Z">
                                </path>
                            </svg>
                            <span class=" cor ms-1 text-bold">Localização</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 mb-4 shadow-sm border border-dark">
                    <img class="card-img-top" src="https://i.ibb.co/cYRrWvL/agora.png"
                        alt="Templo Batista Bíblico Grande Comissão">
                    <div class="card-body text-center d-flex flex-column justify-content-between">
                        <h7 class="card-text text-bold">Templo Batista Bíblico Grande Comissão</h7>
                        <p class="card-text"><strong>Pr.</strong> Antônio Messias</p>
                        <a href="https://maps.app.goo.gl/ApRqvJwEg53mGYjr9" name="btnlocalizacao" target="_blank"
                            class="btn btn-sm btn-dark shadow mt-1 border border-white" role="button"
                            aria-label="Localização">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff"
                                viewBox="0 0 256 256">
                                <path
                                    d="M108,80a20,20,0,1,1,20,20A20,20,0,0,1,108,80ZM60,80a68,68,0,0,1,136,0c0,62.25-59.51,97-62.05,98.42a12,12,0,0,1-11.9,0C119.51,177,60,142.25,60,80Zm24,0c0,38.2,30.71,64.2,44,73.64C141.21,144.15,172,118,172,80a44,44,0,0,0-88,0Zm124.57,65.6a12,12,0,1,0-9.14,22.19C213.56,173.61,220,180.27,220,184c0,4-7.13,11.07-22.77,17.08-18.3,7-42.89,10.92-69.23,10.92s-50.93-3.88-69.23-10.92C43.12,195.07,36,188,36,184c0-3.73,6.44-10.39,20.57-16.21a12,12,0,1,0-9.14-22.19C31.27,152.25,12,164.31,12,184c0,34.14,58.36,52,116,52,29.22,0,56.86-4.44,77.85-12.52C220.1,218,244,205.59,244,184,244,164.31,224.73,152.25,208.57,145.6Z">
                                </path>
                            </svg>
                            <span class=" cor ms-1 text-bold">Localização</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 mb-4 shadow-sm border border-dark">
                    <img class="card-img-top" src="https://i.ibb.co/Gt30R5d/temploo.png" alt="Templo Batista Bíblico">
                    <div class="card-body text-center d-flex flex-column justify-content-between">
                        <h7 class="card-text text-bold">Templo Batista Bíblico - Porto Velho</h7>
                        <p class="card-text"><strong>Pr.</strong> Rafael Oliveira</p>
                        <a href="https://maps.app.goo.gl/BHS6ckdBgBsRcqhC6" name="btnlocalizacao" target="_blank"
                            class="btn btn-sm btn-dark shadow mt-1 border border-white" role="button"
                            aria-label="Localização">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff"
                                viewBox="0 0 256 256">
                                <path
                                    d="M108,80a20,20,0,1,1,20,20A20,20,0,0,1,108,80ZM60,80a68,68,0,0,1,136,0c0,62.25-59.51,97-62.05,98.42a12,12,0,0,1-11.9,0C119.51,177,60,142.25,60,80Zm24,0c0,38.2,30.71,64.2,44,73.64C141.21,144.15,172,118,172,80a44,44,0,0,0-88,0Zm124.57,65.6a12,12,0,1,0-9.14,22.19C213.56,173.61,220,180.27,220,184c0,4-7.13,11.07-22.77,17.08-18.3,7-42.89,10.92-69.23,10.92s-50.93-3.88-69.23-10.92C43.12,195.07,36,188,36,184c0-3.73,6.44-10.39,20.57-16.21a12,12,0,1,0-9.14-22.19C31.27,152.25,12,164.31,12,184c0,34.14,58.36,52,116,52,29.22,0,56.86-4.44,77.85-12.52C220.1,218,244,205.59,244,184,244,164.31,224.73,152.25,208.57,145.6Z">
                                </path>
                            </svg>
                            <span class=" cor ms-1 text-bold">Localização</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
