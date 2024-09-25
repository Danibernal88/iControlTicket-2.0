<x-app-layout>
<div class="d-flex align-items-start">
  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link {{ request()->is('administracion/mi-empresa*') ? 'active' : '' }}" href="{{ route('empresa.show') }}">Información Empresa</a>
    <a class="nav-link {{ request()->is('administracion/terceros*') ? 'active' : '' }}" href="{{ route('terceros.index') }}">Gestión Terceros</a>
    <a class="nav-link {{ request()->is('administracion/hojaVidas*') ? 'active' : '' }}" href="{{ route('hojaVidas.index') }}">Hojas de Vida</a>
    <a class="nav-link {{ request()->is('administracion/poblaciones*') ? 'active' : '' }}" href="{{ route('poblaciones.index') }}">Poblaciones</a> 
  </div>
    <div class="tab-content flex-grow-1">
        @yield('tab-content')
    </div>
</div>
</x-app-layout>
