@extends('administracion.index')
@section('tab-content')
<div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-3">Crear Tercero</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-3">
                <a href="{{ route('terceros.index') }}" class="btn btn-danger">Regresar</a>
            </div>
        </div>
        <form class="row shadow m-3 p-3" method="post" action="{{route('terceros.store')}}">
            @csrf
            <div class="col-md-3 mt-3">
                <label for="naturalezaTercero">Seleccione Naturaleza *</label>
                <select class="form-select" aria-label="select" name="naturalezaTercero" id="naturalezaTercero" onchange="toggleNaturalezaTercero()">
                    <option value="PERSONA NATURAL" select>PERSONA NATURAL</option>
                    <option value="PERSONA JURIDICA">PERSONA JURIDICA</option>
                </select>
            </div>
            <div class="col-md-3 mt-2">
                <label for="nombre1Tercero" class="form-label">Primer Nombre *</label>
                <input type="text" class="form-control" id="nombre1Tercero" name="nombre1Tercero" placeholder="Ingrese nombre 1" value="{{old('nombre1Tercero')}}">
            </div>
            <div class="col-md-3 mt-2">
                <label for="nombre2Tercero" class="form-label">Segundo Nombre</label>
                <input type="text" class="form-control" id="nombre2Tercero" name="nombre2Tercero" placeholder="Ingrese nombre 2" value="{{old('nombre2Tercero')}}">
            </div>
            <div class="col-md-3 mt-2">
                <label for="apellido1Tercero" class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" id="apellido1Tercero" name="apellido1Tercero" placeholder="Ingrese apellido 1" value="{{old('apellido1Tercero')}}">
            </div>
            <div class="col-md-3 mt-2">
                <label for="apellido2Tercero" class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" id="apellido2Tercero" name="apellido2Tercero" placeholder="Ingrese apellido 2" value="{{old('apellido2Tercero')}}">
            </div>
            <div class="col-md-3 mt-2">
                <label for="dvTercero" class="form-label">DV</label>
                <input type="text" class="form-control" id="dvTercero" name="dvTercero" placeholder="Ingrese DV" value="{{old('dvTercero')}}">
            </div>
            <div class="col-md-6 mt-2">
                <label for="nDocumento" class="form-label">Número Documento *</label>
                <input type="text" class="form-control" id="nDocumento" name="nDocumento" placeholder="Ingrese número Documento" value="{{old('nDocumento')}}">
            </div>
            <div class="col-md-4 mt-2">
                <label for="direccionTercero" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccionTercero" name="direccionTercero" placeholder="Ingrese dirección" value="{{old('direccionTercero')}}">
            </div>
            <div class="col-md-4 mt-2">
                <label for="telefonoTercero" class="form-label">Teléfono</label>
                <input type="number" class="form-control" id="telefonoTercero" name="telefonoTercero" placeholder="Ingrese teléfono" value="{{old('telefonoTercero')}}">
            </div>
            <div class="col-md-4 mt-2">
                <label for="movilTercero" class="form-label">Móvil</label>
                <input type="number" class="form-control" id="movilTercero" name="movilTercero" placeholder="Ingrese móvil" value="{{old('movilTercero')}}">
            </div>
            <div class="col-md-4 mt-2">
                <label for="contactoTercero" class="form-label">Contacto</label>
                <input type="text" class="form-control" id="contactoTercero" name="contactoTercero" placeholder="Ingrese contacto" value="{{old('contactoTercero')}}">
            </div>
            <div class="col-md-4 mt-2">
                <label for="ceduContactoTercero" class="form-label">Documento Contacto</label>
                <input type="text" class="form-control" id="ceduContactoTercero" name="ceduContactoTercero" placeholder="Ingrese dirección" value="{{old('ceduContactoTercero')}}">
            </div>
            <div class="col-md-4 mt-2">
                <label for="direccionContacto" class="form-label">Dirección Contacto</label>
                <input type="text" class="form-control" id="direccionContacto" name="direccionContacto" placeholder="Ingrese dirección Contacto" value="{{old('direccionContacto')}}">
            </div>
            <div class="col-md-4 mt-2">
                <label for="telefonoContacto" class="form-label">Teléfono Contacto</label>
                <input type="text" class="form-control" id="telefonoContacto" name="telefonoContacto" placeholder="Ingrese teléfono Contacto" value="{{old('telefonoContacto')}}">
            </div>
            <div class="col-md-4 mt-2">
                <label for="mailTercero" class="form-label">Correo Electrónico</label>
                <input type="text" class="form-control" id="mailTercero" name="mailTercero" placeholder="Ingrese correo" value="{{old('mailTercero')}}">
            </div>
            <div class="col-md-4 mt-3">
                <label for="idIdentidad">Seleccione Tipo Tercero</label>
                <select class="form-select" aria-label="select" name="tipoTercero">
                    <option value="CLIENTE" select>CLIENTE</option>
                    <option value="PROVEEDOR">PROVEEDOR</option>
                    <option value="EMPLEADO">EMPLEADO</option>
                    <option value="ASOCIADO">ASOCIADO</option>
                </select>
            </div>
            <div class="col-md-12 mt-2">
                <label for="obsTercero" class="form-label">Observaciones</label>
                <textarea rows="3" class="form-control" id="obsTercero" name="obsTercero" placeholder="Ingrese observaciones">{{old('obsTercero')}}</textarea>
            </div>
            <div class="col-md-6 mt-2">
                <label for="rutaRut" class="form-label">Ruta Rut</label>
                <input type="text" class="form-control" id="rutaRut" name="rutaRut" placeholder="Ingrese la ruta del rut" value="{{old('rutaRut')}}">
            </div>
            <div class="col-md-6 mt-3">
                <label for="idIdentidad">Seleccione Identidad</label>
                <select name="idIdentidad" id="idIdentidad" class="form-control">
                    @foreach($identidades as $identidad)
                        <option value="{{ $identidad->idIdentidad }}">
                        {{ $identidad->nombreIdentidad }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mt-3">
                <label for="idSociedad">Seleccione Sociedad</label>
                <select name="idSociedad" id="idSociedad" class="form-control">
                    @foreach($sociedades as $sociedad)
                        <option value="{{ $sociedad->idSociedad }}">
                        {{ $sociedad->idSociedad }} - {{ $sociedad->nombreSociedad}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mt-3">
                <label for="departamento">Seleccione Departamento *</label>
                <select id="departamento" name="departamento" class="form-control" onchange="updateCities()">
                    <option value="">Seleccione un Departamento</option>
                    @foreach($departamentos as $nombre => $poblacionesGroup)
                        <option value="{{ $nombre }}">{{ $nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mt-3">
                <label for="ciudad">Seleccione Ciudad *</label>
                <select id="ciudad" name="idCenPob" class="form-control" disabled>
                    <option value="">Seleccione una Ciudad</option>
                </select>
            </div>
            <div class="col-md-6 mt-3">
                <label for="idPaises">Seleccione País</label>
                <select name="idPaises" id="idPaises" class="form-control">
                    @foreach($paises as $pais)
                        <option value="{{ $pais->idPaises }}">
                        {{ $pais->nombrePais }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 mt-3 text-center">
                <label for="flexCheckDefault" class="form-label">Aut Data</label>
                <div class="form-check d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" value="1" name="autData" id="flexCheckDefault"
                    {{ old('autData') ? 'checked' : '' }}>
                </div>
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
            <small class="text-body-secondary mt-4">Recuerde que la empresa asignada para el usuario iniciado es: {{$empresa->nombre}}.</small>
            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

    <script>

        const poblaciones = @json($poblaciones); // Esto contendrá todas las poblaciones
        function updateCities() {

            const departamentoSelect = document.getElementById('departamento');
            const ciudadSelect = document.getElementById('ciudad');
            
            // Limpiar las opciones de ciudad
            ciudadSelect.innerHTML = '<option value="">Seleccione una Ciudad</option>';
            ciudadSelect.disabled = true;

            const selectedDepartamento = departamentoSelect.value;

            if (selectedDepartamento) {
                // Filtrar las poblaciones por el departamento seleccionado
                const ciudades = poblaciones.filter(p => p.Departamento === selectedDepartamento);
                ciudades.forEach(poblacion => {
                    const option = document.createElement('option');
                    option.value = poblacion.idCenPob; // ID de la ciudad
                    option.textContent = poblacion.CentroPoblado; // Nombre de la ciudad
                    ciudadSelect.appendChild(option);
                });
                ciudadSelect.disabled = false; // Habilitar el select de ciudades
            }
        }

        function toggleNaturalezaTercero() {
            const naturalezaSelect = document.getElementById('naturalezaTercero');
            const segundoNombreInput = document.getElementById('nombre2Tercero');
            const primerApellidoInput = document.getElementById('apellido1Tercero');
            const segudoApellidoInput = document.getElementById('apellido2Tercero');
            const dvInput = document.getElementById('dvTercero');

            // Verificar si la opción seleccionada es "PERSONA NATURAL"
            if (naturalezaSelect.value === 'PERSONA NATURAL') {
                segundoNombreInput.disabled = false; 
                primerApellidoInput.disabled = false;
                segudoApellidoInput.disabled = false;
                dvInput.disabled = true;
            } else {
                segundoNombreInput.disabled = true;
                primerApellidoInput.disabled = true;
                segudoApellidoInput.disabled = true;
                dvInput.disabled = false;
            }
        }

        document.addEventListener('DOMContentLoaded', toggleNaturalezaTercero);
    </script>
@endsection