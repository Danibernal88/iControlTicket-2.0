@extends('administracion.index')
@section('tab-content')
<div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-3">Crear Hoja de Vida</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-3">
                <a href="{{ route('hojaVidas.index') }}" class="btn btn-danger">Regresar</a>
            </div>
        </div>
        <form class="row shadow m-3 p-3" method="post" action="{{route('hojaVidas.store')}}">
            @csrf
            <div class="col-md-4 mt-2">
                <label for="estado">Seleccione Estado</label>
                <select class="form-select mt-2" aria-label="select" name="estado">
                    <option value="ACTIVO" select>ACTIVO</option>
                    <option value="INACTIVO">INACTIVO</option>
                </select>
            </div>
            <div class="col-md-4 mt-2">
                <label for="idtercero" class="form-label">Seleccione Tercero *</label>
                <select id="tercero-select" class="mi-selector" style="width: 100%;" name="idtercero">
                    @foreach ($terceros as $tercero)
                        <option value="{{ $tercero->idTerceros }}">{{ $tercero->nombreCompleto }} - {{ $tercero->nDocumento }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mt-2">
            <label for="jefeInmediato" class="form-label">Seleccione Jefe Inmediato</label>
                <select id="jefe-select" class="mi-selector" style="width: 100%;" name="jefeInmediato">
                    @foreach ($terceros as $tercero)
                        <option value="{{ $tercero->nombreCompleto }}">{{ $tercero->nombreCompleto }} - {{ $tercero->nDocumento }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mt-3">
                <label for="fechanto" class="form-label">Fecha Nacimiento</label>
                <input type="datetime-local" class="form-control" id="fechanto" name="fechanto" placeholder="Fecha Habilitación" value="{{old('fechanto')}}">
            </div>
            <div class="col-md-4 mt-3">
                <label for="fechaDef" class="form-label">Fecha Defunción</label>
                <input type="datetime-local" class="form-control" id="fechaDef" name="fechaDef" placeholder="Fecha Habilitación" value="{{old('fechaDef')}}">
            </div>
            <div class="col-md-4 mt-4">
                <label for="tiposangre">Seleccione Tipo de Sangre</label>
                <select class="form-select" aria-label="select" name="tiposangre">
                    <option value="O+" select>O+</option>
                    <option value="O-">O-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
            </div>
            <div class="col-md-6 mt-3">
                <label for="estadocivil">Seleccione Estado Civil</label>
                <select class="form-select" aria-label="select" name="estadocivil">
                    <option value="SOLTERO" select>SOLTERO</option>
                    <option value="CASADO">CASADO</option>
                    <option value="UNIÓN LIBRE">UNIÓN LIBRE</option>
                    <option value="VIUDO">VIUDO</option>
                    <option value="DIVORCIADO">DIVORCIADO</option>
                </select>
            </div>
            <div class="col-md-6 mt-3">
                <label for="nivelEstudio">Seleccione Nivel de Estudio</label>
                <select class="form-select" aria-label="select" name="nivelEstudio">
                    <option value="PRIMARIA" select>PRIMARIA</option>
                    <option value="SECUNDARIA">SECUNDARIA</option>
                    <option value="TÉCNICO">TÉCNICO</option>
                    <option value="TECNOLÓGICO">TECNOLÓGICO</option>
                    <option value="PROFESIONAL">PROFESIONAL</option>
                    <option value="ESPECIALISTA">ESPECIALISTA</option>
                </select>
            </div>
            <div class="col-md-12 mt-2">
                <label for="habilidades" class="form-label">Habilidades</label>
                <textarea rows="2" class="form-control" id="habilidades" name="habilidades" placeholder="Ingrese habilidades">{{old('habilidades')}}</textarea>
            </div>
            <div class="col-md-4 mt-2">
                <label for="fecha_ing" class="form-label">Fecha Ingreso</label>
                <input type="datetime-local" class="form-control" id="fecha_ing" name="fecha_ing" placeholder="Fecha Habilitación" value="{{old('fecha_ing')}}">
            </div>
            <div class="col-md-4 mt-3">
                <label for="TipoContrato">Seleccione Tipo de Contrato</label>
                <select class="form-select" aria-label="select" name="TipoContrato">
                    <option value="PRESTACIÓN DE SERVICIOS" select>PRESTACIÓN DE SERVICIOS</option>
                    <option value="FIJO INFERIOR A UN AÑO">FIJO INFERIOR A UN AÑO</option>
                    <option value="SIN CONTRATO">SIN CONTRATO</option>
                </select>
            </div>
            <div class="col-md-4 mt-3">
                <label for="tipoEmpl">Seleccione Condición</label>
                <select class="form-select" aria-label="select" name="tipoEmpl">
                    <option value="ADMINISTRATIVO" select>ADMINISTRATIVO</option>
                    <option value="CONDUCTOR">CONDUCTOR</option>
                    <option value="PROPIETARIO">PROPIETARIO</option>
                </select>
            </div>
            <div class="col-md-4 mt-3">
                <label for="cargoHV" class="form-label">Cargo</label>
                <input type="text" class="form-control" id="cargoHV" name="cargoHV" placeholder="Ingrese cargo" value="{{old('cargoHV')}}">
            </div>
            <div class="col-md-4 mt-3">
                <label for="licencia" class="form-label">Número Licencia</label>
                <input type="number" class="form-control" id="licencia" name="licencia" placeholder="Ingrese Número licencia" value="{{old('licencia')}}">
            </div>
            <div class="col-md-4 mt-3">
                <label for="categoria">Seleccione Categoría Licencia</label>
                <select class="form-select" aria-label="select" name="categoria">
                    <option value="1RA" select>1RA</option>
                    <option value="2DA">2DA</option>
                    <option value="3RA">3RA</option>
                    <option value="4TA">4TA</option>
                    <option value="5TA">5TA</option>
                    <option value="6TA">6TA</option>
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                    <option value="C3">C3</option>
                    <option value="4">4</option>
                    <option value="B1">B1</option>
                    <option value="B2">B2</option>
                    <option value="C4">C4</option>
                    <option value="A2">A2</option>
                </select>
            </div>
            <div class="col-md-6 mt-2">
                <label for="vigLicencia" class="form-label">Vig Licencia</label>
                <input type="datetime-local" class="form-control" id="vigLicencia" name="vigLicencia" placeholder="Fecha Habilitación" value="{{old('vigLicencia')}}">
            </div>
            <div class="col-md-6 mt-2">
                <label for="fechaAfilSS" class="form-label">Afiliación S.S</label>
                <input type="datetime-local" class="form-control" id="fechaAfilSS" name="fechaAfilSS" placeholder="Fecha Habilitación" value="{{old('fechaAfilSS')}}">
            </div>
            <div class="col-md-4 mt-3">
                <label for="EPS">Seleccione E.P.S</label>
                <select class="form-select" aria-label="select" name="EPS">
                    <option value="ASMET SALUD" select>ASMET SALUD</option>
                    <option value="CAFÉ SALUD">CAFÉ SALUD</option>
                    <option value="COOMEVA">COOMEVA</option>
                    <option value="COOSALUD">COOSALUD</option>
                    <option value="FAMISANAR">FAMISANAR</option>
                    <option value="NUEVA EPS">NUEVA EPS</option>
                    <option value="S.O.S">S.O.S</option>
                    <option value="SALUD TOTAL">SALUD TOTAL</option>
                    <option value="SANITAS">SANITAS</option>
                    <option value="SURA">SURA</option>
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
                    <option value="COLFONDOS" select>COLFONDOS</option>
                    <option value="COLPENSIONES">COLPENSIONES</option>
                    <option value="PORVENIR">PORVENIR</option>
                    <option value="PROTECCIÓN">PROTECCIÓN</option>
                </select>
            </div>
            <div class="col-md-6 mt-3">
                <label for="Cesantias">Seleccione Fondo Cesantias</label>
                <select class="form-select" aria-label="select" name="Cesantias">
                    <option value="COLFONDOS" select>COLFONDOS</option>
                    <option value="FONDO NAL DEL AHORRO">FONDO NAL DEL AHORRO</option>
                    <option value="PORVENIR">PORVENIR</option>
                    <option value="PROTECCIÓN">PROTECCIÓN</option>
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
                <input type="text" class="form-control" id="EntBancaria" name="EntBancaria" placeholder="Ingrese entidad bancaria" value="{{old('EntBancaria')}}">
            </div>
            <div class="col-md-3 mt-3">
                <label for="TipoCuenta">Seleccione Tipo de Cuenta</label>
                <select class="form-select mt-2" aria-label="select" name="TipoCuenta">
                    <option value="AHORRO" select>AHORRO</option>
                    <option value="CORRIENTE">CORRIENTE</option>
                </select>
            </div>
            <div class="col-md-5 mt-3">
                <label for="NroCuenta" class="form-label">Número de Cuenta</label>
                <input type="number" class="form-control" id="NroCuenta" name="NroCuenta" placeholder="Ingrese número de cuenta" value="{{old('NroCuenta')}}">
            </div>
            <div class="col-md-12 mt-2">
                <label for="notasHV" class="form-label">Notas</label>
                <textarea rows="2" class="form-control" id="notasHV" name="notasHV" placeholder="Ingrese notas">{{old('notasHV')}}</textarea>
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