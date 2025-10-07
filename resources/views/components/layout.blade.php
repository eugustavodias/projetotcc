@props([ 'title' => env('APP_NAME', 'IBBB'), 'background_color' => '', 'class' => '', 'disableNavigation' => false ])
<!DOCTYPE html>
<html lang="pt-br" class="bg-gray-200">
  <head>
    <title>{{ $title }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('librarys/fontawesome/js/all.js') }}" defer></script>
    <script src="{{ asset('librarys/select2/dist/js/select2.js') }}" defer></script>
    <script src="{{ asset('librarys/jquery-mask/src/jquery.mask.js') }}" defer></script>
    <script src="{{ asset('librarys/select2/dist/js/i18n/pt-BR.js') }}" defer></script>
    <script src="{{ asset('librarys/bootstrap-5/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('librarys/jquery-validation/dist/jquery.validate.js') }}" defer></script>
    <script src="{{ asset('librarys/jquery-validation/dist/localization/messages_pt_BR.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>
  <body class="{{ $background_color.' font-sans antialiased' }}">
    @if(!$disableNavigation)
      <x-navgation/>
    @endif
    <x-notification />
    <div class="{{ $class }}" style="width: 100%; height: 100%;">
      {{ $slot }}
    </div>

    <div class="help-button no-print">
      <a class="btn btn-info" href="{{env('URL_GLPI')}}" target="_blank">
        <p class="m-0">Me Ajuda!</p>
      </a>
    </div>
  </body>
</html>
