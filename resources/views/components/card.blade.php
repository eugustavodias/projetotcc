@props([
  'header' => null,
  'classHeader' => '',
  'class' => ''
])

<div class="card">
  @if($header)
    <div class="{{ 'card-header '.$classHeader }}">
      {{ $header }}
    </div>
  @endif
  <div class="{{ 'card-body '.$class }}">
    {{ $slot }}
  </div>
</div>