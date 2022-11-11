<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (\Auth::user()->hasRole('Operador')) {

            return redirect('operativo');

        }
        return view('home');
    }

   /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function grafico()
    {
            $entrega_1 = \App\Models\Operativo::whereMonth('created_at','01')
            ->where('confirmed',1)
            ->count();


            $entrega_2 = \App\Models\Operativo::whereMonth('created_at','02')
            ->where('confirmed',1)
            ->count();
            $entrega_3 = \App\Models\Operativo::whereMonth('created_at','03')
            ->where('confirmed',1)
            ->count();
            $entrega_4 = \App\Models\Operativo::whereMonth('created_at','04')
            ->where('confirmed',1)
            ->count();
            $entrega_5 = \App\Models\Operativo::whereMonth('created_at','05')
            ->where('confirmed',1)
            ->count();
            $entrega_6 = \App\Models\Operativo::whereMonth('created_at','06')
            ->where('confirmed',1)
            ->count();
            $entrega_7 = \App\Models\Operativo::whereMonth('created_at','07')
            ->where('confirmed',1)
            ->count();
            $entrega_8 = \App\Models\Operativo::whereMonth('created_at','08')
            ->where('confirmed',1)
            ->count();
            $entrega_9 = \App\Models\Operativo::withCount('empleados')->whereMonth('created_at','09')
            ->where('confirmed',1)
            ->count();
            $entrega_10 = \App\Models\Operativo::whereMonth('created_at','10')
            ->where('confirmed',1)
            ->count();
            $entrega_11 = \App\Models\Operativo::whereMonth('created_at','11')
            ->where('confirmed',1)
            ->count();
            $entrega_12 = \App\Models\Operativo::whereMonth('created_at','12')
            ->where('confirmed',1)
            ->count();




            return view('resultado.grafica',
            compact(
            'entrega_1',
            'entrega_2',
            'entrega_3',
            'entrega_4',
            'entrega_5',
            'entrega_6',
            'entrega_7',
            'entrega_8',
            'entrega_9',
            'entrega_10',
            'entrega_11',
            'entrega_12'
        ));
    }


    public function historial()
    {

        $operativo_mes_actual_proteinas = \App\Models\Operativo::whereMonth('created_at',date('m'))
        ->where('year',date('Y'))
        ->where('producto_id',1)
        ->count();

        $operativo_mes_actual_secos = \App\Models\Operativo::whereMonth('created_at',date('m'))
        ->where('year',date('Y'))
        ->where('producto_id',2)
        ->count();

        $operativo_mes_actual_limpieza = \App\Models\Operativo::whereMonth('created_at',date('m'))
        ->where('year',date('Y'))
        ->where('producto_id',3)
        ->count();

        $operativo_mes_actual_huevos = \App\Models\Operativo::whereMonth('created_at',date('m'))
        ->where('year',date('Y'))
        ->where('producto_id',4)
        ->count();


        $fecha_actual = \App\Models\Operativo::where('confirmed',1)
        ->whereDate('created_at',date('Y-m-d'))
        ->count();

       $date = new \Carbon\Carbon('yesterday');
       $fecha_anterior = \App\Models\Operativo::where('confirmed',1)
        ->whereDate('created_at',$date)
        ->count();

       $jornadas = \App\Models\Operativo::whereMonth('created_at',date('m'))
       ->where('confirmed',1)
       ->get();

        return view ('operativo.general',
         compact(
            'jornadas',
            'fecha_actual',
            'fecha_anterior',
            'operativo_mes_actual_proteinas',
            'operativo_mes_actual_secos',
            'operativo_mes_actual_limpieza',
            'operativo_mes_actual_huevos'
        ));

    }


}
