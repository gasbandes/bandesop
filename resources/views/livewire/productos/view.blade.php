@section('title', __('Productos'))
<div>
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
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
						<div class="col-md-6">
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Producto">
						</div>
                        <div class="col-md-6">
						<div class="btn  btn-primary float-end" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Nuevo producto
						</div>
                    </div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.productos.create')
						@include('livewire.productos.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr class="text-center">
								<td>#</td>
								<th>Codigo</th>
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Estado del producto</th>
								<td></td>
							</tr>
						</thead>
						<tbody>
							@foreach($productos as $row)
							<tr class="text-center">
								<td>{{ $row->id }}</td>
								<td>{{ $row->codigo }}</td>
								<td>{{ $row->name }}</td>
								<td>{{ $row->cantidad }}</td>
								<td>
                                    @if ($row->status == 1)
                                        <span class="badge bg-primary">ACTIVO</span>
                                    @else
                                         <span class="badge bg-danger">INACTIVO</span>
                                   @endif
                                </td>
								<td width="230">
								<div class="btn-group">
									<a data-bs-toggle="modal" data-bs-target="#updateModal" class="btn  bnt-sm btn-primary" wire:click="edit({{$row->id}})"><i class="mdi mdi-pencil"></i>  </a>
									<a class="btn bnt-sm  btn-danger" onclick="confirm('Confirm Delete Producto id {{$row->id}}? \nDeleted Productos cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="mdi mdi-delete"></i>
                                    </a>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>
					{{ $productos->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
