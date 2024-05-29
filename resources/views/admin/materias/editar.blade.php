@extends('layouts.app')

@section('title1')
    <!-- <button type="button" class="btn btn-dark" style="background-color: #1D3354" data-toggle="modal" data-target="#modalCrear">
        Crear materia
    </button> -->
    <div style="margin-top: 1%; display: flex; justify-content: center;">
        <h2>
            Editar las Materias
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

