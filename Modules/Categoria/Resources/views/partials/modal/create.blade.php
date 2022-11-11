<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
aria-labelledby="mySmallModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title mt-0">Registro de nueva categoría.</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close">
            </button>
        </div>
        <form id="expense-form" action="{{ route('categoria.store') }}" method="POST" autocomplete="off">
                @csrf

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label for="">Código de categoría</label>
                        {!! Form::text('nu_codigo',null, ['class'=>'form-control','placeholder' =>'Código de categoría','id'=>'txtCodigo']) !!}
                    </div>
                    <div class="col-sm-12 mt-2">
                        <label for="">Categoría</label>
                        {!! Form::text('nb_nombre',null, ['class'=>'form-control','placeholder' =>'Nombre de categoría']) !!}
                    </div>
                    @php
                        $estado = ['1' => 'Activo', '0' => 'Inactivo'];
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
