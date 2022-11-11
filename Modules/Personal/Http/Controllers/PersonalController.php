<?php

namespace Modules\Personal\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Personal;
use Modules\Beneficiario\Entities\Beneficiario;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PersonalImport;



class PersonalController extends Controller
{

      public function __construct()
    {
        $this->middleware(['actived','auth','verified']);
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
           if(\Gate::denies('Ver Personal'))
        {
            \Alert::alert('¡Uuups!', 'No tienes permitido Ver este módulo', 'error');

            return redirect()->to('home');
        }

        $personals =  Personal::get();

        return view('personal::index',compact('personals'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
           if(\Gate::denies('Registrar Personal'))
        {
            \Alert::alert('¡Uuups!', 'No tienes permitido Ver este módulo', 'error');

            return redirect()->to('home');
        }

        return view('personal::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

           if(\Gate::denies('Registrar Personal'))
        {
            \Alert::alert('¡Uuups!', 'No tienes permitido Ver este módulo', 'error');

            return redirect()->to('home');
        }

        $data = $request->nu_cedula;

        $empleado = $this->empleado($data);
        if($empleado <> true)
        {
            $personal = new Personal();

            $personal->tx_nombres = $request->tx_nombres;
            $personal->tx_apellidos = $request->tx_apellidos;
            $personal->nu_cedula = $request->nu_cedula;
            $personal->status = $request->status;
            $personal->empresa_id = \Auth::user()->empresa_id;
            $personal->gerencia_id = $request->gerencia_id;
            $personal->tipo_empleado = $request->tipo_empleado;
            $personal->usuario_id = \Auth::user()->id;
            $message = session()->flash('success', 'Empleado creado satisfactoriamente.');

            return redirect()->back()->with($message);

        }

        $message = session()->flash('error', 'El empleado ya existe.');
        return redirect()->back()->with($message);

    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function buscar(Request $request)
    {

             $personal = Personal::where('nu_cedula',$request->nu_cedula)->first();

            if ($personal->status == 2)
         {

            $operativo = \DB::table('operativo')
                ->whereMonth('created_at',date('m'))
                ->where('personal_id',$personal->id)
                ->where('confirmed','1')
                ->get();

            if(count($operativo) >= 3)
            {
                return json_encode(['entregado' => true]);
            }


            $verificacion = \App\Models\ResultadoVerificacion::where('ci',$request->nu_cedula)
                ->whereDate('fecha',date('Y-m-d'))
                ->where('resultado','true')
                ->Orwhere('autorizado','true')
                ->first();

             if ($verificacion <> null)

            {
                return json_encode(['success' => true, 'personal_id' => $personal->id]);

            } else
            {
                return json_encode(['success' => false]);
            }
        }
        else
        {
            if ($personal->status == 1) {
                if ($personal->tipo_empleado == 1) {

                $operativo = \DB::table('operativo')
                ->whereMonth('created_at',date('m'))
                ->where('personal_id',$personal->id)
                ->where('confirmed','1')
                ->get();

                 if(count($operativo) >= 4)
                {
                    return json_encode(['entregado' => true]);
                }
                else
                {
                    $verificacion = \App\Models\ResultadoVerificacion::where('ci',$request->nu_cedula)
                    ->whereDate('fecha',date('Y-m-d'))
                    ->where('resultado','true')
                    //->Orwhere('autorizado','true')
                    ->get();

                    if ($verificacion->last() <> null)

                  {
                    return json_encode(['success' => true, 'personal_id' => $personal->id]);

                   } else
                   {
                    return json_encode(['success' => false]);
                   }
                }
                }
                else
                {

                $operativo = \DB::table('operativo')
                ->whereMonth('created_at',date('m'))
                ->where('personal_id',$personal->id)
                ->where('confirmed','1')
                ->get();

                 if(count($operativo) >= 6)
                {
                    return json_encode(['entregado' => true]);
                }
                else
                {
                    $verificacion = \App\Models\ResultadoVerificacion::where('ci',$request->nu_cedula)
                    ->whereDate('fecha',date('Y-m-d'))
                    ->where('resultado','true')
                    //->Orwhere('autorizado','true')
                    ->get();

                    if ($verificacion->last() <> null)

                  {
                    return json_encode(['success' => true, 'personal_id' => $personal->id]);

                   } else
                   {
                    return json_encode(['success' => false]);
                   }
                }
                }
            }
        }




    }

    public function datos($id)
    {
        $personal = Personal::find($id);

        return \Response::json($personal);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('personal::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
           if(\Gate::denies('Editar Personal'))
        {
            \Alert::alert('¡Uuups!', 'No tienes permitido Ver este módulo', 'error');

            return redirect()->to('home');
        }
        return view('personal::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {


        $personal =  Personal::find($id);

        $personal->tx_nombres = $request->tx_nombres;
        $personal->tx_apellidos = $request->tx_apellidos;
        $personal->nu_cedula = $request->nu_cedula;
        $personal->status = $request->status;
        $personal->empresa_id = \Auth::user()->empresa_id;
        $personal->gerencia_id = $request->gerencia_id;
        $personal->tipo_empleado = $request->tipo_empleado;
        $personal->usuario_id = \Auth::user()->id;
        $personal->save();
        $message = session()->flash('success', 'Empleado actualizado satisfactoriamente.');

        return redirect()->back()->with($message);


    }

    /**
     * Búsqueda del empleado por la cédula.
     * @param int $id
     * @return Renderable
     */
    public function empleado($empleado)
    {
        $empleado = Personal::where('nu_cedula',$empleado)->get();

        return count($empleado) ? true : false;
    }


    /**
     * Reverso del persosonal, donde se remueve los tipos
     * @param int $id
     * @return Renderable
     */
    public function reversar()
    {
        $personal = Personal::where('tipo_empleado',2)
                  ->update(['tipo_empleado' => 1]);

        $message = session()->flash('success', 'Reverso de empleados satisfactorio');

        return redirect()->back()->with($message);

    }


     /**
     * Importación de archivo Excel
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function importar(Request $request)
    {
        $path1 = $request->file('file')->store('temp');
        $path=storage_path('app').'/'.$path1;

        Excel::import(new PersonalImport, $path);

        $message = session()->flash('success', 'Importación de empleados satisfactorio');
        return redirect()->back()->with($message);
    }


    public function productos($id)
    {

        $productos = \DB::table("productos")->select('*')
        ->where('status',1)
        ->whereNOTIn('id',function($query)use ($id){
        $query->select('producto_id')->from('operativo')
        ->whereMonth('created_at',date('m'))
        ->where('personal_id',$id);
        })
        ->get();

        return \Response::json($productos);
    }

}
