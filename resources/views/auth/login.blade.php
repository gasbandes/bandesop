@extends('layouts.app')
@section('title', 'LOGIN')
@section('content')
    <div class="auth-wrapper auth-v3 ">
        <div class="auth-content">
        <div class="card">
            <div class="row align-items-stretch ">
            <div class="col-md-6 img-card-side">
                <img src="{{ asset('/images/fondo/auth-img.jpg') }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <div>
                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                     <div>
                      <h5 class="text-primary">¡Bienvenidos!</h5>
                      <p class="text-muted">Ingresa tu usuario y contraseña para continuar.</p>
                   </div>
                    @include('sweetalert::alert')
                   <form id="main-form" autocomplete="off"><br>
                          <input type="hidden" id="_url" value="{{ url('login') }}">
                          <input type="hidden" id="_redirect" value="{{ url('/home') }}">
                          <input type="hidden" id="_token" value="{{ csrf_token() }}">
                        @csrf
                         <label for="username" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese su usuario" aria-describedby="username" tabindex="1" autofocus value="{{ old('cedula') }}" />

                            <div class=" mt-2">
                                <label for="password-input">Contraseña</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa la contraseña" aria-describedby="password" tabindex="1" autofocus value="{{ old('password') }}" />
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="row">
                                    <div class="d-grid gap-2">
                                    <button class="btn btn-primary w-lg waves-effect waves-light"  type="submit">Ingresar</button>
                                    </div>
                                </div>
                            </div>
                               <div class="mb-5">
                                  <x-calendario />
                               </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('scripts')
  <script>

$(document).ready(function(){

  $('#main-form').submit(function(){

        $('.missing_alert').css('display', 'none');

        var data = $('#main-form').serialize();

        $('#main-form input, #main-form button').attr('disabled','true');
        $('#ajax-icon').removeClass('fas fa-sign-in-alt').addClass('fas fa-spinner fa-pulse');

            $.ajax({
              url: $('#main-form #_url').val(),
                  headers: {'X-CSRF-TOKEN': $('#main-form #_token').val()},
                  type: 'POST',
              cache: false,
                data: data,
              success: function (response) {
                //alert(response)
                 if(response === 'authenticated.true'){

                   $('#ajax-icon').removeClass('fa fa-spin fa-refresh').addClass('fa fa-sign-in');
                   Swal.fire(
                    {
                        title:"¡Bien hecho!",
                        text:'Usuario logueado',
                        type:"success"
                    })
                   $(location).attr('href', $('#main-form #_redirect').val());
                  }
              },error: function (data) {
                var errors = data.responseJSON;
                $.each( errors.errors, function( key, value ) {
                  Swal.fire(
                    {
                        title:"¡Error!",
                        text:value,
                        type:"error"
                    })
                  return false;
                });

                $('#main-form input, #main-form button').removeAttr('disabled');
                $('#ajax-icon').removeClass('fas fa-spinner fa-pulse').addClass('fas fa-sign-in-alt');
            }
           });


       return false;

    });
});
</script>
@endsection
