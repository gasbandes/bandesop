<?php

namespace Modules\Categoria\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Categoria\Entities\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categorias = Categoria::get();
        return view('categoria::index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('categoria::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

       try {

        $categoria = new Categoria();
        $categoria->nu_codigo = $request->nu_codigo;
        $categoria->nb_nombre = $request->nb_nombre;
        $categoria->empresa_id = \Auth::user()->empresa_id;
        $categoria->user_id = \Auth::user()->id ;
        $categoria->status = $request->status;
        $categoria->save();

        \Alert::alert('¡Bien hecho!', 'Los datos han sido guardados', 'success');
            return redirect()->to('categoria');




       } catch (\Throwable $th) {

         \Alert::alert('¡Uuuups!', 'Hay un error en el envío del formulario', 'error');
         return redirect()->to('categoria');

       }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('categoria::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('categoria::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request,  $id)
    {
        try {

            $categoria = Categoria::find($id);
            $categoria->nb_nombre = $request->nb_nombre;
            $categoria->empresa_id = \Auth::user()->empresa_id;
            $categoria->user_id = \Auth::user()->id ;
            $categoria->status = $request->status;
            $categoria->save();

            \Alert::alert('¡Bien hecho!', 'Los datos han sido guardados', 'success');
                return redirect()->to('categoria');




           } catch (\Throwable $th) {

             \Alert::alert('¡Uuuups!', 'Hay un error en el envío del formulario', 'error');
             return redirect()->to('categoria');

           }

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
