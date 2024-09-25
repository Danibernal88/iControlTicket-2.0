@extends('prestacionServicio.index')
@section('tab-content')
<div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-3">Crear Vehículo</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-3">
                <a href="{{ route('vehiculos.index') }}" class="btn btn-danger">Regresar</a>
            </div>
        </div>
        <form class="row shadow m-3 p-3" method="post" action="{{route('vehiculos.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-4 mt-2">
                <label for="placa" class="form-label">Placa *</label>
                <input type="text" class="form-control" id="placa" name="placa" placeholder="Ingrese placa" value="{{old('placa')}}">
            </div>
            <div class="col-md-4 mt-2">
                <label for="fechaAfil" class="form-label">Fecha de Afiliación</label>
                <input type="datetime-local" class="form-control" id="fechaAfil" name="fechaAfil" placeholder="Fecha Habilitación" value="{{old('fechaAfil')}}">
            </div>
            <div class="col-md-4 mt-2">
                <label for="estado">Seleccione Estado *</label>
                <select class="form-select mt-2" aria-label="select" name="estado">
                    <option value="ACTIVO" select>ACTIVO</option>
                    <option value="INACTIVO">INACTIVO</option>
                </select>
            </div>
            <div class="col-md-4 mt-2">
                <label for="NroInterno" class="form-label">Lateral</label>
                <input type="text" class="form-control" id="NroInterno" name="NroInterno" placeholder="Ingrese lateral" value="{{old('NroInterno')}}">
            </div>
            <div class="col-md-4 mt-2">
                <label for="fechaDesafil" class="form-label">Fecha Desvinculación</label>
                <input type="datetime-local" class="form-control" id="fechaDesafil" name="fechaDesafil" placeholder="Fecha Habilitación" value="{{old('fechaDesafil')}}">
            </div>
            <div class="col-md-4 mt-2">
                <label for="estado">Seleccione Relación</label>
                <select class="form-select mt-2" aria-label="select" name="estado">
                    <option value="AFILIADO" select>AFILIADO</option>
                    <option value="NO AFILIADO">NO AFILIADO</option>
                    <option value="DESVINCULADO">DESVINCULADO</option>
                </select>
            </div>
            <div class="col-md-3 mt-2">
                <label for="nroContrAfil" class="form-label">Nro Contrato Afiliación</label>
                <input type="text" class="form-control" id="nroContrAfil" name="nroContrAfil" placeholder="Ingrese contrato afiliación" value="{{old('nroContrAfil')}}">
            </div>
            <div class="col-md-3 mt-2">
                <label for="clase">Clase</label>
                <select class="form-select mt-2" aria-label="select" name="clase">
                    <option value="CAMPERO" select>CAMPERO</option>
                    <option value="CAMIONETA">CAMIONETA</option>
                    <option value="AEROVAN">AEROVAN</option>
                    <option value="MICROBUS">MICROBUS</option>
                    <option value="BUSETA">BUSETA</option>
                    <option value="BUSETON">BUSETON</option>
                    <option value="BUS">BUS</option>
                </select>
            </div>
            <div class="col-md-3 mt-2">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" placeholder="Ingrese marca" value="{{old('marca')}}">
            </div>
            <div class="col-md-3 mt-2">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="number" class="form-control" id="modelo" name="modelo" placeholder="Ingrese modelo" value="{{old('modelo')}}">
            </div>
            <div class="col-md-6 mt-2">
                <label for="combustible">Seleccione Combustible</label>
                <select class="form-select mt-2" aria-label="select" name="combustible">
                    <option value="DIESEL" select>DIESEL</option>
                    <option value="GASOLINA">GASOLINA</option>
                    <option value="GAS">GAS</option>
                </select>
            </div>
            <div class="col-md-6 mt-2">
                <label for="tipoTransporte">Seleccione Tipo Transporte</label>
                <select class="form-select mt-2" aria-label="select" name="tipoTransporte">
                    <option value="INTERMUNICIPAL" select>INTERMUNICIPAL</option>
                </select>
            </div>
            <div class="col-md-6 mt-2">
                <label for="propietario" class="form-label">Seleccione Propietario *</label>
                <select id="tercero-select" class="mi-selector" style="width: 100%;" name="propietario">
                    @foreach ($terceros as $tercero)
                        <option value="{{ $tercero->idTerceros }}">{{ $tercero->nombreCompleto }} - {{ $tercero->nDocumento }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mt-3 text-center">
                <label for="flexCheckDefault" class="form-label">Vehiculo de la Empresa</label>
                <div class="form-check d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" value="1" name="vehEmpresa" id="flexCheckDefault"
                    {{ old('vehEmpresa') ? 'checked' : '' }}>
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea rows="2" class="form-control" id="observaciones" name="observaciones" placeholder="Ingrese observaciones">{{old('observaciones')}}</textarea>
            </div>
            
            <div class="col-md-2 mt-4 text-center">
                <label for="carct_TV" class="form-label">TV</label>
                <div class="form-check d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" value="1" name="carct_TV" id="carct_TV"
                    {{ old('carct_TV') ? 'checked' : '' }}>
                </div>
            </div>
            <div class="col-md-2 mt-4 text-center">
                <label for="carct_sonido" class="form-label">Sonido</label>
                <div class="form-check d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" value="1" name="carct_sonido" id="carct_sonido"
                    {{ old('carct_sonido') ? 'checked' : '' }}>
                </div>
            </div>
            <div class="col-md-2 mt-4 text-center">
                <label for="carct_banio" class="form-label">Baño</label>
                <div class="form-check d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" value="1" name="carct_banio" id="carct_banio"
                    {{ old('carct_banio') ? 'checked' : '' }}>
                </div>
            </div>
            <div class="col-md-2 mt-4 text-center">
                <label for="carct_sillaReclin" class="form-label">Sillas Reclinables</label>
                <div class="form-check d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" value="1" name="carct_sillaReclin" id="carct_sillaReclin"
                    {{ old('carct_sillaReclin') ? 'checked' : '' }}>
                </div>
            </div>
            <div class="col-md-2 mt-4 text-center">
                <label for="carct_aireAcond" class="form-label">Aire Acondicionado</label>
                <div class="form-check d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" value="1" name="carct_aireAcond" id="carct_aireAcond"
                    {{ old('carct_aireAcond') ? 'checked' : '' }}>
                </div>
            </div>
            <div class="col-md-2 mt-4 text-center">
                <label for="carct_microf" class="form-label">Micrófono</label>
                <div class="form-check d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" value="1" name="carct_microf" id="carct_microf"
                    {{ old('carct_microf') ? 'checked' : '' }}>
                </div>
            </div>
            <div class="col-md-12 mt-3 text-center">
                <label for="carct_GPS" class="form-label">G.P.S</label>
                <div class="form-check d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" value="1" name="carct_GPS" id="carct_GPS"
                    {{ old('carct_GPS') ? 'checked' : '' }}>
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
                            <input type="text" class="form-control" id="nroMatricula" name="nroMatricula" placeholder="Ingrese numero matricula" value="{{old('nroMatricula')}}">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="orgTransito" class="form-label">Organismo de Tránsito</label>
                            <input type="text" class="form-control" id="orgTransito" name="orgTransito" placeholder="Ingrese organismo de tránsito" value="{{old('orgTransito')}}">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="fechaExpMatric" class="form-label">Fecha de Expedición</label>
                            <input type="datetime-local" class="form-control" id="fechaExpMatric" name="fechaExpMatric" placeholder="Fecha expedición" value="{{old('fechaExpMatric')}}">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="linea" class="form-label">Línea</label>
                            <input type="text" class="form-control" id="linea" name="linea" placeholder="Ingrese línea" value="{{old('linea')}}">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="cilindraje" class="form-label">Cilindraje</label>
                            <input type="text" class="form-control" id="cilindraje" name="cilindraje" placeholder="Ingrese cilindraje" value="{{old('cilindraje')}}">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="capacPjs" class="form-label">Capacidad</label>
                            <input type="number" class="form-control" id="capacPjs" name="capacPjs" placeholder="Ingrese capacidad pasajeros" value="{{old('capacPjs')}}">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" class="form-control" id="color" name="color" placeholder="Ingrese color" value="{{old('color')}}">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="motor" class="form-label">N° Motor</label>
                            <input type="text" class="form-control" id="motor" name="motor" placeholder="Ingrese motor" value="{{old('motor')}}">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="chasis" class="form-label">N° Chasis</label>
                            <input type="text" class="form-control" id="chasis" name="chasis" placeholder="Ingrese chasis" value="{{old('chasis')}}">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-operacion" role="tabpanel" aria-labelledby="nav-operacion-tab" tabindex="0">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="nroTarjOper" class="form-label">Nro Tarjeta de Operación</label>
                            <input type="text" class="form-control" id="nroTarjOper" name="nroTarjOper" placeholder="Ingrese nro tarjeta de operación" value="{{old('nroTarjOper')}}">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="fechaExpTO" class="form-label">Fecha de Expedición</label>
                            <input type="datetime-local" class="form-control" id="fechaExpTO" name="fechaExpTO" placeholder="Fecha expedición" value="{{old('fechaExpTO')}}">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="fechaVtoTO" class="form-label">Fecha de Vencimiento</label>
                            <input type="datetime-local" class="form-control" id="fechaVtoTO" name="fechaVtoTO" placeholder="Fecha vencimiento" value="{{old('fechaVtoTO')}}">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-cda" role="tabpanel" aria-labelledby="nav-cda-tab" tabindex="0">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="nombreCDA" class="form-label">Nombre CDA</label>
                            <input type="text" class="form-control" id="nombreCDA" name="nombreCDA" placeholder="Ingrese nombre del CDA" value="{{old('nombreCDA')}}">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="nroCertCDA" class="form-label">Número Certificado</label>
                            <input type="text" class="form-control" id="nroCertCDA" name="nroCertCDA" placeholder="Ingrese número de certificado" value="{{old('nroCertCDA')}}">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="fechaExpCDA" class="form-label">Fecha de Expedición</label>
                            <input type="datetime-local" class="form-control" id="fechaExpCDA" name="fechaExpCDA" value="{{old('fechaExpCDA')}}">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="fechaVtoCDA" class="form-label">Fecha de Vencimiento</label>
                            <input type="datetime-local" class="form-control" id="fechaVtoCDA" name="fechaVtoCDA" value="{{old('fechaVtoCDA')}}">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="fechaVtoExtintor" class="form-label">Fecha de Vencimiento Extintor</label>
                            <input type="datetime-local" class="form-control" id="fechaVtoExtintor" name="fechaVtoExtintor" value="{{old('fechaVtoExtintor')}}">
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
                                <option value="MUNDIAL DE SEGUROS" select>MUNDIAL DE SEGUROS</option>
                                <option value="SEGUROS MUNDIAL">SEGUROS MUNDIAL</option>
                                <option value="SOLIDARIA">SOLIDARIA</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-1">
                            <label for="nroSOAT" class="form-label">N° Soat</label>
                            <input type="text" class="form-control" id="nroSOAT" name="nroSOAT" placeholder="Ingrese número de SOAT" value="{{old('nroSOAT')}}">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="fechaExpSOAT" class="form-label">Fecha de Expedición</label>
                            <input type="datetime-local" class="form-control" id="fechaExpSOAT" name="fechaExpSOAT" value="{{old('fechaExpSOAT')}}">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="fechaVtoSOAT" class="form-label">Fecha de Vencimiento</label>
                            <input type="datetime-local" class="form-control" id="fechaVtoSOAT" name="fechaVtoSOAT" value="{{old('fechaVtoSOAT')}}">
                        </div>
                        <h6 class="mt-3">Responsabilidad Civil Contractual</h6>
                        <hr>
                        <div class="col-md-6 mt-1">
                            <label for="aseguradoraRCC">Aseguradora</label>
                            <select class="form-select mt-2" aria-label="select" name="aseguradoraRCC">
                                <option value="EQUIDAD SEGUROS" select>EQUIDAD SEGUROS</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-1">
                            <label for="nroRCC" class="form-label">N° RCC</label>
                            <input type="text" class="form-control" id="nroRCC" name="nroRCC" placeholder="Ingrese número de RCC" value="{{old('nroRCC')}}">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="fechaExpRCC" class="form-label">Fecha de Expedición</label>
                            <input type="datetime-local" class="form-control" id="fechaExpRCC" name="fechaExpRCC" value="{{old('fechaExpRCC')}}">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="fechaVtoRCC" class="form-label">Fecha de Vencimiento</label>
                            <input type="datetime-local" class="form-control" id="fechaVtoRCC" name="fechaVtoRCC" value="{{old('fechaVtoRCC')}}">
                        </div>
                        <h6 class="mt-3">Responsabilidad Civil Extracontractual</h6>
                        <hr>
                        <div class="col-md-6 mt-1">
                            <label for="aseguradoraRCE">Aseguradora</label>
                            <select class="form-select mt-2" aria-label="select" name="aseguradoraRCE">
                                <option value="EQUIDAD SEGUROS" select>EQUIDAD SEGUROS</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-1">
                            <label for="nroRCE" class="form-label">N° RCE</label>
                            <input type="text" class="form-control" id="nroRCE" name="nroRCE" placeholder="Ingrese número de RCE" value="{{old('nroRCE')}}">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="fechaExpRCE" class="form-label">Fecha de Expedición</label>
                            <input type="datetime-local" class="form-control" id="fechaExpRCE" name="fechaExpRCE" value="{{old('fechaExpRCE')}}">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="fechaVtoRCE" class="form-label">Fecha de Vencimiento</label>
                            <input type="datetime-local" class="form-control" id="fechaVtoRCE" name="fechaVtoRCE" value="{{old('fechaVtoRCE')}}">
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
                <button type="submit" class="btn btn-primary">Guardar</button>
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
@endsection