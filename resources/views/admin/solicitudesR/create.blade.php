@extends('layouts.app')

@section('title1')

@endsection


@section('title2')
                <h5>
                    Reserva de Ambientes
                </h5>

@endsection

@section('content')
<div class="container">
    <div class="my-6">
        <div class="card">
            <div style="margin-top: 1%; display: flex; justify-content: center;">
                    @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Por favor corrige los siguentes errores:</strong>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                </div>
                        @endif
            </div>

            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                        <div class="card-bady">
                            {{-- @if($errors->any())
                                <div class="alert alert-primary">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif--}}
                            <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">
                                                Fecha(*)
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group">
                                                    <button class="btn btn-primary" type="button"></button>
                                                    <input name="dia" type="date" id="fechaReserva" class="form-control" placeholder="Dia Reserva" value="" required>
                                                </span>
                                                    <br>
                                                    <span class="error-danger" for="input-name"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">
                                                Periodo(*)
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group">
                                                    <button class="btn btn-primary" type="button"></button>
                                                    <!-- <input name="dia" type="date" id="fechaReserva" class="form-control" placeholder="Dia Reserva" value="" required> -->
                                                    <select name="grupo" id="grupo" class="custom-select">
                                                        <option value="">Seleccione Periodo..</option>
                                                        <option>

                                                        </option>
                                                    </select>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name" class="form-control-label">
                                            Nombre Materia(*):
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group">
                                                <button class="btn btn-primary" type="button"></button>
                                                <select name="docmateria_id" id="docmateria_id" class="custom-select" value="" required>
                                                    <option value="">Seleccione Materia..</option>
                                                    <option> </option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">
                                                Grupo(*):
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group">
                                                    <button class="btn btn-primary" type="button" ></button>
                                                        <!-- <input name="grupo_id" type="name" class="form-control" placeholder="Grupo"> -->
                                                    <select name="grupo" id="grupo" class="custom-select" >
                                                        <option value="">Seleccione N° grupo..</option>
                                                    </select>
                                                </span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">
                                                Cantidad de Estudiantes(*):
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group">
                                                    <button class="btn btn-primary" type="button"></button>
                                                    <input name="cantidad" id="cantidad" type="name" class="form-control" placeholder="Cantidad-Estudiantes" value="" required minlength="1" maxlength="3"
                                                    >
                                                </span>
                                                <br>
                                                    <span class="error-danger" for="input-name"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">
                                                        Ambiente(*):
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group">
                                                    <button class="btn btn-primary" type="button"></button>
                                                    {{-- <input name="aula" type="name" class="form-control" placeholder="Aula"> --}}
                                                        <select name="sector" id="sector" class="custom-select" value="" required >
                                                    </span>
                                                                <option value="">Seleccione ambiente..</option>
                                                                    <option>692F</option>
                                                                    <option>622C</option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label">
                                                    Facultad(*):
                                            </label>
                                                <div class="input-group">
                                                    <span class="input-group">
                                                        <button class="btn btn-primary" type="button"></button>
                                                        <!-- <input type="date" id="birthday" name="hora_ini" class="form-control"> -->
                                                        <select name="hora_ini" id="hora_ini" class="form-control" type="date" value=" " required >
                                                            <option value="" >-- Selecciona la Facultad--</option>
                                                                    <option>Fcyt</option>
                                                                    <option>Economia</option>
                                                        </select>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">
                                                    Motivo de Reserva(*):
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group">
                                                    <button class="btn btn-primary" type="button"></button>
                                                    {{-- <input name="motivo" type="text" class="form-control" aria-label="With textarea"> --}}
                                                    <textarea name="motivo" type="text" class="form-control" id=""  placeholder="Motivo" required></textarea>
                                                </span>
                                                <br>

                                                    <span class="error-danger" for="input-name"></span>

                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-md-offset-4 col-md-10 text-center mt-3">
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                            <a href="#" class="btn btn-danger">Salir</a>
                                    </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')

@endsection
