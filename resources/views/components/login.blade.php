<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ env('APP_NAME') }} - {{ $title ?? '' }}</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="robots" content="noindex, nofollow">
   <link rel="shortcut icon" href="{{ asset('assets/images/logo-bandes-mini-green.png') }}">
  <!-- General CSS Files -->
  
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/system.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    
    @stack('styles')
</head>
<body >
        
 @yield('content')

<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/js/clock.js')}} "></script>
<script>
  $('#login-username').on('keydown keypress',function(e){
  if(e.key.length === 1){ // Evaluar si es un solo caracter
      if($(this).val().length < 8 && !isNaN(parseFloat(e.key))){ /* Comprobar que
                                                                  * son menos de 12
                                                                  * catacteres y que
                                                                  * es un número */
          $(this).val($(this).val() + e.key); // Muestra el valor en el input
          /*
          * Aquí haces lo que quieras.
          */
      }
      return false;
    }
  });
</script>      
</body>
</html>
