@extends('layouts.admin')
@section('title', 'RESULTADO')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <span class="title text-center">
                    Gráficos de entregas en el año {{ date('Y') }}
                </span>
                <div class="card-body">
                    <canvas id="myChart" ></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    /*
       * Se obtiene el elemento canvas por el id
       * @Author Theizer Gabriel Gonzalez
       * Fecha: 5/05/2022
       * Ext: 8394
     */
       employee_chart = document.getElementById('myChart').getContext('2d');
       chart = new Chart(employee_chart,{
         type: 'bar',
           data:{
               labels:[

                   'Enero',
                   'Febrero',
                   'Marzo',
                   'Abril',
                   'Mayo',
                   'Junio',
                   'Julio',
                   'Agosto',
                   'Septiembre',
                   'Octubre',
                   'Noviembre',
                   'Diciembre'
                   ],
               datasets:[
               {
               label:'Jornadas de alimentos realizados en el año',
                   data:[
                       '{{$entrega_1}}',
                       '{{$entrega_2}}',
                       '{{$entrega_3}}',
                       '{{$entrega_4}}',
                       '{{$entrega_5}}',
                       '{{$entrega_6}}',
                       '{{$entrega_7}}',
                       '{{$entrega_8}}',
                       '{{$entrega_9}}',
                       '{{$entrega_10}}',
                       '{{$entrega_11}}',
                       '{{$entrega_12}}',
                   ],
                    backgroundColor: '#006700',
                     borderColor: '#70D080',
                     borderWidth: 2
               }

               ]
           },
           options: {
               scales: {

               }
           }
       });
   </script>
@endsection
