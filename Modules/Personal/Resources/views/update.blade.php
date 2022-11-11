<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal{{ $row->id }}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
           <div class="modal-header">
                <h5 class="modal-title">Edición de registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            < {!!Form::model($row,['method'=>'PUT','route'=>['personal.update',$row->id], 'files'=>'true'])!!}

           <div class="modal-body">

                 <div class="row">
                     <div class="col-sm-6 mt-2">
                          <div class="form-group">
                            <label for="tx_nombres">Nombres del empleado</label>
                             <input name="tx_nombres" type="text" class="form-control" value="{{ $row->tx_nombres }}" id="tx_nombres" placeholder="Nombres del empleado">@error('tx_nombres') <span class="error text-danger">{{ $message }}</span> @enderror
                         </div>
                     </div>
                     <div class="col-sm-6 mt-2">
                          <div class="form-group">
                            <label for="tx_apellidos">Apellidos del empleado</label>
                             <input name="tx_apellidos" type="text" class="form-control"  value="{{ $row->tx_apellidos }}"id="tx_apellidos" placeholder="Apellidos del empleado">@error('tx_apellidos') <span class="error text-danger">{{ $message }}</span> @enderror
                         </div>
                     </div>
                    <div class="col-sm-6 mt-2">
                          <div class="form-group">
                            <label for="nu_cedula">Cédula del empleado</label>
                             <input name="nu_cedula" type="text" class="form-control"  value="{{ $row->nu_cedula }}"id="nu_cedula" placeholder="Cédula del empleado">@error('nu_cedula') <span class="error text-danger">{{ $message }}</span> @enderror
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
                                     <option value="{{ $element->id }}" {{ $row->gerencia_id == $element->id ? 'selected' : '' }}>{{ $element->descripcion }}</option>
                                 @endforeach
                             </select>

                        </div>
                     </div>
                      <div class="col-sm-12 mt-2">
                          <div class="form-group">
                            <label for="tipo_empleado">Tipo de empleado</label>
                             <select name="tipo_empleado" id="" class="form-control">
                                 <option value="">Seleccione</option>
                                 <option value="1" {{ $row->tipo_empleado == 1 ? 'selected' : '' }}>General</option>
                                 <option value="2" {{ $row->tipo_empleado == 2 ? 'selected' : '' }} >Beneficio especial</option>

                             </select>
                             @error('tipo_empleado') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                     </div>
                     <div class="col-sm-12 mt-2">
                          <div class="form-group">
                            <label for="status">Estado del empleado</label>
                             <select name="status" id="" class="form-control">
                                 <option value="">Seleccione</option>
                                 <option value="1" {{ $row->status == 1 ? 'selected' : '' }}>Activo</option>
                                 <option value="2" {{ $row->status == 2 ? 'selected' : '' }}>Jubilado</option>
                                 <option value="3" {{ $row->status == 3 ? 'selected' : '' }}>Suspendido</option>
                                 <option value="4" {{ $row->status == 4 ? 'selected' : '' }}>Egresado</option>
                                 <option value="5" {{ $row->status == 5 ? 'selected' : '' }}>Permiso</option>
                                 <option value="6" {{ $row->status == 6 ? 'selected' : '' }}>Comisión de servicio</option>
                             </select>
                             @error('status')  <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                     </div>
                 </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary close-modal" data-bs-dismiss="modal">Save</button>
            </div>
          </form>
        </div>
    </div>
</div>
