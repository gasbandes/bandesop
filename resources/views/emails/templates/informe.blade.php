<html>
<head>

        <meta charset="utf-8" />
        <title>Dashboard | Agroxa - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset="utf-8">
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">
        <!-- Bootstrap Css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="/css/system.css" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="/assets/css/animate.css">

    </head>
<body>
    <div class="row">
        <div class="col-sm-12">
             <!-- <img src="{{ asset('images/logo/logo_verde.png') }}" alt="" height="40">
             <img src="{{ asset('/images/logo/Logo FAS-01.png') }}" alt="" height="70" width="200" id="faslogo"> -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                <span class="text-rose" id="servicio"><b>SERVICIO MÉDICO</b></span>
            </div>
            <div class="col-sm-12">
                <span class="text-rose" id="gerencia"><b>Gerencia Ejecutiva de Gestión del talento humano</b></span>
            </div>

             <div class="col-sm-12">
                <span class="text-rose" id="paciente"><b>Nombre del paciente:</b>

                 @if($consulta->paciente->beneficiario_id <> null)
                     {{ $consulta->paciente->beneficiario->tx_nombres. ' '. $consulta->paciente->beneficiario->tx_apellidos }}
                 @else
                     {{ $consulta->paciente->titular->tx_nombres }}
                 @endif

                </span>
            </div>
            <div class="col-sm-12">
                <table class="table table-hover table-bordered table-sm mt-5">
                <thead>
                 <tr class="text-center">
                   <th id="informe"><span>INFORME MÉDICO</span></th>
                 </tr>
                  </thead>
              </table>
              <div id="texto">
                  <h5>Fecha de consulta</h5>
              </div>

            </div>
        </div>

    </div>

    <style>
        #faslogo
        {

           position: relative;
           top: -50px;
           width: 150px;
           margin-left : 35em;


        }
        #servicio  {
             position: relative;
             top: -25px;
             font-family: Arial;
             font-size:  15px;
             margin-left : 35em;

        }
         #gerencia  {
             position: relative;
             top: -15px;
             font-family: Arial;
             font-size:  15px;
             margin-left : 35em;

        }
        #informe{
              background-color: rgba(0, 0, 0, .20);
              border-style:solid;


        }
        #texto{

             background-color: rgba(0, 0, 0, .5);
              height: 1em;
              width: 250px;
              position: absolute;
              top: 35px;
              color: #fff;
              text-align: center;
              padding-top: 10em;
        }

    </style>
</body>
</html>
