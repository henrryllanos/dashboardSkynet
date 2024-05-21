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

<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10" style="width: 12%;">
                <form action="{{ route('admin.materias.store')}}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                        <div class="card">
                            <div class="card-body">
                            <div class="row">
                                <label for="codigo" class="col-sm-2 col-form-label">Codigo Materia</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Ingrese codigo de Materia" value="{{old('codigo')}}" autofocus minlength="1" maxlength="5"
                                    onkeypress="return blockSpecialChar(event)">
                                    @if ($errors->has('codigo'))
                                        <span class="error text-danger" for="input-codigo" style="font-size: 15px">{{ $errors->first('codigo') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="nombre" class="col-sm-2 col-form-label">Nombre Materia</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre de Materia" value="{{old('nombre')}}" autofocus minlength="1" maxlength="15"
                                    onkeypress="return blockSpecialChar(event)">
                                    @if ($errors->has('nombre'))
                                        <span class="error text-danger" for="input-nombre" style="font-size: 15px">{{ $errors->first('nombre') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="carrera" class="col-sm-2 col-form-label">Carrera</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="carrera" placeholder="Ingrese la carrera" value="{{ old('carrera') }}" required minlength="1" maxlength="35"
                                    onkeypress="return blockNoNumber(event)">
                                    @if ($errors->has('carrera'))
                                        <span class="error text-danger" for="input-ci" style="font-size: 15px">{{ $errors->first('carrera') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="nivel" class="col-sm-2 col-form-label">Nivel</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="nivel" placeholder="Ingrese el nivel" value="{{ old('nivel') }}" required minlength="1" maxlength="1"  >
                                    @if ($errors->has('nivel'))
                                        <span class="error text-danger" for="input-nivel" style="font-size: 15px">{{ $errors->first('nivel') }}</span>
                                    @endif
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
                                            <!-- Boton de formulario -->
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="refresh">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Aceptar</button>
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
