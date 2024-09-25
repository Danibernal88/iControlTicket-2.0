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
                    data-search-selector="#customSearch">
                <thead>
                    <tr>
                        <th data-field="placa">Placa</th>
                        <th data-field="nDocumento">Documento Prop.</th>
                        <th data-field="nombreCompleto">Nombre Prop.</th>
                        <th data-field="fechaVtoCDA">Vto CDA</th>
                        <th data-field="fechaVtoTO">Vto TO</th>
                        <th data-field="fechaVtoExtintor">Vto Extintor</th>
                        <th data-field="fechaVtoSOAT">Vto SOAT</th>
                        <th data-field="fechaVtoRCC">Vto RCC</th>
                        <th data-field="fechaVtoRCE">Vto RCE</th>
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
                                <td><a href="{{route('vehiculos.edit',$vehiculo)}}" class="btn btn-outline-success">Editar</a></td>
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