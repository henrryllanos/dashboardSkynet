@extends('layouts.app')

@section('title1')
<div style="margin-top: 1%; display: flex; justify-content: center;">
        <h2>
            Lista de Solicitudes
        </h2>
</div>
@endsection

@section('content')
<div class="card-body">
    @if(session('success'))
    <div class="alert alert-success" solicitud="success">
        {{ session('success') }}
    </div>
    @endif
</div>

<!-- Button trigger modal -->
<div class="form-group">
    @can('solicitud_buscar')
    <span class="input-group" style="width: 60%; margin-right:auto; margin-left:auto">
        <img src="{{asset('images/search.svg')}}" alt="" style="border-radius: 10px; position: relative; width:100%; max-width:30px; right:8px;">
        <input id="searchTerm" type="text" onkeyup="doSearch()" class="form-control pull-right"  placeholder="Escribe para buscar en la tabla..." />
    </span>
    @endcan
</div>
<table class="table table-secondary table-striped mt-4" id="solicitudes">
    <thead>
        <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Nombre Docente</th>
            <th scope="col">Motivos</th>
            <th scope="col">Estudiantes</th>
            <th scope="col">Ambiente</th>
            <th scope="col">Hora inicio reserva</th>
            <th scope="col">Hora fin reserva</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($solicitudes as $solicitud)
        <tr>
            <td>{{ $solicitud->dia }}</td>
            <td>{{ $solicitud->name }}</td>
            <td>{{ $solicitud->motivo }}</td>
            <td>{{ $solicitud->cantidad }}</td>
            <td>{{ $solicitud->num_ambiente }}</td>
            <td>{{ $solicitud->hora_ini }} </td>
            <td>{{ $solicitud->hora_fin }} </td>
            <td>
                @can('solicitud_aceptar')
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAceptar{{$loop->index}}">
                    Aceptar
                </button>
                @endcan
                @can('solicitud_rechazar')
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRechazar{{$loop->index}}">
                    Rechazar
                </button>
                @endcan
            </td>
            <div class="modal fade" id="modalAceptar{{$loop->index}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{route('notificaciones.store')}}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mensaje de Aceptacion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating">
                                    <input type="hidden" name="solicitud" value="{{$solicitud->id}}">
                                    <input type="hidden" name="tipo" value="aceptado">
                                    <textarea name="mensaje" class="form-control" id="mensajeAceptar{{$loop->index}}" style="height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" id="confirmarAceptar{{$loop->index}}" >Confirmar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalRechazar{{$loop->index}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{route('notificaciones.store')}}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mensaje de Rechazo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating">
                                    <input type="hidden" name="solicitud" value="{{$solicitud->id}}">
                                    <input type="hidden" name="tipo" value="rechazado">
                                    <textarea name="mensaje" class="form-control" id="mensajeRechazar{{$loop->index}}" style="height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" id="confirmarRechazar{{$loop->index}}" >Confirmar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </tr>
        @endforeach
    </tbody>
</table>

<script language="javascript">
    function doSearch() {
        var tableReg = document.getElementById('solicitudes');
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
