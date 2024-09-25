@extends('administracion.index')
@section('tab-content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mt-3">Crear Población</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mx-3">
            <a href="{{ route('poblaciones.index') }}" class="btn btn-danger">Regresar</a>
        </div>
    </div>
    <form class="row shadow m-3 p-3" method="post" action="{{route('poblaciones.store')}}">
        @csrf
        <div class="col-md-4 mt-3">
            <label for="departamento">Departamento</label>
            <select id="departamento" class="form-control" onchange="cargarMunicipios()" name="Departamento">
                <option value="">Seleccione un departamento</option>
                @foreach($departamentos as $departamento)
                    <option value="{{ $departamento->departamento }}">{{ $departamento->departamento }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 mt-3">
            <label for="municipio">Municipio</label>
            <select id="municipio" class="form-control" name="Municipio" disabled>
                <option value="">Seleccione un municipio</option>
            </select>
        </div>
        <div class="col-md-4 mt-2">
            <label for="CentroPoblado" class="form-label">Centro Poblado</label>
            <input type="text" class="form-control" id="CentroPoblado" name="CentroPoblado" placeholder="Ingrese centro poblado" value="{{old('CentroPoblado')}}">
        </div>
        @if($errors->any())
            <div class="col-12 mt-2">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>

<script>
// Datos de poblaciones
const poblacionesData = @json($poblaciones);

function cargarMunicipios() {
    const departamentoSeleccionado = document.getElementById('departamento').value;
    const municipioSelect = document.getElementById('municipio');

    // Limpiar el select de municipios
    municipioSelect.innerHTML = '<option value="">Seleccione un municipio</option>';
    
    if (departamentoSeleccionado) {
        // Filtrar los municipios del departamento seleccionado
        const municipiosFiltrados = poblacionesData.filter(p => p.Departamento === departamentoSeleccionado);

        // Usar un Set para almacenar municipios únicos
        const municipiosUnicos = new Set();

        // Llenar el Set con los nombres de los municipios
        municipiosFiltrados.forEach(poblacion => {
            municipiosUnicos.add(poblacion.Municipio);
        });

        // Llenar el select de municipios
        municipiosUnicos.forEach(Municipio => {
            const option = document.createElement('option');
            option.value = Municipio;
            option.textContent = Municipio;
            municipioSelect.appendChild(option);
        });

        // Habilitar el select de municipios
        municipioSelect.disabled = false;
    } else {
        // Deshabilitar si no hay departamento seleccionado
        municipioSelect.disabled = true;
    }
}
</script>
@endsection