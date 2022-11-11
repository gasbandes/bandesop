<!-- Modal -->
<div wire:ignore.self class="modal fade" id="importDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="importDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title">Importación de Empleados al adicional</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form enctype="multipart/form-data" autocomplete="off" method="POST" action="{{ route('personal.importar') }}">
             @csrf
             <div class="modal-body">
                <div class="form-group">
                    <label for="file" class="mt-2">Empleados</label>
                    <input name="file" type="file" class="form-control" id="file" placeholder="file">@error('file') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primaryl" data-bs-dismiss="modal">Save</button>
                </div>
           </form>
        </div>
    </div>
</div>
