<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://i.ibb.co/C5XR7cB/logo-betel.png">
    <title>{{ config('app.name', 'IBBB') }}</title>
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('librarys/jodit/js/jodit.js') }}" defer></script>
    <script src="{{ asset('librarys/fontawesome/js/all.js') }}" defer></script>
    <script src="{{ asset('librarys/select2/dist/js/select2.js') }}" defer></script>
    <script src="{{ asset('librarys/jquery-mask/src/jquery.mask.js') }}" defer></script>
    <script src="{{ asset('librarys/select2/dist/js/i18n/pt-BR.js') }}" defer></script>
    <script src="{{ asset('librarys/bootstrap-5/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('librarys/jquery-validation/dist/jquery.validate.js') }}" defer></script>
    <script src="{{ asset('librarys/jquery-validation/dist/localization/messages_pt_BR.js') }}" defer></script>
    <script src="{{ asset('librarys/tom-select/tom-select.ts') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
</head>


{{-- Página Sobre --}}
<style>
    .text-justify {
        text-align: justify;
    }
</style>

{{-- Página Inicial --}}
<style>
    .container-fluid.bg-light {
        min-height: 300px;
    }

    @media (max-width: 1024px) {
        .navbar-nav {
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn.btn-dark {
            padding: 5px 10px;
        }

        .navbar-toggler {
            margin-left: auto;
        }
    }
</style>

{{-- Página Eventos --}}
<style>
    @media (max-width: 375px) {
        .custom-navbar {
            flex-wrap: nowrap;
        }

        .custom-navbar h1 {
            font-size: 18px;
        }

        .custom-navbar .btn {
            font-size: 12px;
            padding: 5px 10px;
        }
    }
</style>

{{-- Lista Membros --}}
<style>
    @media (min-width: 320px) and (max-width: 375px) {
        .mb-custom {
            margin-bottom: 0.25rem !important;
        }
    }
</style>

{{-- Imagens --}}
<style>
    .download-icon {
        display: none;
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        padding: 10px;
        transition: opacity 0.3s ease;
    }

    .card:hover .download-icon {
        display: block;
    }

    .position-relative img {
        position: relative;
        z-index: 1;
    }

    .position-relative .download-icon {
        z-index: 2;
    }
</style>

{{-- Style --}}

<style>
    .cor:hover {
        color: #28A745 !important;
        text-decoration: none;
    }
</style>


<body class="d-flex flex-column min-vh-100" style="background-color: #e7e3e3;">
    <x-notification />
    @include('layouts.navgation')

    <main class="flex-grow-1">
        @yield('master')
    </main>

    @include('layouts.footer')
</body>


</html>
