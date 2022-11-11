<!-- Modal -->
<div class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
           <div class="modal-header">
                <h5 class="modal-title">Nuevo registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('personal.store') }}" method="POST">
                @csrf
           <div class="modal-body">

                 <div class="row">
                     <div class="col-sm-6 mt-2">
                          <div class="form-group">
                            <label for="tx_nombres">Nombres del empleado</label>
                             <input name="tx_nombres" type="text" class="form-control" id="tx_nombres" placeholder="Nombres del empleado">@error('tx_nombres') <span class="error text-danger">{{ $message }}</span> @enderror
                         </div>
                     </div>
                     <div class="col-sm-6 mt-2">
                          <div class="form-group">
                            <label for="tx_apellidos">Apellidos del empleado</label>
                             <input name="tx_apellidos" type="text" class="form-control" id="tx_apellidos" placeholder="Apellidos del empleado">@error('tx_apellidos') <span class="error text-danger">{{ $message }}</span> @enderror
                         </div>
                     </div>
                    <div class="col-sm-6 mt-2">
                          <div class="form-group">
                            <label for="nu_cedula">Cédula del empleado</label>
                             <input name="nu_cedula" type="text" class="form-control" id="nu_cedula" placeholder="Cédula del empleado">@error('nu_cedula') <span class="error text-danger">{{ $message }}</span> @enderror
                         </div>
                     </div>
                     @php
                         $gerencias = \App\Models\Gerencia::get();
                     @endphp
                     <div class="col-sm-6 mt-2">
                          <div class="form-group">
                            <label for="gerencia_id">Gerencia del empleado</label>
                             <select name="gerencia_id" class="form-control select2">
                                 <option value="">Seleccione</option>
                                 @foreach ($gerencias as $element)
                                     <option value="{{ $element->id }}">{{ $element->descripcion }}</option>
                                 @endforeach
                             </select>

                        </div>
                     </div>
                      <div class="col-sm-12 mt-2">
                          <div class="form-group">
                            <label for="tipo_empleado">Tipo de empleado</label>
                             <select name="tipo_empleado" id="" class="form-control">
                                 <option value="">Seleccione</option>
                                 <option value="1">General</option>
                                 <option value="2">Beneficio especial</option>

                             </select>
                             @error('tipo_empleado') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                     </div>
                     <div class="col-sm-12 mt-2">
                          <div class="form-group">
                            <label for="status">Estado del empleado</label>
                             <select name="status" id="" class="form-control">
                                 <option value="">Seleccione</option>
                                 <option value="1">Activo</option>
                                 <option value="2">Jubilado</option>
                                 <option value="3">Suspendido</option>
                                 <option value="4">Egresado</option>
                                 <option value="5">Permiso</option>
                                 <option value="6">Comisión de servicio</option>
                             </select>
                             @error('status')  <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                     </div>
                 </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary close-modal">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>
