@extends('layouts.app')


<?php

use Illuminate\Support\Arr;

    $estado = ["Habilitado","Deshabilitado"];
    $estado = array_diff($estado, array("{$user->estadoCuenta}"));
    $estado = Arr::prepend($estado, "{$user->estadoCuenta}");
?>

@section('title1')
        <h4 class="card-title"> Editar </h4>
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
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" autofocus minlength="4" maxlength="20"
                                    onkeypress="return blockSpecialChar(event)">
                                    @if ($errors->has('name'))
                                        <span class="error text-danger" for="input-name" style="font-size: 15px">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" minlength="10" maxlength="25"  >
                                    @if ($errors->has('email'))
                                        <span class="error text-danger" for="input-email" style="font-size: 15px">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="password" placeholder="Ingrese la contraseña sólo en caso de modificarla" minlength="5" maxlength="15" >
                                    @if ($errors->has('password'))
                                        <span class="error text-danger" for="input-password" style="font-size: 15px">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="departamento" class="col-sm-2 col-form-label">Departamento</label>
                                <div class="col-sm-7">
                                <input type="text" class="form-control" name="departamento" value="{{ old('departamento', $user->Departamento) }}" autofocus minlength="4" maxlength="15"
                                onkeypress="return blockSpecialChar(event)">
                                @if ($errors->has('departamento'))
                                    <span class="error text-danger" for="input-departamento" style="font-size: 15px">{{ $errors->first('departamento') }}</span>
                                @endif
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


