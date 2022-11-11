<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title">Nueva Gerencia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
			<form>
            <div class="form-group">
                <label for="empresa_id"></label>
                @php
                    $entes = \Modules\Empresa\Entities\Empresa::get()
                @endphp
                <label for="">Ente</label>
                <select  wire:model="empresa_id" id="empresa_id" class="form-control">
                    <option value="">Seleccione el ente</option>
                    @foreach ($entes as $element)
                        <option value="{{ $element->id }}">
                            {{ $element->razon_social }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="descripcion" class="mt-2">Gerencia</label>
                <input wire:model="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion">@error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
