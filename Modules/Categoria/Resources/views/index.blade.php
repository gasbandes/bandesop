@extends('layouts.admin')
@section('title','CATEGORIA')
@section('styles')
  <!-- vendor css files -->
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />


@endsection
@section('breadcrumb')
 <h4 class="mb-0 font-size-18">Categorías de medicinas registradas</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home"><i class="mdi mdi-home"></i> Home</a></li>
        <li class="breadcrumb-item active">Listado general</li>

    </ol>
@endsection
@section('content')
@include('sweetalert::alert')
<div class="container fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    Lista de categorías para el registro las medicinas.
                   <button type="button"
                    class="btn btn-primary waves-effect waves-light float-end"
                    data-bs-toggle="modal"
                    data-bs-target=".bs-example-modal-center"><i class="mdi mdi-plus"></i>  Nueva categoría
                    </button>

                </div>
                <div class="card-body">
                        <div class="table-responsive">
                             <table  class="table table-hover table-bordered table-sm " id="tableExport">
                            <thead>
                              <tr class="text-center">
                              <th>#</th>
                              <th>Código</th>
                              <th>Categoría</th>
                              <th>Estado</th>
                              <th>Opciones</th>
                              </tr>
                            </thead>
                               <tbody>
                                @foreach ($categorias as $element)
                                <tr class="text-center">
                                    <td>{{ $element->id }}</td>
                                    <td>{{ $element->nu_codigo }}</td>
                                    <td>{{ $element->nb_nombre }}</td>
                                    <td>
                                        @if ($element->status == 1)
                                            <span class="badge bg-primary">Activo</span>
                                        @else
                                            <span class="badge bg-danger">Inactivo</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button"
                                                class="btn btn-primary waves-effect waves-light"
                                                data-bs-toggle="modal"
                                                data-bs-target=".bs-example-modal-center{{ $element->id }}">Editar
                                                </button>
                                    </td>
                                </tr>
                                @include('categoria::partials.modal.index')
                                @endforeach
                          </tbody>
                      </table>
                    </div>
                    @include('categoria::partials.modal.create')
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')

<script>

    $(document).ready(function (){

        //Define la cantidad de numeros aleatorios.
    var cantidadNumeros = 6;
    var myArray = []
    while(myArray.length < cantidadNumeros ){
      var numeroAleatorio = Math.ceil(Math.random()*cantidadNumeros);
      var existe = false;
      for(var i=0;i<myArray.length;i++){
        if(myArray [i] == numeroAleatorio){
            existe = true;
            break;
        }
      }
      if(!existe){
        myArray[myArray.length] = numeroAleatorio;
      }
    }
    $('#txtCodigo').val('00' +'-'+myArray.join("") );
      });
    </script>
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


<!-- Calendar init -->
<script src='/assets/js/moment.js'></script>
<script src="/assets/js/fullcalendar.js"></script>
<script src="{{ asset('/assets/js/system.js') }}"></script>
@endsection
