<?php

use Illuminate\Support\Arr;

    $estado = ["Habilitado", "Deshabilitado", "Mantenimiento"];
    $estado = array_diff($estado, array("{$ambiente->estado}"));
    $estado = Arr::prepend($estado, "{$ambiente->estado}");
?>
    <div class="modal fade" id="modalEditar-{{$ambiente->id}}">
        <div class="modal-dialog">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title w-100 text-center">Editar Ambiente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('admin.ambientes.update', $ambiente->id) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label for="capacidad">Capacidad</label>
                            <input type="text" name="capacidad" class="form-control" id="capacidad" value="{{$ambiente->capacidad}}" value="{{old('capacidad')}}" required minlength="1" maxlength="3"
                                onkeypress="return blockNoNumber(event)">


                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado" class="form-control" required>
                                @foreach($estado as $estatus)
                                <option value="{{$estatus}}">{{$estatus}}</option>
                                @endforeach
                            </select>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="refresh">Cancelar</button>
                </div>
            </form>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
