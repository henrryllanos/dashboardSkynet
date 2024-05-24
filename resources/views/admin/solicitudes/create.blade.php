
@extends('layouts.app')
@section('content')
<?php
    $hora_ini   = ['1' => '6:45', '2' => '8:15'];
?>
<div class="container">
        <div class="my-6">
            <div class="card">
                    <div class="card-header">
                    Nueva Solicitud
                    </div>
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
                <form action="{{route('solicitudes.store')}}" method="POST">
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
                                            Nombre Materia:
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group">
                                            <button class="btn btn-secondary" type="button"></button>
                                                <select name="docmateria_id" id="docmateria_id" class="custom-select" value="{{old('docmateria_id')}}" required>
                                                <option value="">Seleccione Materia..</option>
                                                @foreach ($materiaUnidas as $item)
                                                <option value="{{ $item->id }}" @if(old('docmateria_id') == $item->id) selected @endif>{{ $item->nombre}}--Grupo {{$item->numero}}</option>
                                                @endforeach
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                {{--
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">
                                                Grupo:
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group">
                                                    <button class="btn btn-secondary" type="button" ></button>
                                                    {{-- <input name="grupo_id" type="name" class="form-control" placeholder="Grupo">
                                                    <select name="grupo" id="grupo" class="custom-select" >
                                                        <option selected>Seleccione N° grupo..</option>
                                                        @foreach ($grupoUnidas as $item)
                                                            <option value="{{ $item->id }}">{{ $item->numero}}</option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    --}}

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label">
                                                    Horario ini:
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group">
                                                    <button class="btn btn-secondary" type="button"></button>
                                                    {{-- <input type="date" id="birthday" name="hora_ini" class="form-control"> --}}
                                                    <select class="form-select @error('hora_ini') is-invalid @enderror" type="date" id="hora_ini" name="hora_ini" multiple value="{{old('hora_ini')}} " required>
                                                    </span>
                                                        <option value="" >-- Selecciona la hora para la solicitud--</option>
                                                            @foreach(range(06, 23) as $hora)
                                                                <option value="{{ $hora }}:45">{{ $hora }}:45</option>
                                                            @endforeach
                                                    </select>
                                                    @error('hora_ini')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label">
                                                        Ubicacion del ambiente:
                                                </label>
                                                    <div class="input-group">
                                                <span class="input-group">
                                                    <button class="btn btn-secondary" type="button"></button>
                                                    {{-- <input name="ambiente" type="name" class="form-control" placeholder="Ambiente"> --}}
                                                    <select name="ubicacion" id="ubicacion" class="custom-select" value="{{old('ubicacion')}}" required >
                                                    </span>
                                                        <option value="">Seleccione sector..</option>
                                                        @foreach ($ubicaciones as $item)
                                                            <option value="{{ $item->id }}" @if(old('ubicacion') == $item->id) selected @endif>{{ $item->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label">
                                                    Horario Fin:
                                            </label>
                                                <div class="input-group">
                                                    <span class="input-group">
                                                    <button class="btn btn-secondary" type="button"></button>
                                                    {{-- <input type="date" id="birthday" name="hora_ini" type="date" class="form-control"> --}}
                                                    <select class="form-select @error('hora_fin') is-invalid @enderror" id="hora_fin" name="hora_fin">
                                                    </span>
                                                        <option value="" >-- Selecciona la hora para la solicitud--</option>
                                                                @foreach(range(06, 23) as $hora)
                                                                    <option value="{{ $hora }}:15">{{ $hora }}:15</option>
                                                                @endforeach
                                                            </select>
                                                            @error('hora_fin')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </select>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label">
                                                        Numero de Aula:
                                                </label>
                                                    <div class="input-group">
                                                <span class="input-group">
                                                    <button class="btn btn-secondary" type="button"></button>
                                                    {{-- <input name="ambiente" type="name" class="form-control" placeholder="Ambiente"> --}}
                                                    <select name="ambiente" id="ambiente" class="custom-select" value="{{old('ambiente')}}" required >
                                                        <option value="{{old('ambiente')}}" selected  >Seleccione N° Aula... {{old('ambiente')}}</option>
                                                    {{--  @foreach ($ambientes as $item)
                                                            <option value="{{ $item->id }}">{{ $item->num_ambiente}}</option>
                                                        @endforeach--}}
                                                    </select>
                                                </span>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label">
                                                    Dia Reserva:
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group">
                                                    <button class="btn btn-secondary" type="button"></button>
                                                    <input name="dia" type="date" id="fechaReserva" class="form-control" placeholder="Dia Reserva" value="{{old('dia')}}" required>
                                                    </span>
                                                    <br>
                                                    @if($errors -> has('dia'))
                                                        <span class="error-danger" for="input-name">{{$errors->first('dia')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                    </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label">
                                                    Motivo:
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group">
                                                    <button class="btn btn-secondary" type="button"></button>
                                                    {{-- <input name="motivo" type="text" class="form-control" aria-label="With textarea"> --}}
                                                    <textarea name="motivo" type="text" class="form-control" id=""  placeholder="Motivo" required>{{old('motivo')}}</textarea>
                                                    </span>
                                                    <br>
                                                    @if ($errors->has('motivo'))
                                                        <span class="error text-danger" for="input-motivo" style="font-size: 15px">{{ $errors->first('motivo') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label">
                                                    Cantidad Estudiantes:
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group">
                                                        <button class="btn btn-secondary" type="button"></button>
                                                        <input name="cantidad" id="cantidad" type="name" class="form-control" placeholder="Cantidad-Estudiantes" value="{{old('cantidad')}}" required minlength="1" maxlength="3"
                                                        onkeypress="return blockNoNumber(event)">
                                                    </span>
                                                    <br>
                                                        @if($errors -> has('cantidad'))
                                                            <span class="error-danger" for="input-name">{{$errors->first('cantidad')}}</span>
                                                        @endif
                                                </div>
                                            </div>
                                        </div>

                                            <div class="col-md-offset-4 col-md-10 text-center mt-3">
                                                <button type="submit" class="btn btn-primary">enviar</button>
                                                <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancelar</a>
                                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
<script >
    $(document).ready(function(){
        $('#docmateria_id').on('change', function(){
            var docmateria_id = $(this).val();
            if($.trim(docmateria_id) != ''){
                $.get('/cantidades', {docmateria_id: docmateria_id}, function(cantidades){
                    $('#cantidad').empty();
                        $('#cantidad').attr("value", cantidades.inscritos);
                        $('#cantidad').empty();
                });
            }
        })
    })

    $(document).ready(function(){
        $('#ubicacion').on('change', function(){
            var ubicacion_id = $(this).val();
            if($.trim(ubicacion_id) != ''){

                $.get('/ubicacionesambientes', {ubicacion_id: ubicacion_id}, function(ambientes){

                  //  alert(ambientes);
                    if( ambientes.length == 1){
                    $('#ambiente').empty();
                        $('#ambiente').append("<option value='' disabled >No hay ambientes disponibles</option>");
                        console.log('hola2');
                        console.log(ambientes);

                    }else{
                        $('#ambiente').empty();
                        $('#ambiente').append("<option value='{{old('ambiente')}}' >Selecciona un ambiente</option>");
                        $.each(ambientes, function(index, value){
                        $('#ambiente').append("<option value='"+ index +"' >"+ value + "</option>")
                        })
                        console.log('hola1');
                    }
                });
            }
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('#hora_ini').select2({
            placeholder: 'Selecciona hasta 4 horas de inicio',
            allowClear: true,
            maximumSelectionLength: 4
        });

        $('#hora_fin').select2({
            placeholder: 'Selecciona una hora de fin',
            allowClear: true
        });
    });
</script>
@endsection
