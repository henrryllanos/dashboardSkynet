<?php

use Illuminate\Support\Arr;

    $tipo = ['Regular', 'Electiva'];
    $tipo = array_diff($tipo, array("{$materia->tipo}"));
    $tipo = Arr::prepend($tipo, "{$materia->tipo}");

?>
<div class="modal fade" id="modalEditar-{{$materia->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title w-100 text-center">Editar Materia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('admin.materias.update', $materia->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre Materia</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="{{$materia->nombre}}" required minlength="5" maxlength="45"
                        onkeypress="return blockSpecialChar(event)">
                    </div>

                    <div class="form-group">
                        <label for="carrera">Carrera</label>
                        <select name="carrera" id="carrera" class="form-control">
                            <option value="">-- Selecciona el carrera--</option>
                            <option value="Sistemas" @if(old('carrera') == 'Sistemas') selected @endif>Ing. Sistemas</option>
                            <option value="Informatica" @if(old('carrera') == 'Informatica') selected @endif>Ing. Informatica</option>
                            <option value="Electromecanica" @if(old('carrera') == 'Electromecanica') selected @endif>Electromecanica</option>
                            <option value="Ing Civil" @if(old('carrera') == 'IngCivil') selected @endif>Ing Civil</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tipo">Tipo</label>
                        <select name="tipo" id="tipo" class="form-control" required>

                            @foreach($tipo as $t)
                            <option value="{{$t}}">{{$t}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            @foreach($estado as $es)

                            <option value="{{$es}}">{{$es}}</option>

                            @endforeach
                        </select>
                    </div> --}}
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="refresh">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
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
