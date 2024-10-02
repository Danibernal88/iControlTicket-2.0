@extends('administracion.index')
@section('tab-content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center alert alert-success">Poblaciones</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row d-flex justify-content-end">
                <div class="col-md-3 my-2">
                    <input type="text" id="customSearch" class="form-control"  placeholder="Buscar">
                </div> 
            </div>
            <table id="poblacionesTable" 
                    data-toggle="table"
                    data-pagination="true" 
                    data-search="true" 
                    data-search-selector="#customSearch"
                    data-locale="es-MX">
                <thead>
                    <tr>
                        <th data-field="departamento" data-halign="center" data-align="center">Departamento</th>
                        <th data-field="municipio" data-halign="center" data-align="center">Municipio</th>
                        <th data-field="centroPoblado" data-halign="center" data-align="center">Centro Poblado</th>
                        <th data-field="dane" data-halign="center" data-align="center">Dane</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($poblaciones as $poblacion)
                        <tr>
                            <td>{{$poblacion->Departamento}}</td>
                            <td>{{$poblacion->Municipio}}</td>
                            <td>{{$poblacion->CentroPoblado}}</td>
                            <td>{{$poblacion->DANE}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
        <div class="col-12 mt-3">
            <a href="{{route("poblaciones.create")}}" class="btn btn-primary">
                Crear nueva poblacion
            </a>
        </div>
    </div>
</div>


@endsection
