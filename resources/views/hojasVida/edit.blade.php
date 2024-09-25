@extends('administracion.index')
@section('tab-content')
<div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-3">Editar {{$hojaVidaTercero->nombreCompleto}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-3">
                <a href="{{ route('hojaVidas.index') }}" class="btn btn-danger">Regresar</a>
            </div>
        </div>
        <form class="row shadow m-3 p-3" method="post" action="{{route('hojaVidas.update', $hojaVida)}}">
            @csrf
            @method('PUT')
            <div class="col-md-4 mt-2">
                <label for="estado">Seleccione Estado</label>
                <select class="form-select mt-2" aria-label="select" name="estado">
                    <option value="ACTIVO" {{ old('estado', $hojaVida->estado) == 'ACTIVO' ? 'selected' : '' }}>ACTIVO</option>
                    <option value="INACTIVO" {{ old('estado', $hojaVida->estado) == 'INACTIVO' ? 'selected' : '' }}>INACTIVO</option>
                </select>
            </div>
            <div class="col-md-4 mt-2">
                <label for="fechanto" class="form-label">Seleccione Tercero *</label>
                <select id="tercero-select" class="mi-selector" style="width: 100%;" name="idtercero" disabled>
                    <option value="{{$hojaVidaTercero->idTerceros}}">
                        {{$hojaVidaTercero->nombreCompleto }} - {{ $hojaVidaTercero->nDocumento }}</option>
                </select>
            </div>
            <div class="col-md-4 mt-2">
            <label for="fechanto" class="form-label">Seleccione Jefe Inmediato</label>
                <select id="jefe-select" class="mi-selector" style="width: 100%;" name="jefeInmediato">
                    @foreach ($terceros as $tercero)
                        <option value="{{ $tercero->nombreCompleto }}" {{$hojaVida->jefeInmediato == $tercero->nombreCompleto ? 'selected': ''}}>
                            {{ $tercero->nombreCompleto }} - {{ $tercero->nDocumento }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mt-3">
                <label for="fechanto" class="form-label">Fecha Nacimiento</label>
                <input type="datetime-local" class="form-control" id="fechanto" name="fechanto" placeholder="Fecha Habilitación" value="{{old('fechanto', $hojaVida->fechanto)}}">
            </div>
            <div class="col-md-4 mt-3">
                <label for="fechaDef" class="form-label">Fecha Defunción</label>
                <input type="datetime-local" class="form-control" id="fechaDef" name="fechaDef" placeholder="Fecha Habilitación" value="{{old('fechaDef', $hojaVida->fechaDef)}}">
            </div>
            <div class="col-md-4 mt-4">
                <label for="tiposangre">Seleccione Tipo de Sangre</label>
                <select class="form-select" aria-label="select" name="tiposangre">
                    <option value="O+" {{ old('tiposangre', $hojaVida->tiposangre) == 'O+' ? 'selected' : '' }}>O+</option>
                    <option value="O-" {{ old('tiposangre', $hojaVida->tiposangre) == 'O-' ? 'selected' : '' }}>O-</option>
                    <option value="A+" {{ old('tiposangre', $hojaVida->tiposangre) == 'A+' ? 'selected' : '' }}>A+</option>
                    <option value="A-" {{ old('tiposangre', $hojaVida->tiposangre) == 'A-' ? 'selected' : '' }}>A-</option>
                    <option value="B+" {{ old('tiposangre', $hojaVida->tiposangre) == 'B+' ? 'selected' : '' }}>B+</option>
                    <option value="B-" {{ old('tiposangre', $hojaVida->tiposangre) == 'B-' ? 'selected' : '' }}>B-</option>
                    <option value="AB+" {{ old('tiposangre', $hojaVida->tiposangre) == 'AB+' ? 'selected' : '' }}>AB+</option>
                    <option value="AB-" {{ old('tiposangre', $hojaVida->tiposangre) == 'AB-' ? 'selected' : '' }}>AB-</option>
                </select>
            </div>
            <div class="col-md-6 mt-3">
                <label for="estadocivil">Seleccione Estado Civil</label>
                <select class="form-select" aria-label="select" name="estadocivil">
                    <option value="SOLTERO" {{ old('estadocivil', $hojaVida->estadocivil) == 'SOLTERO' ? 'selected' : '' }}>SOLTERO</option>
                    <option value="CASADO" {{ old('estadocivil', $hojaVida->estadocivil) == 'CASADO' ? 'selected' : '' }}>CASADO</option>
                    <option value="UNIÓN LIBRE" {{ old('estadocivil', $hojaVida->estadocivil) == 'UNIÓN LIBRE' ? 'selected' : '' }}>UNIÓN LIBRE</option>
                    <option value="VIUDO" {{ old('estadocivil', $hojaVida->estadocivil) == 'VIUDO' ? 'selected' : '' }}>VIUDO</option>
                    <option value="DIVORCIADO" {{ old('estadocivil', $hojaVida->estadocivil) == 'DIVORCIADO' ? 'selected' : '' }}>DIVORCIADO</option>
                </select>
            </div>
            <div class="col-md-6 mt-3">
                <label for="nivelEstudio">Seleccione Nivel de Estudio</label>
                <select class="form-select" aria-label="select" name="nivelEstudio">
                    <option value="PRIMARIA" {{ old('nivelEstudio', $hojaVida->nivelEstudio) == 'PRIMARIA' ? 'selected' : '' }}>PRIMARIA</option>
                    <option value="SECUNDARIA" {{ old('nivelEstudio', $hojaVida->nivelEstudio) == 'SECUNDARIA' ? 'selected' : '' }}>SECUNDARIA</option>
                    <option value="TÉCNICO" {{ old('nivelEstudio', $hojaVida->nivelEstudio) == 'TÉCNICO' ? 'selected' : '' }}>TÉCNICO</option>
                    <option value="TECNOLÓGICO" {{ old('nivelEstudio', $hojaVida->nivelEstudio) == 'TECNOLÓGICO' ? 'selected' : '' }}>TECNOLÓGICO</option>
                    <option value="PROFESIONAL" {{ old('nivelEstudio', $hojaVida->nivelEstudio) == 'PROFESIONAL' ? 'selected' : '' }}>PROFESIONAL</option>
                    <option value="ESPECIALISTA" {{ old('nivelEstudio', $hojaVida->nivelEstudio) == 'ESPECIALISTA' ? 'selected' : '' }}>ESPECIALISTA</option>
                </select>
            </div>
            <div class="col-md-12 mt-2">
                <label for="habilidades" class="form-label">Habilidades</label>
                <textarea rows="2" class="form-control" id="habilidades" name="habilidades" placeholder="Ingrese habilidades">{{old('habilidades', $hojaVida->habilidades)}}</textarea>
            </div>
            <div class="col-md-4 mt-2">
                <label for="fecha_ing" class="form-label">Fecha Ingreso</label>
                <input type="datetime-local" class="form-control" id="fecha_ing" name="fecha_ing" placeholder="Fecha Habilitación" value="{{old('fecha_ing', $hojaVida->fecha_ing)}}">
            </div>
            <div class="col-md-4 mt-3">
                <label for="TipoContrato">Seleccione Tipo de Contrato</label>
                <select class="form-select" aria-label="select" name="TipoContrato">
                    <option value="PRESTACIÓN DE SERVICIOS" {{ old('TipoContrato', $hojaVida->TipoContrato) == 'PRESTACIÓN DE SERVICIOS' ? 'selected' : '' }}>PRESTACIÓN DE SERVICIOS</option>
                    <option value="FIJO INFERIOR A UN AÑO" {{ old('TipoContrato', $hojaVida->TipoContrato) == 'FIJO INFERIOR A UN AÑO' ? 'selected' : '' }}>FIJO INFERIOR A UN AÑO</option>
                    <option value="SIN CONTRATO" {{ old('TipoContrato', $hojaVida->TipoContrato) == 'SIN CONTRATO' ? 'selected' : '' }}>SIN CONTRATO</option>
                </select>
            </div>
            <div class="col-md-4 mt-3">
                <label for="tipoEmpl">Seleccione Condición</label>
                <select class="form-select" aria-label="select" name="tipoEmpl">
                    <option value="CONDUCTOR" select>CONDUCTOR</option>
                </select>
            </div>
            <div class="col-md-4 mt-3">
                <label for="cargoHV" class="form-label">Cargo</label>
                <input type="text" class="form-control" id="cargoHV" name="cargoHV" placeholder="Ingrese cargo" value="{{old('cargoHV', $hojaVida->cargoHV)}}">
            </div>
            <div class="col-md-4 mt-3">
                <label for="licencia" class="form-label">Número Licencia</label>
                <input type="number" class="form-control" id="licencia" name="licencia" placeholder="Ingrese Número licencia" value="{{old('licencia', $hojaVida->licencia)}}">
            </div>
            <div class="col-md-4 mt-3">
                <label for="categoria">Seleccione Categoría Licencia</label>
                <select class="form-select" aria-label="select" name="categoria">
                    <option value="1RA" {{ old('categoria', $hojaVida->categoria) == '1RA' ? 'selected' : '' }}>1RA</option>
                    <option value="2DA" {{ old('categoria', $hojaVida->categoria) == '2DA' ? 'selected' : '' }}>2DA</option>
                    <option value="3RA" {{ old('categoria', $hojaVida->categoria) == '3RA' ? 'selected' : '' }}>3RA</option>
                    <option value="4TA" {{ old('categoria', $hojaVida->categoria) == '4TA' ? 'selected' : '' }}>4TA</option>
                    <option value="5TA" {{ old('categoria', $hojaVida->categoria) == '5TA' ? 'selected' : '' }}>5TA</option>
                    <option value="6TA" {{ old('categoria', $hojaVida->categoria) == '6TA' ? 'selected' : '' }}>6TA</option>
                    <option value="C1" {{ old('categoria', $hojaVida->categoria) == 'C1' ? 'selected' : '' }}>C1</option>
                    <option value="C2" {{ old('categoria', $hojaVida->categoria) == 'C2' ? 'selected' : '' }}>C2</option>
                    <option value="C3" {{ old('categoria', $hojaVida->categoria) == 'C3' ? 'selected' : '' }}>C3</option>
                    <option value="4" {{ old('categoria', $hojaVida->categoria) == '4' ? 'selected' : '' }}>4</option>
                    <option value="B1" {{ old('categoria', $hojaVida->categoria) == 'B1' ? 'selected' : '' }}>B1</option>
                    <option value="B2" {{ old('categoria', $hojaVida->categoria) == 'B2' ? 'selected' : '' }}>B2</option>
                    <option value="C4" {{ old('categoria', $hojaVida->categoria) == 'C4' ? 'selected' : '' }}>C4</option>
                    <option value="A2" {{ old('categoria', $hojaVida->categoria) == 'A2' ? 'selected' : '' }}>A2</option>
                </select>
            </div>
            <div class="col-md-6 mt-2">
                <label for="vigLicencia" class="form-label">Vig Licencia</label>
                <input type="datetime-local" class="form-control" id="vigLicencia" name="vigLicencia" placeholder="Fecha Habilitación" value="{{old('vigLicencia', $hojaVida->vigLicencia)}}">
            </div>
            <div class="col-md-6 mt-2">
                <label for="fechaAfilSS" class="form-label">Afiliación S.S</label>
                <input type="datetime-local" class="form-control" id="fechaAfilSS" name="fechaAfilSS" placeholder="Fecha Habilitación" value="{{old('fechaAfilSS', $hojaVida->fechaAfilSS)}}">
            </div>
            <div class="col-md-4 mt-3">
                <label for="EPS">Seleccione E.P.S</label>
                <select class="form-select" aria-label="select" name="EPS">
                    <option value="ASMET SALUD" {{ old('EPS', $hojaVida->EPS) == 'ASMET SALUD' ? 'selected' : '' }}>ASMET SALUD</option>
                    <option value="CAFÉ SALUD" {{ old('EPS', $hojaVida->EPS) == 'CAFÉ SALUD' ? 'selected' : '' }}>CAFÉ SALUD</option>
                    <option value="COOMEVA" {{ old('EPS', $hojaVida->EPS) == 'COOMEVA' ? 'selected' : '' }}>COOMEVA</option>
                    <option value="COOSALUD" {{ old('EPS', $hojaVida->EPS) == 'COOSALUD' ? 'selected' : '' }}>COOSALUD</option>
                    <option value="FAMISANAR" {{ old('EPS', $hojaVida->EPS) == 'FAMISANAR' ? 'selected' : '' }}>FAMISANAR</option>
                    <option value="NUEVA EPS" {{ old('EPS', $hojaVida->EPS) == 'NUEVA EPS' ? 'selected' : '' }}>NUEVA EPS</option>
                    <option value="S.O.S" {{ old('EPS', $hojaVida->EPS) == 'S.O.S' ? 'selected' : '' }}>S.O.S</option>
                    <option value="SALUD TOTAL" {{ old('EPS', $hojaVida->EPS) == 'SALUD TOTAL' ? 'selected' : '' }}>SALUD TOTAL</option>
                    <option value="SANITAS" {{ old('EPS', $hojaVida->EPS) == 'SANITAS' ? 'selected' : '' }}>SANITAS</option>
                    <option value="SURA" {{ old('EPS', $hojaVida->EPS) == 'SURA' ? 'selected' : '' }}>SURA</option>
                </select>
            </div>
            <div class="col-md-4 mt-3">
                <label for="EPS">Seleccione A.R.L</label>
                <select class="form-select" aria-label="select" name="EPS">
                    <option value="SURA" select>SURA</option>
                </select>
            </div>
            <div class="col-md-4 mt-3">
                <label for="FP">Seleccione Fondo Pensiones</label>
                <select class="form-select" aria-label="select" name="FP">
                    <option value="COLFONDOS" {{ old('FP', $hojaVida->FP) == 'COLFONDOS' ? 'selected' : '' }}>COLFONDOS</option>
                    <option value="COLPENSIONES" {{ old('FP', $hojaVida->FP) == 'COLPENSIONES' ? 'selected' : '' }}>COLPENSIONES</option>
                    <option value="PORVENIR" {{ old('FP', $hojaVida->FP) == 'PORVENIR' ? 'selected' : '' }}>PORVENIR</option>
                    <option value="PROTECCIÓN" {{ old('FP', $hojaVida->FP) == 'PROTECCIÓN' ? 'selected' : '' }}>PROTECCIÓN</option>
                </select>
            </div>
            <div class="col-md-6 mt-3">
                <label for="Cesantias">Seleccione Fondo Cesantias</label>
                <select class="form-select" aria-label="select" name="Cesantias">
                    <option value="COLFONDOS" {{ old('Cesantias', $hojaVida->Cesantias) == 'COLFONDOS' ? 'selected' : '' }}>COLFONDOS</option>
                    <option value="FONDO NAL DEL AHORRO" {{ old('Cesantias', $hojaVida->Cesantias) == 'FONDO NAL DEL AHORRO' ? 'selected' : '' }}>FONDO NAL DEL AHORRO</option>
                    <option value="PORVENIR" {{ old('Cesantias', $hojaVida->Cesantias) == 'PORVENIR' ? 'selected' : '' }}>PORVENIR</option>
                    <option value="PROTECCIÓN" {{ old('Cesantias', $hojaVida->Cesantias) == 'PROTECCIÓN' ? 'selected' : '' }}>PROTECCIÓN</option>
                </select>
            </div>
            <div class="col-md-6 mt-3">
                <label for="CCF">Seleccione C.C.F</label>
                <select class="form-select" aria-label="select" name="CCF">
                    <option value="CONFAMILIARES" select>CONFAMILIARES</option>
                </select>
            </div>
            <div class="col-md-4 mt-3">
                <label for="EntBancaria" class="form-label">Entidad Bancaria</label>
                <input type="text" class="form-control" id="EntBancaria" name="EntBancaria" placeholder="Ingrese entidad bancaria" value="{{old('EntBancaria', $hojaVida->EntBancaria)}}">
            </div>
            <div class="col-md-3 mt-3">
                <label for="TipoCuenta">Seleccione Tipo de Cuenta</label>
                <select class="form-select mt-2" aria-label="select" name="TipoCuenta">
                    <option value="AHORRO" {{ old('TipoCuenta', $hojaVida->TipoCuenta) == 'PROTECCIÓN' ? 'selected' : '' }}>AHORRO</option>
                    <option value="CORRIENTE" {{ old('TipoCuenta', $hojaVida->CORRIENTE) == 'PROTECCIÓN' ? 'selected' : '' }}>CORRIENTE</option>
                </select>
            </div>
            <div class="col-md-5 mt-3">
                <label for="NroCuenta" class="form-label">Número de Cuenta</label>
                <input type="number" class="form-control" id="NroCuenta" name="NroCuenta" placeholder="Ingrese número de cuenta" value="{{old('NroCuenta', $hojaVida->NroCuenta)}}">
            </div>
            <div class="col-md-12 mt-2">
                <label for="notasHV" class="form-label">Notas</label>
                <textarea rows="2" class="form-control" id="notasHV" name="notasHV" placeholder="Ingrese notas">{{old('notasHV', $hojaVida->notasHV)}}</textarea>
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
@endsection