@extends('layouts/admin')

@section('title', 'USUARIOS')

@section('breadcrumb')
 <h4 class="mb-0 font-size-18">Pantalla de usuarios</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home"></i> Home</a></li>

    </ol>
@endsection
@section('styles')
  <!-- DataTables -->
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"/>
@endsection
@section('content')
 @include('sweetalert::alert')
 <div class="row mt-2">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                Datos de los usuarios
                  <a href="{{ route('usuarios.create') }}" class="btn btn-primary float-end"><i class="mdi mdi-plus fa-1x"></i> Nuevo usuario</a>
            </div>

            <div class="card-body">
                 <div class="table-responsive">
                     <table  class="table table-hover table-bordered table-sm  " id="tableExport">
                    <thead>
                      <tr class="text-center">
                      <th>#</th>
                      <th>Nombre completo</th>
                      <th>Correo electrónico</th>
                      <th>Estado del usuario</th>
                      <th>Role</th>
                      <th>Usuario</th>
                      <th>Opciones</th>
                      </tr>
                    </thead>
                        <tbody>
                          @foreach ($usuarios as $element)

                            <tr class="text-center">
                            <td>{{ $element->id }}</td>
                             <td>{{ $element->name .' '.$element->lastname }}</td>
                             <td>{{ $element->email }}</td>
                             <td>
                                 @if ($element->status == 1)
                                    <span class="badge bg-primary">ACTIVO</span>
                                 @else
                                    <span class="badge bg-danger">INACTIVO</span>
                                 @endif
                             </td>
                             <td>
                                 {{ $element->role->name }}
                             </td>
                              <td>
                                {{ $element->username }}
                             </td>

                            <td>
                               <div class="btn-group">
                                       <a href="{{ route('usuarios.edit', $element->id) }}" class="btn btn-sm btn-primary ">
                                        <i class="mdi mdi-pencil"></i>
                                            Modificar
                                        </a>
                                        <button id="delete" class="btn btn-sm btn-danger " onclick="
                                            event.preventDefault();
                                            if (confirm('¿Estás seguro (a)? Se eliminará permanentemente!')) {
                                            document.getElementById('destroy{{ $element->id }}').submit();
                                            }
                                            ">
                                            <i class="mdi mdi-delete"></i>
                                            Borrar
                                            <form id="destroy{{ $element->id }}" class="d-none" action="{{ route('usuarios.destroy', $element->id) }}" method="POST">
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

