@section('title', __('Gerencias'))
@section('styles')
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
@endsection
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div>
                        @if (session()->has('message'))
                              <div wire:poll.4s class="btn btn-sm btn-success"> {{ session('message') }} </div>
                           @endif

                        <div class="row py-2 pb-2 pl-2 pr-2" >
                             <div class="col-sm-6">

                                  <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle form-control " type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Opciones generales <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#importDataModal"  >Importar Excel</a>

                                    </div>
                                </div>

                             </div>
                            <div class="col-sm-6">
                                   <div class="btn btn-success float-end  form-control "  data-bs-toggle="modal" data-bs-target="#createDataModal">
                                      <i class="fa fa-plus"></i> Nueva Gerencia
                                </div>
                            </div>
                        </div>

					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.gerencias.create')
						@include('livewire.gerencias.update')
                        @include('livewire.gerencias.importar')

				<div class="">

                        <table class="table table-bordered table-sm table-responsive" id="tableExport">
                        <thead class="thead">
                            <tr>
                                <td>#</td>
                                <th>Ente</th>
                                <th>Descripcion</th>
                                <td>Opciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gerencias as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->ente->razon_social }}</td>
                                <td>{{ $row->descripcion }}</td>
                                <td width="90">
                                <div class="btn-group">
                                    <a data-bs-toggle="modal" data-bs-target="#updateModal" class="btn btn-sm btn-primary" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i>
                                   </a>
                                    <a class="btn btn-sm btn-danger" onclick="confirm('Confirm Delete Gerencia id {{$row->id}}? \nDeleted Gerencias cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i></a>
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
