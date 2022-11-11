@foreach($data->getPermissionNames() as $permission)
    <span class="badge bg-primary">{{ $permission }}</span>
@endforeach
<a class="text-primary" href="{{ route('roles.edit', $data->id) }}">.......</a>
