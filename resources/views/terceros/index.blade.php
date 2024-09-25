@extends('administracion.index')
@section('tab-content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center alert alert-success">Terceros</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">DV</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Móvil</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Tipo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($terceros as $tercero)
                        <tr>
                            <td>{{$tercero->nombreCompleto}}</td>
                            <td>{{$tercero->dvTercero}}</td>
                            <td>{{$tercero->nDocumento}}</td>
                            <td>{{$tercero->movilTercero}}</td>
                            <td>{{$tercero->mailTercero}}</td>
                            <td>{{$tercero->poblacion->Departamento}} - {{$tercero->poblacion->Municipio}}</td>
                            <td>{{$tercero->tipoTercero}}</td>
                            <td><a href="{{route('terceros.edit',$tercero)}}" class="btn btn-outline-success">Editar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
        <div class="col-12 mt-3">
            <a href="{{route("terceros.create")}}" class="btn btn-primary">
                Crear nuevo tercero
        </a>
        </div>
    </div>
</div>
@endsection
