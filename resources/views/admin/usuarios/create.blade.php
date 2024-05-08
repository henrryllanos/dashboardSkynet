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
                    <form action="" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <label for="name" class="col-ms-8 col-form-label">
                                            Nombre:</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <input name="name" type="text" class="form-control"  placeholder="Ingrese Nombre" value="" autofocus minlength="3" maxlength="10"
                                                onkeypress="return blockSpecialChar(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="ci" class="col-ms-8 col-form-label">
                                            CI:</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <input name="ci" type="text" class="form-control"  placeholder="Ingrese Carnet Identidad" value="" autofocus minlength="7" maxlength="10"
                                                onkeypress="return blockSpecialChar(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="email" class="col-ms-8 col-form-label">
                                            Correo:</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <input name="email" type="email" class="form-control"  placeholder="Ingrese Correo" value="" autofocus minlength="7" maxlength="10"
                                                onkeypress="return blockSpecialChar(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="password" class="col-ms-8 col-form-label">
                                            Contraseña:</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <input name="password" type="password" class="form-control"  placeholder="Ingrese Contraseña" value="" autofocus minlength="7" maxlength="10"
                                                onkeypress="return blockSpecialChar(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="departamento" class="col-ms-8 col-form-label">
                                            Departamento:</label>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <input name="departamento" type="text" class="form-control"  placeholder="Ingrese departamento" value="" autofocus minlength="7" maxlength="10"
                                                onkeypress="return blockSpecialChar(event)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


