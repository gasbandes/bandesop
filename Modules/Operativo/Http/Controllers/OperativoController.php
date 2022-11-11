<?php

namespace Modules\Operativo\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Operativo;
use DateTime;
use DateTimeZone;

class OperativoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {


        return view('operativo::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('operativo::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        if($request->producto_id <> null)
        {


        $personal = \App\Models\Personal::find($request->personal);


        if ($personal->tipo_empleado == 2) {


            $idproducto = $request->get('producto_id');

            $data = count($idproducto);
            $cont = 0;

            $config = \DB::table('configuracion_generals')->first();
            $d_serie = $config->serie;
            $d_correlativo = $config->correlativo;

            $operativos = \DB::table('operativo')
            ->whereMonth('created_at',date('m'))
            ->where('confirmed','1')
            ->get();

            $operativo = \DB::table('operativo')
            ->whereMonth('created_at',date('m'))
            ->where('personal_id',$personal->id)
            ->where('confirmed','1')
            ->get();

            if ( (count($operativo) == 6)) {

                return \Redirect::back()->with('El funcionario ya retiró ambos beneficios.');

            }

        if (count($operativos) == 0)
         {
            $serie = str_pad($d_serie,3,'0',STR_PAD_LEFT);
            $correlativo = str_pad($d_correlativo + 1,7,'0',STR_PAD_LEFT);


         } else
        {

                if($d_correlativo=='9999999'){
                    $serie = str_pad($d_serie + 1,3,'0',STR_PAD_LEFT);
                    $correlativo = str_pad(1,7,'0',STR_PAD_LEFT);
                }else{
                    $operativo = \DB::table('operativo')
                    ->orderby('id','desc')
                    ->first();
                    $serie = str_pad($d_serie,3,'0',STR_PAD_LEFT);
                    $correlativo = str_pad($operativo->{'correlativo'}+ 1,7,'0',STR_PAD_LEFT);



             }
        }

        while($cont < $data){


               $operativo = new Operativo();

               $operativo->gerencia_id = $personal->gerencia_id;
               $operativo->ente_id = 1 ;
               $operativo->personal_id = $request->personal;
               $operativo->serie = $serie;
               $operativo->correlativo = $correlativo;
               $operativo->producto_id = $idproducto[$cont];
               $operativo->confirmed = 1;
               $operativo->usuario_id = \Auth::user()->id;
               $operativo->mes = date('m');
               $operativo->year = date('Y');
               $operativo->hora = date('H:i:s');
               $operativo->save();



                $producto = \App\Models\Producto::findOrFail($idproducto[$cont]);

                $producto->cantidad = $producto->cantidad - 1;
                $producto->save();

                 $cont = $cont + 1;


             }
             \Alert::alert('¡Bien hecho!', 'Se le asignó correctamente el beneficio al funcionario!.', 'success');
             return \Redirect::back();


        } else
        {


            if ($personal->status == 2) {

                $this->guardarJubilado($request, $personal);
                \Alert::alert('¡Bien hecho!', 'Se le asignó correctamente el beneficio al funcionario!.', 'success');
                return redirect('/operativo');
            }
            elseif($personal->status == 1 )
            {
                $this->guardarActivo($request, $personal);
                \Alert::alert('¡Bien hecho!', 'Se le asignó correctamente el beneficio al funcionario!.', 'success');
                return redirect('/operativo')->with('El funcionario registrado.');
            }
        }



        }
        else
        {   $message = session()->flash('errormessage', '¡NO se admiten campos vacíos!');
            return redirect()->back()->with('status','¡NO se admiten campos vacíos!');
        }




    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('operativo::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('operativo::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function guardarJubilado($request, $personal)
    {
        $operativo = \DB::table('operativo')
        ->whereMonth('created_at',date('m'))
        ->where('personal_id',$personal->id)
        ->where('confirmed','1')
        ->get();


        if ( (count($operativo) >= 4)) {

            return \Redirect::to('operativo')->with('El funcionario ya retiró su beneficio.');

        }
        else
        {
            $idproducto = $request->get('producto_id');

            $data = count($idproducto);
            $cont = 0;

            $config = \DB::table('configuracion_generals')->first();
            $d_serie = $config->serie;
            $d_correlativo = $config->correlativo;

            $operativos = \DB::table('operativo')
            ->whereMonth('created_at',date('m'))
            ->where('confirmed','1')
            ->get();

            if (count($operativos) == 0)
     {
        $serie = str_pad($d_serie,3,'0',STR_PAD_LEFT);
        $correlativo = str_pad($d_correlativo + 1,7,'0',STR_PAD_LEFT);


     } else
    {

            if($d_correlativo=='9999999'){
                $serie = str_pad($d_serie + 1,3,'0',STR_PAD_LEFT);
                $correlativo = str_pad(1,7,'0',STR_PAD_LEFT);
            }else{
                $operativo = \DB::table('operativo')
                ->orderby('id','desc')
                ->first();
                $serie = str_pad($d_serie,3,'0',STR_PAD_LEFT);
                $correlativo = str_pad($operativo->{'correlativo'}+ 1,7,'0',STR_PAD_LEFT);



         }
    }

    while($cont < $data){


           $operativo = new Operativo();

           $operativo->gerencia_id = $personal->gerencia_id;
           $operativo->ente_id = 1 ;
           $operativo->personal_id = $request->personal;
           $operativo->serie = $serie;
           $operativo->correlativo = $correlativo;
           $operativo->producto_id = $idproducto[$cont];
           $operativo->confirmed = 1;
           $operativo->usuario_id = \Auth::user()->id;
           $operativo->mes = date('m');
           $operativo->year = date('Y');
           $operativo->hora = date('H:i:s');
           $operativo->save();



            $producto = \App\Models\Producto::findOrFail($idproducto[$cont]);

            $producto->cantidad = $producto->cantidad - 1;
            $producto->save();

             $cont = $cont + 1;


         }

         return \Redirect::to('/operativo');

        }
    }

     /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function guardarActivo($request, $personal)
    {


        $operativo = \DB::table('operativo')
        ->whereMonth('created_at',date('m'))
        ->where('personal_id',$personal->id)
        ->where('confirmed','1')
        ->get();


        if ( (count($operativo) >= 4)) {

            return \Redirect::back()->with('El funcionario ya retiró su beneficio.');

        }
        else
        {
            $idproducto = $request->get('producto_id');

            $data = count($idproducto);
            $cont = 0;

            $config = \DB::table('configuracion_generals')->first();
            $d_serie = $config->serie;
            $d_correlativo = $config->correlativo;

            $operativos = \DB::table('operativo')
            ->whereMonth('created_at',date('m'))
            ->where('confirmed','1')
            ->get();

            if (count($operativos) == 0)
     {
        $serie = str_pad($d_serie,3,'0',STR_PAD_LEFT);
        $correlativo = str_pad($d_correlativo + 1,7,'0',STR_PAD_LEFT);


     } else
    {

            if($d_correlativo=='9999999'){
                $serie = str_pad($d_serie + 1,3,'0',STR_PAD_LEFT);
                $correlativo = str_pad(1,7,'0',STR_PAD_LEFT);
            }else{
                $operativo = \DB::table('operativo')
                ->whereMonth('created_at',date('m'))
                ->orderby('id','desc')
                ->first();

                $serie = str_pad($d_serie,3,'0',STR_PAD_LEFT);
                $correlativo = str_pad($operativo->{'correlativo'}+ 1,7,'0',STR_PAD_LEFT);



         }
    }

     while($cont < $data){


           $operativo = new Operativo();

           $operativo->gerencia_id = $personal->gerencia_id;
           $operativo->ente_id = 1 ;
           $operativo->personal_id = $request->personal;
           $operativo->serie = $serie;
           $operativo->correlativo = $correlativo;
           $operativo->producto_id = $idproducto[$cont];
           $operativo->confirmed = 1;
           $operativo->usuario_id = \Auth::user()->id;
           $operativo->mes = date('m');
           $operativo->year = date('Y');
           $operativo->hora = date('H:i:s');
           $operativo->save();



            $producto = \App\Models\Producto::findOrFail($idproducto[$cont]);

            $producto->cantidad = $producto->cantidad - 1;
            $producto->save();

             $cont = $cont + 1;


         }

        }




    }







}
