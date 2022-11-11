<div class="modal fade bs-example-modal-center{{ $element->id }}" tabindex="-1" role="dialog"
aria-labelledby="mySmallModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title mt-0">Modificar categoría.</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close">
            </button>
        </div>
        <form id="expense-form" action="{{ route('categoria.update',$element->id) }}" method="POST" autocomplete="off">
                @csrf
                @method('patch')
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label for="">Categoría</label>
                        {!! Form::text('nb_nombre', $element->nb_nombre, ['class'=>'form-control']) !!}
                    </div>
                    @php
                        $estado = ['0' => 'Inactivo', '1' => 'Activo'];
                    @endphp
                    <div class="col-sm-12 mt-2">
                        <label for="">Estado de la categoría</label>
                        {!! Form::select('status', $estado, null, ['class' =>'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar registro </button>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
