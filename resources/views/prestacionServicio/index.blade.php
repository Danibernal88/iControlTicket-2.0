<x-app-layout>
<div class="d-flex align-items-start">
  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link {{ request()->is('prestacion-servicio/vehiculos*') ? 'active' : '' }}" href="{{ route('vehiculos.index') }}">Vehiculos</a>
  </div>
    <div class="tab-content flex-grow-1">
        @yield('tab-content')
    </div>
</div>
</x-app-layout>
