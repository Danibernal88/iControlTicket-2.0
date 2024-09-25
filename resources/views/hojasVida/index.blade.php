@extends('administracion.index')
@section('tab-content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center alert alert-success">Hojas de Vida</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mt-3">
            <label for="estadoFiltro">Filtrar por Estado</label>
            <select class="form-select" id="estadoFiltro" onchange="filterRows()">
                <option value="TODOS" select>Todos</option>
                <option value="ACTIVO">Activo</option>
                <option value="INACTIVO">Inactivo</option>
            </select>
        </div>
        <div class="col-md-3 mt-3">
            <label for="tipoEmpl">Seleccione Condición</label>
            <select class="form-select" id="condFiltro" onchange="filterRows()">
                <option value="TODOS" select>Todos</option>
                <option value="ADMINISTRATIVO">Administrativo</option>
                <option value="CONDUCTOR">Conductor</option>
                <option value="PROPIETARIO">Propietario</option>
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <table class="table text-center" id="hojasVidaTable">
                <thead>
                    <tr>
                        <th scope="col">
                            <input type="checkbox" id="selectAll" onclick="toggleCheckboxes(this)"> 
                        </th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">DV</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Móvil</th>
                        <th scope="col">Email</th>
                        <th scope="col">Vencimiento S.S</th>
                        <th scope="col">Condición</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hojasVidaTerceros as $tercero)
                        @foreach($tercero->hojasVida as $hojaVida)
                            <tr data-estado="{{ $hojaVida->estado }}" data-cond="{{ $hojaVida->tipoEmpl}}">
                                <td>
                                    <input type="checkbox" class="rowCheckbox" name="idhv[]" value="{{ $hojaVida->idhv }}" onchange="checkCheckboxes()">
                                </td>
                                <td>{{$tercero->nombreCompleto}}</td>
                                <td>{{$tercero->dvTercero}}</td>
                                <td>{{$tercero->nDocumento}}</td>
                                <td>{{$tercero->movilTercero}}</td>
                                <td>{{$tercero->mailTercero}}</td>
                                <td>
                                    @if($hojaVida->seguridadSocial->isNotEmpty())
                                        {{ $hojaVida->seguridadSocial->first()->vtoSegSocial}}
                                    @else
                                        No disponible
                                    @endif
                                </td>
                                <td>{{$hojaVida->tipoEmpl}}</td>
                                <td><a href="{{route('hojaVidas.edit',$hojaVida)}}" class="btn btn-outline-success">Editar</a></td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table> 
        </div>
        <div class="col-2 mt-3">
            <a href="{{route("hojaVidas.create")}}" class="btn btn-primary">
                Nueva hoja de vida
            </a>
        </div>
        <div class="col-3 mt-3 ">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#entityModal" id="seguridad-social-id" disabled>
                Cargar Seguridad Social
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="entityModal" tabindex="-1" aria-labelledby="entityModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="entityModalLabel">Cargar Seguridad Social</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="seguridadSocialForm" action="{{ route('seguridadSocialModal.store') }}" method="POST">
                            @csrf
                            <input type="hidden" id="selectedIdhv" name="idhv">
                            <div class="mb-3">
                                <label for="fechaPago" class="form-label">Fecha de pago</label>
                                <input type="datetime-local" class="form-control" id="fechaPago" name="fechaPago" placeholder="Fecha pago seguridad social" value="{{old('fechaPago')}}">
                            </div>
                            <div class="mb-3">
                            <label for="periodoSegSocial">Seleccione Periodo seguridad social</label>
                                <select class="form-select" aria-label="select" name="periodoSegSocial">
                                    <option value="ENERO" select>ENERO</option>
                                    <option value="FEBRERO">FEBRERO</option>
                                    <option value="MARZO">MARZO</option>
                                    <option value="ABRIL">ABRIL</option>
                                    <option value="MAYO">MAYO</option>
                                    <option value="JUNIO">JUNIO</option>
                                    <option value="JULIO">JULIO</option>
                                    <option value="AGOSTO">AGOSTO</option>
                                    <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                                    <option value="OCTUBRE">OCTUBRE</option>
                                    <option value="NOVIEMBRE">NOVIEMBRE</option>
                                    <option value="DICIEMBRE">DICIEMBRE</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="vtoSegSocial" class="form-label">Fecha de vencimiento *</label>
                                <input type="datetime-local" class="form-control" id="vtoSegSocial" name="vtoSegSocial" placeholder="Vencimiento seguridad socual" value="{{old('vtoSegSocial')}}" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" onclick="submitForm()">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    function checkCheckboxes() {
        const checkboxes = document.querySelectorAll('.rowCheckbox');
        const actionButton = document.getElementById('seguridad-social-id');

        // Verifica si al menos uno de los checkboxes está seleccionado
        const atLeastOneChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

        // Habilita o deshabilita el botón según el estado de los checkboxes
        actionButton.disabled = !atLeastOneChecked;
    }

    function toggleCheckboxes(selectAllCheckbox) {
        const checkboxes = document.querySelectorAll('.rowCheckbox');
    
        checkboxes.forEach((checkbox) => {
            checkbox.checked = selectAllCheckbox.checked;
        });
        checkCheckboxes();
    }

    function submitForm(){

        const vtoSS = document.getElementById('vtoSegSocial');

        if (vtoSS.value.trim() === ''){
            vtoSS.focus();
        } else {
            const checkboxes = document.querySelectorAll('.rowCheckbox:checked');
            const selectedIdhv = Array.from(checkboxes).map(checkbox => checkbox.value);

            document.getElementById('selectedIdhv').value = selectedIdhv.join(',');
            document.getElementById('seguridadSocialForm').submit();
        }
        
    }

    function filterRows() {
        const estadoFiltro = document.getElementById('estadoFiltro').value;
        const condFiltro = document.getElementById('condFiltro').value;
        const rows = document.querySelectorAll('#hojasVidaTable tbody tr');

        rows.forEach(row => {
            const estado = row.getAttribute('data-estado');
            const condicion = row.getAttribute('data-cond');

            // Comprobar si la fila debe mostrarse
            const estadoMatches = (estadoFiltro === 'TODOS' || estado === estadoFiltro);
            const condMatches = (condFiltro === 'TODOS' || condicion === condFiltro);

            // Mostrar la fila si ambas condiciones son verdaderas
            if (estadoMatches && condMatches) {
                row.style.display = ''; // Mostrar la fila
            } else {
                row.style.display = 'none'; // Ocultar la fila
            }
        });
    }
</script>
@endsection
