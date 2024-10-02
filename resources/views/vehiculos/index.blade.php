@extends('prestacionServicio.index')
@section('tab-content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center alert alert-success">Vehiculos</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row d-flex justify-content-end">
                <div class="col-md-3 my-2">
                    <input type="text" id="customSearch" class="form-control"  placeholder="Buscar">
                </div> 
            </div>
            <table id="vehiculosTable" 
                    data-toggle="table"
                    data-pagination="true" 
                    data-search="true"
                    data-locale="es-MX"
                    data-search-selector="#customSearch">
                <thead>
                    <tr>
                        <th data-field="placa" data-halign="center" data-align="center">Placa</th>
                        <th data-field="nDocumento" data-halign="center" data-align="center">Documento Prop.</th>
                        <th data-field="nombreCompleto" data-halign="center" data-align="center">Nombre Prop.</th>
                        <th data-field="fechaVtoCDA" data-halign="center" data-align="center">Vto CDA</th>
                        <th data-field="fechaVtoTO" data-halign="center" data-align="center">Vto TO</th>
                        <th data-field="fechaVtoExtintor" data-halign="center" data-align="center">Vto Extintor</th>
                        <th data-field="fechaVtoSOAT" data-halign="center" data-align="center">Vto SOAT</th>
                        <th data-field="fechaVtoRCC" data-halign="center" data-align="center">Vto RCC</th>
                        <th data-field="fechaVtoRCE" data-halign="center" data-align="center">Vto RCE</th>
                        <th data-field="editar"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehiculos as $vehiculo)
                        @if($vehiculo->tercero)
                            <tr>
                                <td>{{$vehiculo->placa}}</td>
                                <td>{{$vehiculo->tercero->nDocumento}}</td>
                                <td>{{$vehiculo->tercero->nombreCompleto}}</td>
                                <td>  
                                    @if($vehiculo->fechaVtoCDA)
                                        {{ \Carbon\Carbon::parse($vehiculo->fechaVtoCDA)->format('d-m-Y') }}
                                    @else
                                        NA
                                    @endif
                                </td>
                                <td>
                                    @if($vehiculo->fechaVtoTO)
                                        {{\Carbon\Carbon::parse($vehiculo->fechaVtoTO)->format('d-m-Y')}}
                                    @else
                                        NA
                                    @endif
                                </td>
                                <td>
                                    @if($vehiculo->fechaVtoExtintor)
                                        {{\Carbon\Carbon::parse($vehiculo->fechaVtoExtintor)->format('d-m-Y')}}
                                    @else
                                        NA
                                    @endif
                                </td>
                                <td>
                                    @if($vehiculo->fechaVtoSOAT)
                                        {{\Carbon\Carbon::parse($vehiculo->fechaVtoSOAT)->format('d-m-Y')}}
                                    @else
                                        NA
                                    @endif
                                </td>
                                <td>
                                    @if($vehiculo->fechaVtoRCC)
                                        {{\Carbon\Carbon::parse($vehiculo->fechaVtoRCC)->format('d-m-Y')}}
                                    @else
                                        NA
                                    @endif
                                </td>
                                <td>
                                    @if($vehiculo->fechaVtoRCE)
                                        {{\Carbon\Carbon::parse($vehiculo->fechaVtoRCE)->format('d-m-Y')}}
                                    @else
                                        NA
                                    @endif
                                    </td>
                                <td>
                                    <a href="{{route('vehiculos.edit',$vehiculo)}}" class="btn btn-outline-success">Editar</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table> 
        </div>
        <div class="col-12 mt-3">
            <a href="{{route("vehiculos.create")}}" class="btn btn-primary">
                Crear nuevo vehículo
            </a>
        </div>
    </div>
</div>
@endsection