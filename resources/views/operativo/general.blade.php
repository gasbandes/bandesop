@extends('layouts.admin')
@section('title','RESULTADO')
@section('page_title', 'Buscar resultados por gerencia')
@section('styles')
  <!-- DataTables -->
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"/>
@endsection
@section('content')
  <div>
   <div class="card">
    <div class="card-header">
      Resultados de las jornadas entregadas en el mes en curso
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12">
                <div class="card crm-widget">
                    <div class="card-body p-0">
                        <div class="row row-cols-xxl-4 row-cols-md-4 row-cols-1 g-0">
                            <div class="col">
                                <div class="py-4 px-3">
                                    <h5 class="text-muted text-uppercase fs-13">Entrega de proteínas<i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <i class="mdi mdi-human-male display-6 text-muted"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h2 class="mb-0"><span class="counter-value" data-target="{{ $operativo_mes_actual_proteinas }}">{{ $operativo_mes_actual_proteinas }}</span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col">
                                <div class="mt-3 mt-md-0 py-4 px-3">
                                    <h5 class="text-muted text-uppercase fs-13">Entrega de Seco <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <i class="mdi mdi-check display-6 text-muted"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h2 class="mb-0"><span class="counter-value" data-target="{{ $operativo_mes_actual_secos }}">{{ $operativo_mes_actual_secos }}</span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col">
                                <div class="mt-3 mt-md-0 py-4 px-3">
                                    <h5 class="text-muted text-uppercase fs-13">Productos de limpieza <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <i class="mdi mdi-store display-6 text-muted"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h2 class="mb-0"><span class="counter-value" data-target="{{ $operativo_mes_actual_limpieza }}">{{ $operativo_mes_actual_limpieza }}</span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col">
                                <div class="mt-3 mt-lg-0 py-4 px-3">
                                    <h5 class="text-muted text-uppercase fs-13">Cartón de Huevos <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <i class="mdi mdi-flash display-6 text-muted"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h2 class="mb-0"><span class="counter-value" data-target="{{ $operativo_mes_actual_huevos }}">{{ $operativo_mes_actual_huevos }}</span></h2>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>
	  <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                        <div class="card-title">
                            <h5>Total entregado para el día de hoy</h5>
                        </div>
                    </div>
                <div class="card-body">

                    <h3 class="text-center">
                        {{ $fecha_actual }}
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                 <div class="card-header">
                        <div class="card-title">
                            <h5>Total entregado para el día de ayer</h5>
                        </div>
                    </div>
                <div class="card-body">
                     <h3 class="text-center">
                        {{ $fecha_anterior }}
                    </h3>
                </div>
            </div>
        </div>
      <div class="col-sm-12 ">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  table-hove table-bordered" id="tableExport" >
                        <thead>
                        <tr class="text-center">
                        <th>TICKET DEL EMPLEADO</th>
                         <th>EMPLEADO</th>
                        <th>CEDULA</th>
                        <th>GERENCIA</th>
                        <th>PRODUCTOS</th>
                        <th>ESTADO DEL EMPLEADO</th>
                        <th>OPERADOR</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($jornadas as $jornada)
                        <tr class="text-center row{{ $jornada->id }}">
                        <td>{{ $jornada->id }}</td>
                        <td>{{ $jornada->personal->tx_nombres.' '.$jornada->personal->tx_apellidos}} </td>
                        <td>{{ $jornada->personal->nu_cedula}}</td>
                        <td>{{ $jornada->gerencia->descripcion }}</td>
                        <td>{{ $jornada->productos->name }}</td>
                        <td>{{ $jornada->user->name }}</td>
                        <td>
                            @if($jornada->personal->status == 1)
                              <span class="badge text-white bg-success">PERSONAL ACTIVO</span>
                             @else
                              <span class="badge text-white bg-warning">PERSONAL JUBILADO</span>
                            @endif
                        </td>
                        </tr>
                        @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
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
