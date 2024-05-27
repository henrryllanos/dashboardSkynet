@extends('layouts.app')


@section('title1')
    <!-- <button type="button" class="btn btn-dark" style="background-color: #1D3354" data-toggle="modal" data-target="#modalCrear">
        Crear materia
    </button> -->
    <div style="margin-top: 1%; display: flex; justify-content: center;">
        <h2>
            Lista de Materias Creadas
        </h2>
    </div>
@endsection

@section('content')

    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success" materias2="success">
            {{ session('success') }}
        </div>
        @endif
    </div>

    <div class="form-group">
        @can('materia_buscar')
        <span class="input-group" style="width: 60%; margin-right:auto; margin-left:auto">
            <img src="{{asset('images/search.svg')}}" alt="" style="border-radius: 10px; position: relative; width:100%; max-width:30px; right:8px;">
            <input id="searchTerm" type="text" onkeyup="doSearch()" class="form-control pull-right"  placeholder="Escribe para buscar en la tabla..." />
        </span>
        @endcan
    </div>

    <!--Tabla de Materias-->
    <div style="margin-top: 1%" class="table-responsive" >
        <table class="table" id="materias" >
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Materia</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nivel</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materias as $materia)
                <tr scope="row">
                    <td>{{ @$materia->id }}</td>
                    <td>{{ @$materia->nombre}}</td>
                    <td>{{ @$materia->carrera}}</td>
                    <td>{{ @$materia->codigo}}</td>
                    <td>{{ @$materia->nivel}}</td>
                    <td>{{ @$materia->tipo}}</td>

                    <td id="resp{{ $materia->id }}">
                        @if(@$materia->estado == 'Habilitado' )
                            <span class="badge badge-success">{{ @$materia->estado }}</span>

                        @elseif(@$materia->estado == 'Deshabilitado' )
                            <span class="badge badge-danger">{{ @$materia->estado }}</span>

                        @endif
                    </td>
                    <td>
                            @can('materia_estado')
                            <label class="switch">
                                <input data-id="{{ $materia->id }}" class="mi_checkbox" type="checkbox"
                                data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                data-on="Active" data-off="InActive" {{ $materia->estado == 'Habilitado'? 'checked' : '' }}>
                                <span class="slider round"></span>
                            </label>
                            @endcan
                            @can('materia_edit')
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar-{{$materia->id}}">
                                Editar
                            </button>
                            @endcan
                    </td>
                </tr>
                        @include('admin.materias.modalEditar')
                    {{-- @include('admin.materias.modalEliminar') --}}
                @endforeach
            </tbody>
        </table>
    </div>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <div class="modal fade bs-example-modal-lg" id="modalCrear">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title w-100 text-center">Nueva materia</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('admin.materias.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Codigo</label>
                            <input type="text" name="codigo" class="form-control" id="codigo" value="{{old('codigo')}}" required minlength="7" maxlength="15"
                            onkeypress="return blockNoNumber(event)">

                            <label for="name">Nombre Materia</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" value="{{old('nombre')}}" required minlength="5" maxlength="45"
                            onkeypress="return blockSpecialChar(event)">

                            <label for="name">Carrera</label>
                            <input type="text" name="carrera" class="form-control" id="carrera" value="{{old('carrera')}}" required minlength="5" maxlength="50"
                            onkeypress="return blockSpecialChar(event)">

                            <label for="name">Nivel</label>
                            <input type="text" name="nivel" class="form-control" id="nivel" value="{{old('nivel')}}" required minlength="1" maxlength="1"
                            onkeypress="return blockSpecialChar(event)">

                            <label for="tipo">Tipo Materia</label>
                            <select name="tipo" id="tipo" class="form-control" required>
                                <option value="">-- Selecciona el tipo de materia--</option>
                                <option value="Regular" @if(old('tipo') == 'Regular') selected @endif>Regular</option>
                                <option value="Electiva" @if(old('tipo') == 'Electiva') selected @endif>Electiva</option>
                            </select>

                            <label for="estado">Estado</label>
                            <select name="estado" id="estado" class="form-control" required>
                                <option value="">-- Selecciona el estado--</option>

                                <option value="Habilitado" @if(old('estado') == 'Habilitado') selected @endif>Habilitado</option>
                                <option value="Deshabilitado" @if(old('estado') == 'Deshabilitado') selected @endif>Deshabilitado</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="refresh">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script language="javascript">
        function doSearch() {
            var tableReg = document.getElementById('materias');
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

    <script {{-- type="text/javascript" --}}>
        function blockSpecialChar(e){
            var k;
            document.all ? k = e.keyCode : k = e.which;
            return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32);
        }
        function blockNoNumber(e){
            var k;
            document.all ? k = e.keyCode : k = e.which;
            return ( (k >= 48 && k <= 57));
        }

        $(document).ready(function() {
        $(window).load(function() {
            $(".cargando").fadeOut(1000);
        });


    });
    $('.mi_checkbox').click(function() {
            console.log($('.mi_checkbox'));
        //Verifico el estado del checkbox, si esta seleccionado sera igual a 1 de lo contrario sera igual a 0
        var estatus = $(this).prop('checked') == true ? 'Habilitado' : 'Deshabilitado';
        var id = $(this).data('id');
            console.log(estatus);

        $.ajax({
            type: "GET",
            dataType: "json",
            //url: '/StatusNoticia',
            url: "{{ url('/statusnoticia') }}",
            data: {'estatus': estatus, 'id': id},
            success: function(data){
                $('#resp' + id).html(data.var);
                console.log(data.var)

            }
        });
    })
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
@endsection


@section('footer')



@endsection

