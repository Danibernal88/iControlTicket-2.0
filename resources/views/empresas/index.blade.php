@extends('administracion.index')
@section('tab-content')
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card text-center">
                    <img src="{{ asset('storage/'.$empresa->foto) }}" class="img-fluid" alt="Logo Empresa" 
                    style="height: 300px; object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $empresa->nombre }}</h5>
                        <p class="card-text">{{ $empresa->Lema }}</p>
                        <div class="container">
                            <div class="row text-center mt-5">
                                <div class="col-4">
                                    <small class="text-body-secondary">Dirección</small>
                                    <p>{{ $empresa->direccion }}</p>
                                </div>
                                <div class="col-4">
                                    <small class="text-body-secondary">Teléfono(s)</small>
                                    <p>{{ $empresa->telefono }}</p>
                                </div>
                                <div class="col-4">
                                    <small class="text-body-secondary">Móvil</small>
                                    <p>{{ $empresa->movil }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row text-center mt-4">
                                <div class="col-4">
                                    <small class="text-body-secondary">Email</small>
                                    <p>{{ $empresa->email }}</p>
                                </div>
                                <div class="col-4">
                                    <small class="text-body-secondary">Web</small>
                                    <p>{{ $empresa->web == '' ? 'No diligenciada':$empresa->web }}</p>
                                </div>
                                <div class="col-4">
                                    <small class="text-body-secondary">Código Territorial</small>
                                    <p>{{ $empresa->codDirTerritorial }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row text-center mt-4">
                                <div class="col-4">
                                    <small class="text-body-secondary">Resolución Habilitación</small>
                                    <p>{{ $empresa->fechaHab }}</p>
                                </div>
                                <div class="col-4">
                                    <small class="text-body-secondary">NIT de la Empresa</small>
                                    <p>{{ $empresa->NitEmpresa}}</p>
                                </div>
                                <div class="col-4">
                                    <small class="text-body-secondary">Régimen</small>
                                    <p>{{ $empresa->Regimen }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row text-center mt-4">
                                <div class="col-4">
                                    <small class="text-body-secondary">Representante</small>
                                    <p>{{ $empresa->RLEmpresa }}</p>
                                </div>
                                <div class="col-4">
                                    <small class="text-body-secondary">Nivel de Servicio</small>
                                    <p>{{ $empresa->nivelServ}}</p>
                                </div>
                                <div class="col-4">
                                    <small class="text-body-secondary">Ciudad / Departamento</small>
                                    <p>{{ $empresa->poblaciones ? $empresa->poblaciones->CentroPoblado : 'No disponible' }} / {{$empresa->poblaciones ? $empresa->poblaciones->Departamento : 'No disponible'}}</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <small class="text-body-secondary">Certificación ISO</small>
                                <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" {{$empresa->logoISO ? 'checked':''}} disabled>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('empresa.edit') }}" class="btn btn-secondary mt-4">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
