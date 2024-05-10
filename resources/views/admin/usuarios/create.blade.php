@extends('layouts.app')

@section('title1')

@endsection

@section('title2')
    <h4 class="card-title"> Ingresar Datos</h4>
@endsection

@section('content')

<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10" style="width: 12%;">
                    <form action="{{ route('admin.usuarios.store')}}" method="post" class="form-horizontal">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <label for="name" class="col-ms-2 col-form-label">
                                            Nombre:</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="name" type="text" class="form-control"  placeholder="Ingrese Nombre" value="{{old('name')}}" autofocus minlength="3" maxlength="10"
                                                    onkeypress="return blockSpecialChar(event)">
                                            @if($errors->has('name'))
                                                <span class="error text-danger" for="input-name" style="font-size: 15px">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="ci" class="col-ms-2 col-form-label">
                                            CI:</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <input name="ci" type="text" class="form-control"  placeholder="Ingrese Carnet Identidad" value="{{old('ci')}}" autofocus minlength="7" maxlength="10"
                                                onkeypress="return blockSpecialChar(event)">
                                                @if($errors->has('ci'))
                                                <span class="error text-danger" for="input-ci" style="font-size: 15px">{{ $errors->first('ci') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="email" class="col-ms-8 col-form-label">
                                            Correo:</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <input name="email" type="email" class="form-control"  placeholder="Ingrese Correo" value="{{old('email')}}" autofocus minlength="10" maxlength="35"
                                                onkeypress="return blockSpecialChar(event)">
                                                @if($errors->has('email'))
                                                <span class="error text-danger" for="input-email" style="font-size: 15px">{{ $errors->first('email') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="password" class="col-ms-8 col-form-label">
                                            Contraseña:</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <input name="password" type="password" class="form-control"  placeholder="Ingrese Contraseña" value="{{old('password')}}" autofocus minlength="7" maxlength="10"
                                                onkeypress="return blockSpecialChar(event)">
                                                @if($errors->has('password'))
                                                <span class="error text-danger" for="input-password" style="font-size: 15px">{{ $errors->first('password') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="departamento" class="col-ms-8 col-form-label">
                                            Departamento:</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <input name="departamento" type="text" class="form-control"  placeholder="Ingrese departamento" value="{{old('departamento')}}" autofocus minlength="7" maxlength="60"
                                                onkeypress="return blockSpecialChar(event)">
                                                @if($errors->has('departamento'))
                                                <span class="error text-danger" for="input-departamento" style="font-size: 15px">{{ $errors->first('departamento') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                </div>

                                    <div class="row">
                                            <label for="roles" class="col-sm-2 col-form-label">Roles</label>
                                                <div class="col-sm-7">
                                                    <div class="form-group">
                                                        <div class="tab-content">
                                                            <div class="tab-pane active">
                                                                <table class="table">
                                                                    <tbody>
                                                                        @foreach ($roles as $id => $role)
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="form-check" >
                                                                                        <label class="form-check-label" style="margin-bottom: 10%">
                                                                                            <input class="form-check-input" type="checkbox" name="roles[]"
                                                                                                value="{{ $id }}"
                                                                                            >
                                                                                            <span class="form-check-sign">
                                                                                                <span class="check"></span>
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
                                            <!-- Boton de formulario -->
                                            <div class="card-footer ml-auto mr-auto">
                                                <button type="submit" class="btn btn-primary">Guardar</button>
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


