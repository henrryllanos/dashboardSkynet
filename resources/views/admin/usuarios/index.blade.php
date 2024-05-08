@extends('layouts.app')

@section('title1')
    <a type="button" class="btn btn-dark" style="background-color: #1D3354; padding-top: 0.8%" href="{{ route('admin.usuarios.create')}}">
        Nuevo usuario
    </a>
    <div style="margin-top: 1%; display: flex; justify-content: center;">
        <h2>
            Usuarios Registrados
        </h2>
    </div>
@endsection

@section('content')
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success" role="success">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <span class="input-group" style="width:60%; margin-right:auto; margin-left:auto">
            <img src="{{asset('images/search.svg')}}" alt="" style="border-radius:10px; position:relative; width:100%; max-width:30px; right:8px;">
            <input type="text" id="searchTem" onkeyup="doSearch()" class="form-control pull-rigth" placeholder="Escribe para buscar en la tabla...">
        </span>
    </div>

    <div style="margin-top: 0%" class="table-responsive">
    <table class="table" id="usuarios">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Carnet Identidad</th>
                <th scope="col">Correo</th>
                <th scope="col">Estado</th>
                <!-- <th scope="col">Rol</th> -->
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr scope="row">
                    <td>{{ @$user -> id }}</td>
                    <td>{{ @$user -> name }}</td>
                    <td>{{ @$user -> ci }}</td>
                    <td>{{ @$user -> email}}</td>
                    <td>{{ @$user -> estadoCuenta}}</td>
                    <td>
                        <a type="button" class="btn btn-primary" href="{{ route('admin.usuarios.edit', $user->id)}}">
                        Editar
                        </a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar-{{$user->id}}">
                        Eliminar
                        </button>
                    </td>
                </tr>
                @include('admin.usuarios.modalEliminar')
            @endforeach
        </tbody>

    </table>
</div>





<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
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
    let refresh = document.getElementById('refresh');
    refresh.addEventListener('click', _ => {
            location.reload();
    })
</script>

<script language="javascript">
            function doSearch() {
                var tableReg = document.getElementById('usuarios');
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



