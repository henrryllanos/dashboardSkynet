@extends('layouts.app')

@section('title1')
    <!-- <button type="button" class="btn btn-dark" style="background-color: #1D3354" data-toggle="modal"
            data-target="#modalCrear">
        Registro de Ambiente
    </button> -->
    <div style="margin-top: 1%; display: flex; justify-content: center;">
        <h2>
            Editar Ambientes Registradas
        </h2>
    </div>
@endsection
@section('content')

    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success" ambiente2="success">
            {{ session('success') }}
        </div>
        @endif
    </div>

    <div class="form-group" >
        @can('ambiente_buscar')
            <span class="input-group" style="width: 60%; margin-right:auto; margin-left:auto">
                <img src="{{asset('images/search.svg')}}" alt="" style="border-radius: 10px; position: relative; width:100%; max-width:30px; right:8px;">
                <input id="searchTerm" type="text" onkeyup="doSearch()" class="form-control pull-right"  placeholder="Escribe para buscar en la tabla..." />
            </span>
        @endcan
    </div>

            <!--Tabla de AMBIENTES-->
        <div style="margin-top: 1%" class="table-responsive" >
                <table class="table" id="ambientes" >
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre Ambiente</th>
                            <th scope="col">Capacidad Ambiente</th>
                            <th scope="col">Ubicacion Ambiente</th>
                            <th scope="col">Facultad</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ambientes as $ambiente)
                            <tr scope="row">
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ @$ambiente->num_ambiente }}</td>
                                <td>{{ @$ambiente->capacidad }}</td>
                                <td>{{ @$ambiente->nombre }}</td>
                                <td>{{ @$ambiente->facultad }}</td>
                                <td>
                                    <!-- esto es la logica del estado de aulas que aparece en la tabla -->
                                        @if(@$ambiente->estado == 'Habilitado' )
                                            <span class="badge badge-success">{{ @$ambiente->estado }}</span>

                                        @elseif(@$ambiente->estado == 'Deshabilitado' )
                                            <span class="badge badge-danger">{{ @$ambiente->estado }}</span>

                                        @elseif(@$ambiente->estado == 'Mantenimiento' )
                                            <span class="badge badge-warning">{{ @$ambiente->estado }}</span>
                                        @endif
                                </td>

                                    <!-- la logica de boton de editar Eliminar -->
                                <td>
                                    @can('ambiente_edit')
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar-{{$ambiente->id}}">
                                        Editar
                                    </button>
                                    @endcan
                                    @can('ambiente_destroy')
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar-{{$ambiente->id}}">
                                        Eliminar
                                    </button>
                                    @endcan
                                </td>
                            </tr>
                            <!-- Estos son los madales que aparecen en los botones de editar eliminar de la tabla -->
                                @include('admin.ambientes.modalEditar')
                                @include('admin.ambientes.modalEliminar')
                        @endforeach
                    </tbody>
                </table>
            </div>

    <!-- Evento del modal para registrar -->
            <script type="text/javascript">
                function blockSpecialChar(e){
                    var k;
                    document.all ? k = e.keyCode : k = e.which;
                    return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
                    }
                function blockNoNumber(e){
                    var k;
                    document.all ? k = e.keyCode : k = e.which;
                    return ( (k >= 48 && k <= 57));
                    }
                let refresh = document.getElementById('refresh');
                refresh.addEventListener('click', _ => {
                        location.reload();
                })
            </script>

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
<!-- Evento para el buscador -->

<!-- Este script es para el buscador de la tabla -->

@endsection

@section('footer')

@endsection
