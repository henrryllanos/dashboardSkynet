@extends('layouts.app')

@section('title1')
    <div class="d-flex justify-content-center">
        <h2>
            Crear Ambientes
        </h2>
    </div>
@endsection

@section('title2')
    <h4 class="card-title"> Ingresar Datos de Ambientes</h4>
@endsection

@section('content')

<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10" style="width: 12%;">
                    <form action="{{ route('admin.ambientes.store')}}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                        <div class="card">
                            <div class="card-body">
                            <div class="row">
                                <label for="codigo" class="col-sm-2 col-form-label">Codigo</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Ingrese nombre de ambiente" value="{{old('codigo')}}" autofocus minlength="5" maxlength="15"
                                    onkeypress="return blockSpecialChar(event)">
                                    @if ($errors->has('codigo'))
                                        <span class="error text-danger" for="input-codigo" style="font-size: 15px">{{ $errors->first('codigo') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="num_ambiente" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="num_ambiente" id="num_ambiente" placeholder="Ingrese nombre de ambiente" value="{{old('num_ambiente')}}" autofocus minlength="1" maxlength="15"
                                    onkeypress="return blockSpecialChar(event)">
                                    @if ($errors->has('num_ambiente'))
                                        <span class="error text-danger" for="input-num_ambiente" style="font-size: 15px">{{ $errors->first('num_ambiente') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="capacidad" class="col-sm-2 col-form-label">Capacidad</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="capacidad" placeholder="Ingrese la Capacidad" value="{{ old('capacidad') }}" required minlength="1" maxlength="3"
                                    onkeypress="return blockNoNumber(event)">
                                    @if ($errors->has('capacidad'))
                                        <span class="error text-danger" for="input-ci" style="font-size: 15px">{{ $errors->first('ci') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="facultad" class="col-sm-2 col-form-label">Facultad</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="facultad" placeholder="Ingrese la facultad" value="{{ old('facultad') }}" required minlength="5" maxlength="35"  >
                                    @if ($errors->has('facultad'))
                                        <span class="error text-danger" for="input-facultad" style="font-size: 15px">{{ $errors->first('facultad') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="ubicaciones" class="col-sm-2 col-form-label">Ubicacion</label>
                                <div class="col-sm-7">
                                    <select name="ubicacion" id="ubicacion" class="form-control" value="{{old('ubicacion')}}" required>
                                    <option value="">-- Selecciona la ubicacion--</option>
                                    @foreach ($ubicaciones as $item)
                                        <option value="{{$item->id}}">{{ $item->nombre}}</option>
                                    @endforeach
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
                                    <option value="Mantenimiento" @if(old('estado') == 'Mantenimiento') selected @endif>Mantenimiento</option>
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
