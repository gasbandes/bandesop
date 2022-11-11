@extends('layouts.admin')

@section('title', 'ENTREGA | BENEFICIO')

@section('styles')

<link href="{{ asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Entrega de beneficio</li>
    </ol>
@endsection

@section('content')
@include('sweetalert::alert')
    <div align="center">
        <div class="col-sm-6">
            <form id="main-form" autocomplete="off"><br>
                <input type="hidden" id="_url" value="{{ url('/verificacion/personal') }}">
                <input type="hidden" id="_token" value="{{ csrf_token() }}">

                <div class="col-sm-12" hidden id="datosEmpleado">

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="customer_id">Funcionario Bandes <span class="text-danger">*</span></label>
                               <div class="input-group">
                               <select class="form-control" id="personal">

                               </select>

                            </div>
                         </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12" hidden id="productosRestantes">

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="customer_id">Rubros restantes para el funcionario <span class="text-danger">*</span></label>
                               <div class="input-group">
                               <select multiple name="" id="productoRest" cols="30" rows="10" class="form-control">

                               </select>

                            </div>
                         </div>
                        </div>
                    </div>
                </div>

                @if (session()->has('status'))
                <!-- Secondary Alert -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong> ¡Lo siento! </strong> <span>{{ session('status') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @else
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong> ¡Advertencia! </strong> <span>NO se admiten campos vacíos</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

                <div class="card border-0 shadow-sm mt-3" id ="buscarEmpleado">
                    <div class="card-header">
                        <span class="card-title">
                            Búsqueda de empleados
                        </span>
                        <div class="card-body">
                            <label for="">Cédula del empleado</label>
                            <input type="text" id="nu_cedula" name="nu_cedula" class="form-control" placeholder="Ingrese la cédula del empleado">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary form-control" id="boton">
                                <i class="mdi mdi-account-search text-white" id="ajax-icon"></i> <span class="text-white ">{{ __('Buscar beneficiario') }}</span>
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <div id="productos" hidden  class="row">
             <div class="col-sm-6">
                 <livewire:operativo.products-list />
            </div>
            <div class="col-lg-6 mt-3 container-fluid">
                @php
                    $customers = \Modules\Personal\Entities\Personal::where('empresa_id',\Auth::user()->empresa_id)->get()
                @endphp
                <form action="{{ route('operativo.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="personal" id="personal_id">
                 <livewire:operativo.check-products :cart-instance="'sale'" :customers="$customers"/>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
$(document).ready(function(){

    $('#main-form').submit(function(){

          $('.missing_alert').css('display', 'none');

          var data = $('#main-form').serialize();

          $('#main-form input, #main-form button').attr('disabled','true');
          $('#ajax-icon').removeClass('mdi mdi-account-search').addClass('spinner-border spinner-border-sm');


              $.ajax({
                url: $('#main-form #_url').val(),
                headers: {'X-CSRF-TOKEN': $('#main-form #_token').val()},
                type: 'POST',
                cache: false,
                data: data,
                success: function (response) {
                    var json = $.parseJSON(response);
                    console.log(json.success)
                  if(json.success === true){

                     $('#ajax-icon').removeClass('mdi mdi-account-search').addClass('spinner-border spinner-border-sm');
                     {


                        //console.log(json.personal_id)

                        $.fn.get_empleado(json.personal_id);

                          Swal.fire({

                          title:"¡Bien hecho!",
                          text:"Sus datos han sido vericados satisfactoriamente",
                          icon:"success",
                          confirmButtonColor:"#2f8ee0"
                       })

                        $('#productos').removeAttr('hidden');
                        $('#datosEmpleado').removeAttr('hidden');
                        $('#buscarEmpleado').hide();

                    }
                    $('#main-form input, #main-form button').removeAttr('disabled');
                    $('#ajax-icon').removeClass('spinner-border spinner-border-sm').addClass('mdi mdi-account-search');
                    $('#nu_cedula').val('')
                    }
                    else if(json.success == false)
                    {


                        Swal.fire({

                            title:"¡Uuups!",
                            text:"Sin resultados de la verificacion biométrica del funcionario.",
                            icon:"error",
                            confirmButtonColor:"#2f8ee0"
                        })

                        $('#main-form input, #main-form button').removeAttr('disabled');
                        $('#ajax-icon').removeClass('spinner-border spinner-border-sm').addClass('mdi mdi-account-search');
                   }
                   else if(json.entregado)
                   {
                    Swal.fire({

                        title:"¡Uuups!",
                        text:"Al funcionario se le hizo entrega de todo su beneficio.",
                        icon:"info",
                        confirmButtonColor:"#2f8ee0"
                        })
                        $('#nu_cedula').val('')
                        $('#main-form input, #main-form button').removeAttr('disabled');
                        $('#ajax-icon').removeClass('spinner-border spinner-border-sm').addClass('mdi mdi-account-search');
                   }

                },error: function (data) {
                  var errors = data.responseJSON;
                  $.each( errors.errors, function( key, value ) {
                    toastr.error(value);

                  });

                  $('#main-form input, #main-form button').removeAttr('disabled');
                  $('#ajax-icon').removeClass('spinner-border spinner-border-sm').addClass('mdi mdi-account-search');
              }
             });


         return false;

      });



     $.fn.get_empleado = function(personal_id){

    $.ajax({url: "/personal/"+personal_id+"/datos",
        method: 'GET',
        //data: {'estados_id': estados_id}
        }).then(function(result) {
        console.log(result);




            $(result).each(function( index, element ) {


            $('#personal_id').val(element.id);

            $('#personal').append('<option value="'+ element.id +'">'+ element.tx_nombres + ' ' + element.tx_apellidos +'</option>');

                var personal = $('#personal_id').val();

                $.ajax({url: "/personal/"+personal+"/productos",
                method: 'GET',
                //data: {'estados_id': estados_id}
                }).then(function(result) {
                console.log(result);

                $(result).each(function( index, element ) {

                    $('#productosRestantes').removeAttr('hidden')
                        console.log(element.name)
                        $('#productoRest').append('<option disabled value="'+ element.name +'">'+ element.name +'</option>');
                });

                });

            }).catch(function(err) {
            console.error(err);


            });

            })
       ;


    }



  });
  </script>
  <script>
    $(document).on('click', '#entregaCombo', function () {
        if(!confirm("¿Los datos son correctos?"))
         event.preventDefault();
});
  </script>
@endsection
