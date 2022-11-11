@extends('layouts.admin')

@section('title', 'ROLES')
@section('breadcrumb')
 <h4 class="mb-0 font-size-18">Pantalla de roles</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home"></i> Home</a></li>
        <li class="breadcrumb-item active">Listado general</li>

    </ol>
@endsection
@section('styles')
  <!-- DataTables -->
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"/>
@endsection
@section('content')
@include('sweetalert::alert')
  <div class="">
      <div class="row">
          <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <span>Listado general</span> <a href="{{ route('roles.create') }}" class="btn btn-primary float-end"><i class="mdi mdi-plus fa-1x"></i> Nuevo role</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered table-sm" id="tableExport">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Roles</th>
                                    <th>Permisos</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                   <td>
                                    @foreach($role->getPermissionNames()->take(5) as $permission)
                                     <span class="badge bg-primary">{{ $permission }}</span>
                                    @endforeach
                                     <a class="text-primary" href="{{ route('roles.edit', $role->id) }}">.......</a>
                                   </td>
                                   <td>
                                      <div class="btn-group">
                                       <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-primary ">
                                        <i class="mdi mdi-pencil"></i>
                                            Modificar
                                        </a>
                                        <button id="delete" class="btn btn-sm btn-danger " onclick="
                                            event.preventDefault();
                                            if (confirm('¿Estás seguro (a)? Se eliminará permanentemente!')) {
                                            document.getElementById('destroy{{ $role->id }}').submit();
                                            }
                                            ">
                                            <i class="mdi mdi-delete"></i>
                                            Borrar
                                            <form id="destroy{{ $role->id }}" class="d-none" action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </button>
                                       </div>

                                   </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
      </div>
  </div>


@endsection

@section('scripts')

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('assets/js/system.js') }}"></script>
@endsection
