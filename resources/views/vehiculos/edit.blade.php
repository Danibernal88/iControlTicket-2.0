@extends('prestacionServicio.index')
@section('tab-content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mt-3">Editar {{$vehiculo->placa}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-1 mx-3">
            <a href="{{ route('vehiculos.index') }}" class="btn btn-danger">Regresar</a>
        </div>
        <div class="col-1 mx-3 d-flex justify-content-center">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#bimestModal" id="bimest-id">
                Bimestrales
            </button>
        </div>
        <div class="col-1 mx-3 d-flex justify-content-center">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#condModal" id="bimest-id">
                Conductores
            </button>
        </div>
    </div>
    <!-- Modal Bimestrales-->
    <div class="modal fade" id="bimestModal" tabindex="-1" aria-labelledby="bimestModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bimestModalLabel">Bimestrales</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row d-flex justify-content-end">
                                <div class="col-md-3 my-2">
                                    <input type="text" id="customSearchBim" class="form-control"  placeholder="Buscar">
                                </div> 
                            </div>
                            <table id="bimestralesTable" 
                                    data-toggle="table"
                                    data-pagination="true" 
                                    data-search="true"
                                    data-locale="es-MX"
                                    data-search-selector="#customSearchBim">
                                <thead>
                                    <tr>
                                        <th data-field="placa" data-halign="center" data-align="center">Nombre CDA</th>
                                        <th data-field="nDocumento" data-halign="center" data-align="center">Fecha Expedición</th>
                                        <th data-field="nombreCompleto" data-halign="center" data-align="center">Fecha Vencimiento</th>
                                        <th data-field="fechaVtoCDA" data-halign="center" data-align="center">N° Certificado</th>
                                        <th data-field="fechaVtoTO" data-halign="center" data-align="center">Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bimestrales as $bimestral)
                                        <tr>
                                            <td>{{$bimestral->nombreCDA}}</td>
                                            <td>  
                                                @if($bimestral->fechaExpRPbimest)
                                                    {{ \Carbon\Carbon::parse($bimestral->fechaExpRPbimest)->format('d-m-Y') }}
                                                @else
                                                    NA
                                                @endif
                                            </td>
                                            <td>
                                                @if($bimestral->fechaVtoRPbimest)
                                                    {{\Carbon\Carbon::parse($bimestral->fechaVtoRPbimest)->format('d-m-Y')}}
                                                @else
                                                    NA
                                                @endif
                                            </td>
                                            <td>{{$bimestral->nroCertCDARPbimest}}</td>
                                            <td>{{$bimestral->descripcionRPbimest}}</td>
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table> 
                        </div>
                    </div>
                    <h5 class="mt-5">Ingresar Nuevo Bimestral</h5>
                    <form id="bimestralForm" action="{{ route('bimestralModal.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <input type="hidden" id="selectedVehiculo" name="idVehiculo">
                            <div class="col-md-6 mt-2">
                                <label for="nombreCDA" class="form-label">Nombre CDA</label>
                                <input type="text" class="form-control" id="nombreCDA" name="nombreCDA" placeholder="Ingrese CDA" value="{{old('nombreCDA')}}">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="fechaExpRPbimest" class="form-label">Fecha Expedición</label>
                                <input type="datetime-local" class="form-control" id="fechaExpRPbimest" name="fechaExpRPbimest" value="{{old('fechaExpRPbimest')}}" required>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="fechaVtoRPbimest" class="form-label">Fecha Vencimiento</label>
                                <input type="datetime-local" class="form-control" id="fechaVtoRPbimest" name="fechaVtoRPbimest" value="{{old('fechaVtoRPbimest')}}" required>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="nroCertCDARPbimest" class="form-label">N° Certificado</label>
                                <input type="number" class="form-control" id="nroCertCDARPbimest" name="nroCertCDARPbimest" placeholder="Ingrese numero certificado" value="{{old('nroCertCDARPbimest')}}">
                            </div>
                            <div class="col-md-12 mt-2">
                                <label for="descripcionRPbimest" class="form-label">Descripción</label>
                                <textarea rows="2" class="form-control" id="descripcionRPbimest" name="descripcionRPbimest" placeholder="Ingrese descripción">{{old('descripcionRPbimest')}}</textarea>
                            </div>
                            <div class="modal-footer mt-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" onclick="submitFormBimestral({{$vehiculo->id}})">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Conductores-->
    <div class="modal fade" id="condModal" tabindex="-1" aria-labelledby="condModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="condModalLabel">Conductores</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- tabs nav-->
                        <nav>
                            <div class="nav nav-tabs mt-5" id="nav-tab-conductores" role="tablist">
                                <button class="nav-link active" id="nav-activos-tab" data-bs-toggle="tab" data-bs-target="#nav-activos" type="button" role="tab" aria-controls="nav-activos" aria-selected="true">Activos</button>
                                <button class="nav-link" id="nav-retirados-tab" data-bs-toggle="tab" data-bs-target="#nav-retirados" type="button" role="tab" aria-controls="nav-retirados" aria-selected="false">Retirados</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-activos" role="tabpanel" aria-labelledby="nav-activos-tab" tabindex="0">
                                <div class="col-12">
                                    <div class="row d-flex justify-content-end">
                                        <div class="col-md-3 my-2">
                                            <input type="text" id="customSearchCond" class="form-control"  placeholder="Buscar">
                                        </div> 
                                    </div>
                                    <table id="conductoresTable" 
                                            data-toggle="table"
                                            data-pagination="true" 
                                            data-search="true"
                                            data-locale="es-MX"
                                            data-search-selector="#customSearchCond">
                                        <thead>
                                            <tr>
                                                <th data-field="nombreCompleto" data-halign="center" data-align="center">Nombre Conductor</th>
                                                <th data-field="ceduContactoTercero" data-halign="center" data-align="center">Identificación</th>
                                                <th data-field="vigLicencia" data-halign="center" data-align="center">Vigencia Licencia</th>
                                                <th data-field="categoria" data-halign="center" data-align="center">Categoría Licencia</th>
                                                <th data-field="retirar" data-halign="center" data-align="center">Retirar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($conductoresActivos as $conductor)
                                                <tr>
                                                    <td>{{$conductor->hojaVida->tercero->nombreCompleto}}</td>
                                                    <td>{{$conductor->hojaVida->tercero->nDocumento}}</td>
                                                    <td>
                                                        @if($conductor->hojaVida->vigLicencia)
                                                            {{\Carbon\Carbon::parse($conductor->hojaVida->vigLicencia)->format('d-m-Y')}}
                                                        @else
                                                            NA
                                                        @endif
                                                    </td>
                                                    <td>{{$conductor->hojaVida->categoria}}</td>
                                                    <td>
                                                        <form action="{{ route('conductorModal.retirar', $conductor->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('POST')
                                                            <button type="submit" class="btn btn-outline-success">Retirar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table> 
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-retirados" role="tabpanel" aria-labelledby="nav-retirados-tab" tabindex="0">
                                <div class="row d-flex justify-content-end">
                                    <div class="col-md-3 my-2">
                                        <input type="text" id="customSearchCondRet" class="form-control"  placeholder="Buscar">
                                    </div> 
                                </div>
                                <table id="conductoresTableRet" 
                                        data-toggle="table"
                                        data-pagination="true" 
                                        data-search="true"
                                        data-locale="es-MX"
                                        data-search-selector="#customSearchCondRet">
                                    <thead>
                                        <tr>
                                            <th data-field="nombreCompleto" data-halign="center" data-align="center">Nombre Conductor</th>
                                            <th data-field="ceduContactoTercero" data-halign="center" data-align="center">Identificación</th>
                                            <th data-field="vigLicencia" data-halign="center" data-align="center">Vigencia Licencia</th>
                                            <th data-field="categoria" data-halign="center" data-align="center">Categoría Licencia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($conductoresRetirados as $conductor)
                                            <tr>
                                                <td>{{$conductor->hojaVida->tercero->nombreCompleto}}</td>
                                                <td>{{$conductor->hojaVida->tercero->nDocumento}}</td>
                                                <td>
                                                    @if($conductor->hojaVida->vigLicencia)
                                                        {{\Carbon\Carbon::parse($conductor->hojaVida->vigLicencia)->format('d-m-Y')}}
                                                    @else
                                                        NA
                                                    @endif
                                                </td>
                                                <td>{{$conductor->hojaVida->categoria}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                        

                    </div>
                    <h5 class="mt-5">Ingresar Nuevo Conductor</h5>
                    <form id="conductorForm" action="{{ route('conductorModal.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <input type="hidden" id="selectedVehiculoCond" name="idVehiculo">
                            <div class="col-md-6 mt-2">
                                <label for="idhv" class="form-label">Seleccione Conductor *</label>
                                <select id="hojaVida-select" class="mi-selector" style="width: 100%;" name="idhv">
                                    @foreach ($hojasVida as $hojaVida)
                                        <option value="{{ $hojaVida->idhv }}">{{$hojaVida->tipoEmpl}} - {{ $hojaVida->tercero->nombreCompleto}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mt-4 text-center">
                                <label for="retirado" class="form-label">Retirado</label>
                                <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" value="1" name="retirado" id="retirado">
                                </div>
                            </div>
                            <div class="modal-footer mt-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" onclick="submitFormConductor({{$vehiculo->id}})">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <form class="row shadow m-3 p-3" method="post" action="{{route('vehiculos.update', $vehiculo)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-4 mt-2">
            <label for="placa" class="form-label">Placa *</label>
            <input type="text" class="form-control" id="placa" name="placa" placeholder="Ingrese placa" value="{{old('placa', $vehiculo->placa)}}">
        </div>
        <div class="col-md-4 mt-2">
            <label for="fechaAfil" class="form-label">Fecha de Afiliación</label>
            <input type="datetime-local" class="form-control" id="fechaAfil" name="fechaAfil" placeholder="Fecha Habilitación" value="{{old('fechaAfil', $vehiculo->fechaAfil)}}">
        </div>
        <div class="col-md-4 mt-2">
            <label for="estado">Seleccione Estado *</label>
            <select class="form-select mt-2" aria-label="select" name="estado">
                <option value="ACTIVO" {{ old('estado', $vehiculo->estado) == 'ACTIVO' ? 'selected' : '' }}>ACTIVO</option>
                <option value="INACTIVO" {{ old('estado', $vehiculo->estado) == 'INACTIVO' ? 'selected' : '' }}> INACTIVO</option>
            </select>
        </div>
        <div class="col-md-4 mt-2">
            <label for="NroInterno" class="form-label">Lateral</label>
            <input type="text" class="form-control" id="NroInterno" name="NroInterno" placeholder="Ingrese lateral" value="{{old('NroInterno', $vehiculo->NroInterno)}}">
        </div>
        <div class="col-md-4 mt-2">
            <label for="fechaDesafil" class="form-label">Fecha Desvinculación</label>
            <input type="datetime-local" class="form-control" id="fechaDesafil" name="fechaDesafil" placeholder="Fecha Habilitación" value="{{old('fechaDesafil', $vehiculo->fechaDesafil)}}">
        </div>
        <div class="col-md-4 mt-2">
            <label for="relacion">Seleccione Relación</label>
            <select class="form-select mt-2" aria-label="select" name="relacion">
                <option value="AFILIADO" {{ old('relacion', $vehiculo->relacion) == 'AFILIADO' ? 'selected' : '' }}>AFILIADO</option>
                <option value="NO AFILIADO" {{ old('relacion', $vehiculo->relacion) == 'NO AFILIADO' ? 'selected' : '' }}>NO AFILIADO</option>
                <option value="DESVINCULADO" {{ old('relacion', $vehiculo->relacion) == 'DESVINCULADO' ? 'selected' : '' }}>DESVINCULADO</option>
            </select>
        </div>
        <div class="col-md-3 mt-2">
            <label for="nroContrAfil" class="form-label">Nro Contrato Afiliación</label>
            <input type="text" class="form-control" id="nroContrAfil" name="nroContrAfil" placeholder="Ingrese contrato afiliación" value="{{old('nroContrAfil', $vehiculo->nroContrAfil)}}">
        </div>
        <div class="col-md-3 mt-2">
            <label for="clase">Clase</label>
            <select class="form-select mt-2" aria-label="select" name="clase">
                <option value="CAMPERO" {{ old('clase', $vehiculo->clase) == 'CAMPERO' ? 'selected' : '' }}>CAMPERO</option>
                <option value="CAMIONETA" {{ old('clase', $vehiculo->clase) == 'CAMIONETA' ? 'selected' : '' }}>CAMIONETA</option>
                <option value="AEROVAN" {{ old('clase', $vehiculo->clase) == 'AEROVAN' ? 'selected' : '' }}>AEROVAN</option>
                <option value="MICROBUS" {{ old('clase', $vehiculo->clase) == 'MICROBUS' ? 'selected' : '' }}>MICROBUS</option>
                <option value="BUSETA" {{ old('clase', $vehiculo->clase) == 'BUSETA' ? 'selected' : '' }}>BUSETA</option>
                <option value="BUSETON" {{ old('clase', $vehiculo->clase) == 'BUSETON' ? 'selected' : '' }}>BUSETON</option>
                <option value="BUS" {{ old('clase', $vehiculo->clase) == 'BUS' ? 'selected' : '' }}>BUS</option>
            </select>
        </div>
        <div class="col-md-3 mt-2">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" placeholder="Ingrese marca" value="{{old('marca', $vehiculo->marca)}}">
        </div>
        <div class="col-md-3 mt-2">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="number" class="form-control" id="modelo" name="modelo" placeholder="Ingrese modelo" value="{{old('modelo', $vehiculo->modelo)}}">
        </div>
        <div class="col-md-6 mt-2">
            <label for="combustible">Seleccione Combustible</label>
            <select class="form-select mt-2" aria-label="select" name="combustible">
                <option value="DIESEL" {{ old('combustible', $vehiculo->combustible) == 'DIESEL' ? 'selected' : '' }}>DIESEL</option>
                <option value="GASOLINA" {{ old('combustible', $vehiculo->combustible) == 'GASOLINA' ? 'selected' : '' }}>GASOLINA</option>
                <option value="GAS" {{ old('combustible', $vehiculo->combustible) == 'GAS' ? 'selected' : '' }}>GAS</option>
            </select>
        </div>
        <div class="col-md-6 mt-2">
            <label for="tipoTransporte">Seleccione Tipo Transporte</label>
            <select class="form-select mt-2" aria-label="select" name="tipoTransporte">
                <option value="INTERMUNICIPAL" {{ old('tipoTransporte', $vehiculo->tipoTransporte) == 'INTERMUNICIPAL' ? 'selected' : '' }}>INTERMUNICIPAL</option>
            </select>
        </div>
        <div class="col-md-6 mt-2">
            <label for="propietario" class="form-label">Seleccione Propietario *</label>
            <select id="tercero-select" class="mi-selector" style="width: 100%;" name="propietario">
                @foreach ($terceros as $tercero)
                    <option value="{{ $tercero->idTerceros }}" {{ $tercero->idTerceros == $vehiculo->propietario ? 'selected' : '' }}>{{ $tercero->nombreCompleto }} - {{ $tercero->nDocumento }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 mt-3 text-center">
            <label for="flexCheckDefault" class="form-label">Vehiculo de la Empresa</label>
            <div class="form-check d-flex justify-content-center">
                <input class="form-check-input" type="checkbox" value="1" name="vehEmpresa" id="flexCheckDefault"
                {{ old('vehEmpresa', $vehiculo->vehEmpresa) ? 'checked' : '' }}>
            </div>
        </div>
        <div class="col-md-12 mt-2">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea rows="2" class="form-control" id="observaciones" name="observaciones" placeholder="Ingrese observaciones">{{old('observaciones', $vehiculo->observaciones)}}</textarea>
        </div>
        
        <div class="col-md-2 mt-4 text-center">
            <label for="carct_TV" class="form-label">TV</label>
            <div class="form-check d-flex justify-content-center">
                <input class="form-check-input" type="checkbox" value="1" name="carct_TV" id="carct_TV"
                {{ old('carct_TV', $vehiculo->carct_TV) ? 'checked' : '' }}>
            </div>
        </div>
        <div class="col-md-2 mt-4 text-center">
            <label for="carct_sonido" class="form-label">Sonido</label>
            <div class="form-check d-flex justify-content-center">
                <input class="form-check-input" type="checkbox" value="1" name="carct_sonido" id="carct_sonido"
                {{ old('carct_sonido', $vehiculo->carct_sonido) ? 'checked' : '' }}>
            </div>
        </div>
        <div class="col-md-2 mt-4 text-center">
            <label for="carct_banio" class="form-label">Baño</label>
            <div class="form-check d-flex justify-content-center">
                <input class="form-check-input" type="checkbox" value="1" name="carct_banio" id="carct_banio"
                {{ old('carct_banio', $vehiculo->carct_banio) ? 'checked' : '' }}>
            </div>
        </div>
        <div class="col-md-2 mt-4 text-center">
            <label for="carct_sillaReclin" class="form-label">Sillas Reclinables</label>
            <div class="form-check d-flex justify-content-center">
                <input class="form-check-input" type="checkbox" value="1" name="carct_sillaReclin" id="carct_sillaReclin"
                {{ old('carct_sillaReclin', $vehiculo->carct_sillaReclin) ? 'checked' : '' }}>
            </div>
        </div>
        <div class="col-md-2 mt-4 text-center">
            <label for="carct_aireAcond" class="form-label">Aire Acondicionado</label>
            <div class="form-check d-flex justify-content-center">
                <input class="form-check-input" type="checkbox" value="1" name="carct_aireAcond" id="carct_aireAcond"
                {{ old('carct_aireAcond', $vehiculo->carct_aireAcond) ? 'checked' : '' }}>
            </div>
        </div>
        <div class="col-md-2 mt-4 text-center">
            <label for="carct_microf" class="form-label">Micrófono</label>
            <div class="form-check d-flex justify-content-center">
                <input class="form-check-input" type="checkbox" value="1" name="carct_microf" id="carct_microf"
                {{ old('carct_microf', $vehiculo->carct_microf) ? 'checked' : '' }}>
            </div>
        </div>
        <div class="col-md-12 mt-3 text-center">
            <label for="carct_GPS" class="form-label">G.P.S</label>
            <div class="form-check d-flex justify-content-center">
                <input class="form-check-input" type="checkbox" value="1" name="carct_GPS" id="carct_GPS"
                {{ old('carct_GPS', $vehiculo->carct_GPS) ? 'checked' : '' }}>
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <label for="fileImgVeh" class="form-label">Imagen Vehiculo</label>
            <input type="file" class="form-control" id="fileImgVeh" name="fileImgVeh" accept="image/*">
        </div>
        <div class="col-md-4 mt-3">
            <label for="fileMatricula1" class="form-label">Matricula 1</label>
            <input type="file" class="form-control" id="fileMatricula1" name="fileMatricula1" accept="image/*">
        </div>
        <div class="col-md-4 mt-3">
            <label for="fileMatricula2" class="form-label">Matricula 2</label>
            <input type="file" class="form-control" id="fileMatricula2" name="fileMatricula2" accept="image/*">
        </div>
        <div class="col-md-4 mt-2">
            <label for="fileTOperacion1" class="form-label">Operación 1</label>
            <input type="file" class="form-control" id="fileTOperacion1" name="fileTOperacion1" accept="image/*">
        </div>
        <div class="col-md-4 mt-2">
            <label for="fileTOperacion2" class="form-label">Operación 2</label>
            <input type="file" class="form-control" id="fileTOperacion2" name="fileTOperacion2" accept="image/*">
        </div>
        <div class="col-md-4 mt-2">
            <label for="fileCDA" class="form-label">CDA</label>
            <input type="file" class="form-control" id="fileCDA" name="fileCDA" accept="image/*">
        </div>
        <div class="col-md-4 mt-2">
            <label for="fileSoat" class="form-label">SOAT</label>
            <input type="file" class="form-control" id="fileSoat" name="fileSoat" accept="image/*">
        </div>
        <div class="col-md-4 mt-2">
            <label for="fileRCC" class="form-label">C.C</label>
            <input type="file" class="form-control" id="fileRCC" name="fileRCC" accept="image/*">
        </div>
        <div class="col-md-4 mt-2">
            <label for="fileRCE" class="form-label">C.E</label>
            <input type="file" class="form-control" id="fileRCE" name="fileRCE" accept="image/*">
        </div>
        <!-- tabs nav-->
        <nav>
            <div class="nav nav-tabs mt-5" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-matricula-tab" data-bs-toggle="tab" data-bs-target="#nav-matricula" type="button" role="tab" aria-controls="nav-matricula" aria-selected="true">Matrícula</button>
                <button class="nav-link" id="nav-operacion-tab" data-bs-toggle="tab" data-bs-target="#nav-operacion" type="button" role="tab" aria-controls="nav-operacion" aria-selected="false">Operación</button>
                <button class="nav-link" id="nav-cda-tab" data-bs-toggle="tab" data-bs-target="#nav-cda" type="button" role="tab" aria-controls="nav-cda" aria-selected="false">CDA</button>
                <button class="nav-link" id="nav-soat-rce-rcc--tab" data-bs-toggle="tab" data-bs-target="#nav-soat-rce-rcc" type="button" role="tab" aria-controls="nav-soat-rce-rcc" aria-selected="false">SOAT / RCC / RCE</button>
            </div>
        </nav>
        <!-- tabs nav content-->
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-matricula" role="tabpanel" aria-labelledby="nav-matricula-tab" tabindex="0">
                <div class="row">
                    <div class="col-md-3 mt-3">
                        <label for="nroMatricula" class="form-label">Numero Matrícula</label>
                        <input type="text" class="form-control" id="nroMatricula" name="nroMatricula" placeholder="Ingrese numero matricula" value="{{old('nroMatricula', $vehiculo->nroMatricula)}}">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="orgTransito" class="form-label">Organismo de Tránsito</label>
                        <input type="text" class="form-control" id="orgTransito" name="orgTransito" placeholder="Ingrese organismo de tránsito" value="{{old('orgTransito', $vehiculo->orgTransito)}}">
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="fechaExpMatric" class="form-label">Fecha de Expedición</label>
                        <input type="datetime-local" class="form-control" id="fechaExpMatric" name="fechaExpMatric" placeholder="Fecha expedición" value="{{old('fechaExpMatric', $vehiculo->fechaExpMatric)}}">
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="linea" class="form-label">Línea</label>
                        <input type="text" class="form-control" id="linea" name="linea" placeholder="Ingrese línea" value="{{old('linea')}}">
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="cilindraje" class="form-label">Cilindraje</label>
                        <input type="text" class="form-control" id="cilindraje" name="cilindraje" placeholder="Ingrese cilindraje" value="{{old('cilindraje', $vehiculo->cilindraje)}}">
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="capacPjs" class="form-label">Capacidad</label>
                        <input type="number" class="form-control" id="capacPjs" name="capacPjs" placeholder="Ingrese capacidad pasajeros" value="{{old('capacPjs', $vehiculo->capacPjs)}}">
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" class="form-control" id="color" name="color" placeholder="Ingrese color" value="{{old('color', $vehiculo->color)}}">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="motor" class="form-label">N° Motor</label>
                        <input type="text" class="form-control" id="motor" name="motor" placeholder="Ingrese motor" value="{{old('motor', $vehiculo->motor)}}">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="chasis" class="form-label">N° Chasis</label>
                        <input type="text" class="form-control" id="chasis" name="chasis" placeholder="Ingrese chasis" value="{{old('chasis', $vehiculo->chasis)}}">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-operacion" role="tabpanel" aria-labelledby="nav-operacion-tab" tabindex="0">
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <label for="nroTarjOper" class="form-label">Nro Tarjeta de Operación</label>
                        <input type="text" class="form-control" id="nroTarjOper" name="nroTarjOper" placeholder="Ingrese nro tarjeta de operación" value="{{old('nroTarjOper', $vehiculo->nroTarjOper)}}">
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="fechaExpTO" class="form-label">Fecha de Expedición</label>
                        <input type="datetime-local" class="form-control" id="fechaExpTO" name="fechaExpTO" placeholder="Fecha expedición" value="{{old('fechaExpTO', $vehiculo->fechaExpTO)}}">
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="fechaVtoTO" class="form-label">Fecha de Vencimiento</label>
                        <input type="datetime-local" class="form-control" id="fechaVtoTO" name="fechaVtoTO" placeholder="Fecha vencimiento" value="{{old('fechaVtoTO', $vehiculo->fechaVtoTO)}}">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-cda" role="tabpanel" aria-labelledby="nav-cda-tab" tabindex="0">
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <label for="nombreCDA" class="form-label">Nombre CDA</label>
                        <input type="text" class="form-control" id="nombreCDA" name="nombreCDA" placeholder="Ingrese nombre del CDA" value="{{old('nombreCDA', $vehiculo->nombreCDA)}}">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="nroCertCDA" class="form-label">Número Certificado</label>
                        <input type="text" class="form-control" id="nroCertCDA" name="nroCertCDA" placeholder="Ingrese número de certificado" value="{{old('nroCertCDA', $vehiculo->nroCertCDA)}}">
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="fechaExpCDA" class="form-label">Fecha de Expedición</label>
                        <input type="datetime-local" class="form-control" id="fechaExpCDA" name="fechaExpCDA" value="{{old('fechaExpCDA', $vehiculo->fechaExpCDA)}}">
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="fechaVtoCDA" class="form-label">Fecha de Vencimiento</label>
                        <input type="datetime-local" class="form-control" id="fechaVtoCDA" name="fechaVtoCDA" value="{{old('fechaVtoCDA', $vehiculo->fechaVtoCDA)}}">
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="fechaVtoExtintor" class="form-label">Fecha de Vencimiento Extintor</label>
                        <input type="datetime-local" class="form-control" id="fechaVtoExtintor" name="fechaVtoExtintor" value="{{old('fechaVtoExtintor', $vehiculo->fechaVtoExtintor)}}">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-soat-rce-rcc" role="tabpanel" aria-labelledby="nav-soat-rce-rcc-tab" tabindex="0">
                <div class="row">
                    <h6 class="mt-3">Información del SOAT</h6>
                    <hr>
                    <div class="col-md-6 mt-1">
                        <label for="aseguradoraSOAT">Aseguradora</label>
                        <select class="form-select mt-2" aria-label="select" name="aseguradoraSOAT">
                            <option value="MUNDIAL DE SEGUROS" {{ old('aseguradoraSOAT', $vehiculo->aseguradoraSOAT) == 'MUNDIAL DE SEGUROS' ? 'selected' : '' }}>MUNDIAL DE SEGUROS</option>
                            <option value="SEGUROS MUNDIAL" {{ old('aseguradoraSOAT', $vehiculo->aseguradoraSOAT) == 'SEGUROS MUNDIAL' ? 'selected' : '' }}>SEGUROS MUNDIAL</option>
                            <option value="SOLIDARIA" {{ old('aseguradoraSOAT', $vehiculo->aseguradoraSOAT) == 'SOLIDARIA' ? 'selected' : '' }}>SOLIDARIA</option>
                        </select>
                    </div>
                    <div class="col-md-6 mt-1">
                        <label for="nroSOAT" class="form-label">N° Soat</label>
                        <input type="text" class="form-control" id="nroSOAT" name="nroSOAT" placeholder="Ingrese número de SOAT" value="{{old('nroSOAT', $vehiculo->nroSOAT)}}">
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="fechaExpSOAT" class="form-label">Fecha de Expedición</label>
                        <input type="datetime-local" class="form-control" id="fechaExpSOAT" name="fechaExpSOAT" value="{{old('fechaExpSOAT', $vehiculo->fechaExpSOAT)}}">
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="fechaVtoSOAT" class="form-label">Fecha de Vencimiento</label>
                        <input type="datetime-local" class="form-control" id="fechaVtoSOAT" name="fechaVtoSOAT" value="{{old('fechaVtoSOAT', $vehiculo->fechaVtoSOAT)}}">
                    </div>
                    <h6 class="mt-3">Responsabilidad Civil Contractual</h6>
                    <hr>
                    <div class="col-md-6 mt-1">
                        <label for="aseguradoraRCC">Aseguradora</label>
                        <select class="form-select mt-2" aria-label="select" name="aseguradoraRCC">
                            <option value="EQUIDAD SEGUROS" {{ old('aseguradoraRCC', $vehiculo->aseguradoraRCC) == 'ACTIVO' ? 'selected' : '' }}>EQUIDAD SEGUROS</option>
                        </select>
                    </div>
                    <div class="col-md-6 mt-1">
                        <label for="nroRCC" class="form-label">N° RCC</label>
                        <input type="text" class="form-control" id="nroRCC" name="nroRCC" placeholder="Ingrese número de RCC" value="{{old('nroRCC', $vehiculo->nroRCC)}}">
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="fechaExpRCC" class="form-label">Fecha de Expedición</label>
                        <input type="datetime-local" class="form-control" id="fechaExpRCC" name="fechaExpRCC" value="{{old('fechaExpRCC', $vehiculo->fechaExpRCC)}}">
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="fechaVtoRCC" class="form-label">Fecha de Vencimiento</label>
                        <input type="datetime-local" class="form-control" id="fechaVtoRCC" name="fechaVtoRCC" value="{{old('fechaVtoRCC', $vehiculo->fechaVtoRCC)}}">
                    </div>
                    <h6 class="mt-3">Responsabilidad Civil Extracontractual</h6>
                    <hr>
                    <div class="col-md-6 mt-1">
                        <label for="aseguradoraRCE">Aseguradora</label>
                        <select class="form-select mt-2" aria-label="select" name="aseguradoraRCE">
                            <option value="EQUIDAD SEGUROS" {{ old('aseguradoraRCE', $vehiculo->aseguradoraRCE) == 'EQUIDAD SEGUROS ' ? 'selected' : '' }}>EQUIDAD SEGUROS</option>
                        </select>
                    </div>
                    <div class="col-md-6 mt-1">
                        <label for="nroRCE" class="form-label">N° RCE</label>
                        <input type="text" class="form-control" id="nroRCE" name="nroRCE" placeholder="Ingrese número de RCE" value="{{old('nroRCE', $vehiculo->nroRCE)}}">
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="fechaExpRCE" class="form-label">Fecha de Expedición</label>
                        <input type="datetime-local" class="form-control" id="fechaExpRCE" name="fechaExpRCE" value="{{old('fechaExpRCE', $vehiculo->fechaExpRCE)}}">
                    </div>
                    <div class="col-md-6 mt-2">
                        <label for="fechaVtoRCE" class="form-label">Fecha de Vencimiento</label>
                        <input type="datetime-local" class="form-control" id="fechaVtoRCE" name="fechaVtoRCE" value="{{old('fechaVtoRCE', $vehiculo->fechaVtoRCE)}}">
                    </div>
                </div>
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
        <div class="col-12 mt-5">
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>
    </form>
</div>
<style>
    .select2-container--default .select2-selection--single {
        height: 40px; 
        line-height: 40px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        padding-top: 5px; /* Ajusta este valor para bajar el texto */
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 50px; /* Asegúrate de que la flecha tenga la misma altura */
        top: 50%; /* Centra verticalmente la flecha */
        transform: translateY(-50%); /* Ajusta la posición de la flecha */
    }
</style>
<script>
    function submitFormBimestral(idVehiculo){

        const fechaExp = document.getElementById('fechaExpRPbimest');
        const fechaVto = document.getElementById('fechaVtoRPbimest');

        if (fechaExp.value.trim() === ''){
            fechaExp.focus();
        } else if (fechaVto.value.trim() === ''){
            fechaVto.focus();
        } else {
            document.getElementById('selectedVehiculo').value = idVehiculo;
            document.getElementById('conductorForm').submit();
        }

    }

    function submitFormConductor(idVehiculo){

        document.getElementById('selectedVehiculoCond').value = idVehiculo;
        document.getElementById('conductorForm').submit();
        

    }
</script>
    
@endsection