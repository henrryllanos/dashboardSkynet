<div class="modal fade bs-example-modal-lg" id="modalEliminarR-{{$ambiente->id}}">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title w-100 text-center" >Eliminar reserva del ambiente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('admin.ambientesR.delete', $ambiente->id)}}" method="POST">
                {{ csrf_field() }}
                @method('DELETE')
                <div class="modal-body w-100 text-center">
                    <a>¿Esta seguro que desea eliminar este ambiente que fue reservada?</a>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</div>
