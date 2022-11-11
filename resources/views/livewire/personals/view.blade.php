@section('title', __('PERSONAL'))
@section('styles')
<!-- Plugin Css -->
<link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

@endsection
<div>
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div>
                       <div class="row">
                           <div class="col-sm-12">
                             @if (session()->has('message'))
                           <div wire:poll.4s class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close">
                                </button>
                                <strong>¡Bien hecho!</strong> {{ session('message') }}
                            </div>
                            @endif
                       </div>
                       </div>

                        <div class="row py-2 pb-2 pl-2 pr-2" >
                           <div class="col-sm-4">
                                   <div class="btn btn-success float-end mt-2  form-control "  data-bs-toggle="modal" data-bs-target="#importDataModal">
                                      <i class="fa fa-upload"></i> Importar Excel
                                </div>
                            </div>
                            <div class="col-sm-4">
                                   <div class="btn btn-success float-end mt-2  form-control "  data-bs-toggle="modal" data-bs-target="#createDataModal">
                                      <i class="fa fa-plus"></i> Nuevo Personal
                                </div>
                            </div>
                            <div class="col-sm-4">
                                   <div class="btn btn-info float-end mt-2  form-control" wire:click="reversar()" >
                                      <i class="mdi mdi-refresh"></i> Reversar
                                </div>
                            </div>
                        </div>

                    </div>
				</div>

				<div class="card-body">
                        @include('livewire.personals.importar')
						@include('livewire.personals.create')
						@include('livewire.personals.update')
				<div class="">
					<table class="table  table-responsive table-bordered table-sm " id="tableExport">
						<thead class="thead">
							<tr class="text-center">
								<td>#</td>
								<th>Nombres</th>
                                <th>Apellidos</th>
								<th>Cédula</th>
								<th>Gerencia</th>
								<th>Estado del empleado</th>
                                <th>Tipo de empleado</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($personals as $row)
							<tr class="text-center">
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->tx_nombres }}</td>
                                <td>{{ $row->tx_apellidos }}</td>
								<td>{{ $row->nu_cedula }}</td>
								<td>{{ $row->gerencia->descripcion }}</td>
								<td>

                                    @if ($row->status == 1)
                                      <span class="badge green text-white"> ACTIVO</span>
                                    @elseif ($row->status == 2)
                                      <span class="badge blue  darken-4 text-white"> JUBILADO</span>
                                    @elseif ($row->status == 3)
                                      <span class="badge red  darken-4 text-white"> SUSPENDIDO</span>
                                     @elseif($row->status == 4)
                                      <span class="badge orange  darken-4 text-white"> EGRESADO</span>
                                      @elseif($row->status == 5)
                                      <span class="badge yellow  darken-1 text-white"> Permiso</span>
                                      @else
                                          <span class="badge purple  darken-4 text-white"> Comision de servicio</span>

                                    @endif

                                 </td>
                                 <td>
                                     @if ($row->tipo_empleado == 1)
                                         <span class="badge bg-success text-uppercase">
                                             TRADICIONAL
                                         </span>
                                      @else
                                          <span class="badge bg-info text-uppercase">
                                             ADICIONAL
                                         </span>
                                     @endif
                                 </td>
								<td width="200">
								 <div class="btn-group">
                                    <a data-bs-toggle="modal" data-bs-target="#updateModal" class="btn btn-sm btn-primary" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i>
                                        Editar
                                   </a>
                                    <a class="btn btn-sm btn-danger" onclick="confirm('Confirm Delete Gerencia id {{$row->id}}? \nDeleted Gerencias cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i>
                                    Eliminar</a>
                                </div>
								</td>
							@endforeach
						</tbody>
					</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@section('scripts')
  <script src="assets/libs/select2/js/select2.min.js"></script>
  <script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
  <script src="assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

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
