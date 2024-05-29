@extends('layouts.app')

@section('title1')
    <div class="d-flex justify-content-center">
        <h2>
            Crear Materias
        </h2>
    </div>
@endsection
@section('title2')
    <h4 class="card-title"> Ingresar Datos de Materias</h4>
@endsection

@section('content')

@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
@endif

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10" style="width: 12%;">
                    <form action="{{ route('admin.materias.store')}}" method="post" class="form-horizontal">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <label for="codigo" class="col-sm-2 col-form-label">Codigo Materia</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control @error('codigo') is-invalid @enderror" id="codigo" name="codigo" value="{{ old('codigo') }}" placeholder="Ingrese codigo de Materia"
                                        autofocus minlength="1" maxlength="5" onkeypress="return blockSpecialChar(event)">
                                        @error('codigo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Nombre Materia</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" id="nombre" value="{{old('nombre')}}" placeholder="Ingrese nombre de Materia"
                                        autofocus minlength="5" maxlength="35" onkeypress="return blockSpecialChar(event)">
                                        @error('nombre')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="carrera" class="col-sm-2 col-form-label">Carrera</label>
                                    <div class="col-sm-7">
                                        <select name="carrera" id="carrera" class="form-control" value="{{old('carrera')}}" required>
                                        <option value="">-- Selecciona el carrera--</option>
                                        <option value="Sistemas" @if(old('carrera') == 'Sistemas') selected @endif>Ing. Sistemas</option>
                                        <option value="Informatica" @if(old('carrera') == 'Informatica') selected @endif>Ing. Informatica</option>
                                        <option value="Electromecanica" @if(old('carrera') == 'Electromecanica') selected @endif>Electromecanica</option>
                                        <option value="Ing Civil" @if(old('carrera') == 'IngCivil') selected @endif>Ing Civil</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="tipo" class="col-sm-2 col-form-label">Tipo</label>
                                    <div class="col-sm-7">
                                        <select name="tipo" id="tipo" class="form-control" value="{{old('tipo')}}" required>
                                        <option value="">-- Selecciona el tipo--</option>
                                        <option value="Regular" @if(old('tipo') == 'Regular') selected @endif>Regular</option>
                                        <option value="Electiva" @if(old('tipo') == 'Electiva') selected @endif>Electiva</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="row">
                                    <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                                    <div class="col-sm-7">
                                    <select name="estado" id="estado" class="form-control" value="{{old('sector')}}" required>
                                        <option value="">-- Selecciona el estado--</option>

                                        <option value="Habilitado" @if(old('estado') == 'Habilitado') selected @endif>Habilitado</option>
                                        <option value="Deshabilitado" @if(old('estado') == 'Deshabilitado') selected @endif>Deshabilitado</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                                <!-- Boton de formulario -->
                                <div class="card-footer ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script language="javascript">
    function doSearch() {
        var tableReg = document.getElementById('ambientes');
        var searchText = document.getElementById('searchTerm').value.toLowerCase();
        for (var i = 1; i < tableReg.rows.length; i++) {
            var cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
            var found = false;
            for (var j = 0; j < cellsOfRow.length && !found; j++) {
                var compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) {
                    found = true;
                }
            }
            if (found) {
                tableReg.rows[i].style.display = '';
            } else {
                tableReg.rows[i].style.display = 'none';
            }
        }
    }
</script>

@endsection

@section('footer')

@endsection

