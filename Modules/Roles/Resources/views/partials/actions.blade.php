<div class="btn-group">
    <a href="{{ route('roles.edit', $data->id) }}" class="btn btn-sm btn-relief-primary ">
    <i class="mdi mdi-pencil"></i>
    Modificar
</a>
<button id="delete" class="btn btn-sm btn-relief-danger " onclick="
    event.preventDefault();
    if (confirm('¿Estás seguro (a)? Se eliminará permanentemente!')) {
    document.getElementById('destroy{{ $data->id }}').submit();
    }
    ">
    <i class="mdi mdi-delete"></i>
    Borrar
    <form id="destroy{{ $data->id }}" class="d-none" action="{{ route('roles.destroy', $data->id) }}" method="POST">
        @csrf
        @method('delete')
    </form>
</button>
</div>
