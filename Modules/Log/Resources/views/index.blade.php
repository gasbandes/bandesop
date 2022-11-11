@extends('layouts.admin')
@section('title','LOGS')
@section('breadcrumb')
 <h4 class="mb-0 font-size-18">Registro de logs del sistema</h4>
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
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                Listado general de logs

            </div>
            @php
                $logs = \Modules\Log\Entities\Log::get();


            @endphp
            <div class="card-body">
                 <div class="table-responsive">
                     <table  class="table table-hover table-bordered table-sm  " id="tableExport">
                    <thead>
                      <tr class="text-center">
                      <th>#</th>
                      <th>Usuario</th>
                      <th>Descripción</th>
                      <th>Fecha y hora</th>

                      </tr>
                    </thead>
                        <tbody>
                            @foreach ($logs as $element)
                            @php
                                $user = \App\Models\User::find($element->user_id)
                            @endphp
                         <tr class="text-center">
                            <td>{{ $element->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <a href="#"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-center{{ $element->id }}">
                                <div class="button-items" id="tooltip-container">
                                     <span data-bs-container="#tooltip-container"
                                           data-bs-toggle="tooltip"
                                           data-bs-placement="top"
                                           title="{{ $element->descripcion }}" >
                                       {{ Str::limit($element->descripcion, 50) }}
                                     </span>
                                </div>
                              </a>
                           </td>
                            <td>{{ $element->created_at }}</td>


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

