<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Edición de producto</h5>
                <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
            <div class="form-group mt-2">
                <label for="codigo">Código del producto</label>
                <input wire:model="codigo" type="text" class="form-control" id="codigo" placeholder="Codigo">@error('codigo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group mt-2">
                <label for="name">Nombre del producto</label>
                <input wire:model="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad disponible</label>
                <input wire:model="cantidad" type="text" class="form-control" id="cantidad" placeholder="Cantidad">@error('cantidad') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>


            <div class="form-group">
                <label for="cantidad">Estado del producto</label>
                <select wire:model="status"  id="" class="form-control">
                    <option value="">Seleccione</option>
                    <option value="1">ACTIVO</option>
                    <option value="0">INACTIVO</option>
                </select>

                @error('status') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>



                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary close-modal" data-bs-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
