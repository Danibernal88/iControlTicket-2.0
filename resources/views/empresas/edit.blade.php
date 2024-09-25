@extends('administracion.index')
@section("title",  "Edit {$empresa->nombre}")
@section('tab-content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
                <h1 class="text-center">Editar {{$empresa->nombre}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-3">
                <a href="{{ route('empresa.show') }}" class="btn btn-danger">Atras</a>
            </div>
        </div>
        <form class="row shadow m-3 p-3" method="post" action="{{route('empresa.update', $empresa)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6 mt-2">
                <label for="direccion" class="form-label">Dirección *</label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" value="{{old('direccion', $empresa->direccion)}}">
            </div>
            <div class="col-md-6 mt-2">
                <label for="telefono" class="form-label">Teléfono(s) *</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono(s)" value="{{old('telefono', $empresa->telefono)}}">
            </div>
            <div class="col-md-6 mt-2">
                <label for="movil" class="form-label">Móvil *</label>
                <input type="text" class="form-control" id="movil" name="movil" placeholder="Móvil" value="{{old('movil', $empresa->movil)}}">
            </div>
            <div class="col-md-6 mt-2">
                <label for="email" class="form-label">Email *</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email', $empresa->email)}}">
            </div>
            <div class="col-md-6 mt-2">
                <label for="web" class="form-label">Web *</label>
                <input type="text" class="form-control" id="web" name="web" placeholder="Web" value="{{old('web', $empresa->web)}}">
            </div>
            <div class="col-md-6 mt-2">
                <label for="codDirTerritorial" class="form-label">Código Territorial *</label>
                <input type="text" class="form-control" id="codDirTerritorial" name="codDirTerritorial" placeholder="Código Territorial" value="{{old('codDirTerritorial', $empresa->codDirTerritorial)}}">
            </div>
            <div class="col-md-6 mt-2">
                <label for="nroResolucionEmp" class="form-label">Número Resolución *</label>
                <input type="text" class="form-control" id="nroResolucionEmp" name="nroResolucionEmp" placeholder="Número Resolución" value="{{old('nroResolucionEmp', $empresa->nroResolucionEmp)}}">
            </div>
            <div class="col-md-6 mt-2">
                <label for="fechaHab" class="form-label">Fecha Habilitación *</label>
                <input type="datetime-local" class="form-control" id="fechaHab" name="fechaHab" placeholder="Fecha Habilitación" value="{{old('fechaHab', $empresa->fechaHab)}}">
            </div>
            <div class="col-md-6 mt-2">
                <label for="foto" class="form-label">Imagen Empresa *</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                <small class="form-text text-muted">Sube un archivo nuevo para actualizarlo.</small>
            </div>
            <div class="col-md-6 mt-2">
                <label for="RLEmpresa" class="form-label">Representante Legal *</label>
                <input type="text" class="form-control" id="RLEmpresa" name="RLEmpresa" placeholder="Representante Legal" value="{{old('RLEmpresa', $empresa->RLEmpresa)}}">
            </div>
            <div class="col-md-6 mt-2">
                <label for="Regimen" class="form-label">Régimen *</label>
                <input type="text" class="form-control" id="Regimen" name="Regimen" placeholder="Régimen" value="{{old('Regimen', $empresa->Regimen)}}">
            </div>
            <div class="col-md-6 mt-2">
                <label for="Lema" class="form-label">Lema *</label>
                <input type="text" class="form-control" id="Lema" name="Lema" placeholder="Lema" value="{{old('Lema', $empresa->Lema)}}">
            </div>
            <div class="col-md-6 mt-2">
                <label for="nivelServ" class="form-label">Nivel Servicio *</label>
                <input type="text" class="form-control" id="nivelServ" name="nivelServ" placeholder="Nivel Servicio" value="{{old('nivelServ', $empresa->nivelServ)}}">
            </div>
            <div class="col-md-6 mt-2">
                <label for="habeasData" class="form-label">Habeas Data *</label>
                <input type="text" class="form-control" id="habeasData" name="habeasData" placeholder="Habeas Data" value="{{old('habeasData', $empresa->habeasData)}}">
            </div>
            <div class="col-md-6 mt-3">
                <label for="ciudad">Departamento - Municipio - Centro Pob *</label>
                <select name="ciudad" id="ciudad" class="form-control">
                    @foreach($poblaciones as $poblacion)
                        <option value="{{ $poblacion->idCenPob }}" {{ $empresa->ciudad == $poblacion->idCenPob ? 'selected' : '' }}>
                        {{ $poblacion->Departamento }} - {{ $poblacion->Municipio }} - {{ $poblacion->CentroPoblado }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mt-3">
                <div id="image-input-container" style="{{ old('logoISO', $empresa->logoISO) ? 'display: block;' : 'display: none;' }}">
                    <label for="image-input-iso" class="form-label">Imagen Certificación ISO *</label>
                    <input type="file" class="form-control" id="image-input-iso" name="rutaCarpDocTER" accept="image/*">
                    <small class="form-text text-muted">Sube un archivo nuevo para actualizarlo.</small>
                </div>
            </div>
            <div class="col-md-12 mt-3 text-center">
                <label for="flexCheckDefault" class="form-label">Certificación ISO</label>
                <div class="form-check d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" value="1" name="logoISO" id="flexCheckDefault" onchange="toggleImageInput()" {{ old('logoISO', $empresa->logoISO) ? 'checked' : '' }}>
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
            <div class="col-12 mt-2 text-center mt-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
    <script>
        function toggleImageInput() {
            var imageInputContainer = document.getElementById('image-input-container');
            var imageInput = document.getElementById('image-input-iso');

            if (imageInputContainer.style.display === 'none') {
                imageInputContainer.style.display = 'block';
            } else {
                imageInputContainer.style.display = 'none';
                imageInput.value = ''; // Limpiar el valor del campo
            }
        }
    </script>
@endsection