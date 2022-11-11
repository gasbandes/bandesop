@extends('layouts/admin')

@section('title', 'ENTE')
@section('breadcrumb')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home"></i> Home</a></li>
        <li class="breadcrumb-item active">Listado general</li>

    </ol>
@endsection

@section('styles')
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
@endsection
@section('content')
 @include('sweetalert::alert')
<div class="row mt-2 ">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                Datos del Ente
                @can('Registrar Empresa')
                 <a href="{{ route('empresa.create') }}" class="btn btn-primary float-end"><i class="mdi mdi-plus fa-1x"></i> Nuevo ente</a>
                 @endcan
            </div>
            <div class="card-body">

                 <div class="table-responsive">
                     <table  class="table table-hover table-bordered table-sm  " id="tableExport">
                    <thead>
                      <tr class="text-center">

                      <th>Logo</th>
                      <th>Razón social</th>
                      <th>Documento</th>
                      <th>Teléfono</th>
                      <th>Estado de la empresa</th>

                      <th>Opciones</th>
                      </tr>
                    </thead>
                        <tbody>
                          @foreach ($empresa as $element)

                            <tr class="text-center">

                             <td> <img src="{{ asset('images/logo/'.$element->logo_empresa) }}" alt="" height="40"></td>
                             <td>{{ $element->razon_social }}</td>
                             <td>{{ $element->documento }}</td>
                             <td>{{ $element->telefono }}</td>
                             <td>
                                @if ($element->is_active == 1)
                                  <span class="badge bg-primary" >ACTIVO</span>
                                  @else
                                  <span class="badge bg-danger" >INACTIVO</span>
                                 @endif
                            </td>

                            <td>
                                @can('Editar Empresa')
                                <a href="{{ route('empresa.edit',$element->id) }}" class="btn btn-primary round btn-sm"><i class="far fa-edit"></i> Editar</a>
                                @endcan
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
<script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/libs/jszip/jszip.min.js"></script>
<script src="/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('/assets/js/system.js') }}"></script>
@endsection
