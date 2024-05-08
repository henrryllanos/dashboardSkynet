@extends('layouts.app')


<?php
    $estado = ["Habilitado","Deshabilitado", "titular", "invitado"];
    $estado = array_diff($estado, array("{$user->estadoCuenta}"));
    $estado = Arr::prepend($estado, "{$user->estadoCuenta}");
?>

@section('title1')
        <h4 class="card-title"> Editar Datos</h4>
@endsection

@section('content')

<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10" style="width: 12%;">
                    <form action="{{route('admin.usuarios.update', $user->id)}}" method="post" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <label for="name" class="col-ms-8 col-form-label">
                                            Nombre:</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <input name="name" type="text" class="form-control"  placeholder="Ingrese Nombre" value="{{old('name', $user->name)}}" autofocus minlength="3" maxlength="10"
                                                onkeypress="return blockSpecialChar(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="ci" class="col-ms-8 col-form-label">
                                            CI:</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <input name="ci" type="text" class="form-control"  placeholder="Ingrese Carnet Identidad" value="{{old('ci', $user->ci)}}" autofocus minlength="7" maxlength="10"
                                                onkeypress="return blockSpecialChar(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="email" class="col-ms-8 col-form-label">
                                            Correo:</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <input name="email" type="email" class="form-control"  placeholder="Ingrese Correo" value="{{old('email', $user->email)}}" autofocus minlength="7" maxlength="10"
                                                onkeypress="return blockSpecialChar(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="password" class="col-ms-8 col-form-label">
                                            Contraseña:</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <input name="password" type="password" class="form-control"  placeholder="Ingrese Contraseña" autofocus minlength="7" maxlength="10"
                                                onkeypress="return blockSpecialChar(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="departamento" class="col-ms-8 col-form-label">
                                            Departamento:</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <input name="departamento" type="text" class="form-control"  placeholder="Ingrese departamento" value="{{old('departemento', $user->Departamento)}}" autofocus minlength="7" maxlength="10"
                                                onkeypress="return blockSpecialChar(event)">
                                        </div>
                                    </div>
                                </div>

                                    <div class="row" >
                                        <label for="estadoCuenta"  class="col-sm-2 col-form-label">Estado de cuenta</label>
                                        <div class="col-sm-7">
                                            <select name="estadoCuenta" id="estadoCuenta" class="form-control"  required>
                                                @foreach($estado as $es)
                                                <option value="{{$es}}">{{$es}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="name" class="col-sm-2 col-form-label">Roles</label>
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <table class="table">
                                                                <tbody>
                                                                    @foreach ($roles as $id => $role)
                                                                    <tr>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <label class="form-check-label" style="margin-bottom: 10%">
                                                                                    <input class="form-check-input" type="checkbox"
                                                                                        name="roles[]"
                                                                                        value="{{ $id }}" {{ $user->roles->contains($id) ? 'checked' : ''}}
                                                                                    >
                                                                                    <span class="form-check-sign">
                                                                                        <span class="check" value=""></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            {{ $role }}
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                            <!-- Boton de Actualizar  -->
                                        <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('footer')

@endsection


