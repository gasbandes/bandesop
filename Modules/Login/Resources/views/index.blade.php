@extends('layouts.admin')
@section('title','LOGINS')
@section('breadcrumb')

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
<div class="row mt-2 animate__animated_fadeIn animate__fadeIn animate__delay-1s container-fluid">
     <div class="col-md-12">
    <div class="card card-line-primary">
      <div class="card-header">
        <h3>Listado de inicio de sesión</h3>

      </div>
       <!-- /.card-header -->
          <div class="card-body table-responsive">
             <br>
          <table id="tableExport" class="table table-hover table-bordered table-sm">
              <thead>
              <tr>
              <th>#</th>
               <th>Usuario</th>
              <th>Inicio</th>
              <th>Cierre</th>
              <th>IP</th>
              <th>Cliente</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($logins as $login)
              <tr class="row{{ $login->id }}">
              <td>{{ $login->id }}</td>
              <td>{{ $login->user->name }}</td>
              <td>{{ $login->login_at  }}</td>
              <td>{{ $login->logout_at }}</td>
              <td>{{ $login->ip_address }}</td>
              <td>  <a href="#"  data-bs-toggle="modal"
                                 data-bs-target=".bs-example-modal-center{{ $login->id }}">
                        <div class="button-items" id="tooltip-container">
                             <span data-bs-container="#tooltip-container"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="top"
                                   title="{{ $login->user_agent }}" >
                               {{ Str::limit($login->user_agent, 50) }}
                             </span>
                        </div>
                  </td>
              </tr>
              @endforeach
              </tbody>

          </table>
          </div>
          <!-- /.card-body -->
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
