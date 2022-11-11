<?php

namespace Modules\Login\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Login\Entities\login;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */



    public function __construct()
    {
        $this->middleware(['actived','auth','verified']);
    }


    public function index()
    {

          if(\Gate::denies('acceso_logins'))
        {
            \Alert::alert('¡Uuups!', 'No tienes permitido Ver este módulo', 'error');

            return redirect()->to('home');
        }

        $logins = login::get();

        return view('login::index',compact('logins'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('login::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('login::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('login::edit');
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
    public function destroy($id)
    {
        //
    }
}
