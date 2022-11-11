<?php

namespace Modules\Roles\Http\Controllers;

use Modules\Roles\DataTables\RolesDataTable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{

      public function __construct()
    {
        $this->middleware(['actived','auth','verified']);
    }



    public function index() {


        if(\Gate::denies('Ver Role'))
        {
            \Alert::alert('¡Uuups!', 'No tienes permitido Ver este módulo', 'error');

            return redirect()->to('home');
        }

        $roles = Role::get();
        return view('roles::index',compact('roles'));
    }


    public function create() {

         if(\Gate::denies('Registrar Role'))
        {
            \Alert::alert('¡Uuups!', 'No tienes permitido Ver este módulo', 'error');

            return redirect()->to('home');
        }

        return view('roles::create');
    }


    public function store(Request $request) {
        

        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'required|array'
        ]);



        if (Role::where('name',$request->name)->first() <> null) {

          \Alert::alert('¡Uuuups!', 'El role: '.$request->name.' ¡Ya existe!', 'error');
           return redirect()->route('roles.create'); 
        }
    
        try {
            
            $role = Role::create([
            'name' => $request->name
        ]);

        $role->givePermissionTo($request->permissions);

         \Alert::alert('¡Bien hecho!', '¡Role creado con los permisos seleccionados!.', 'success');

        return redirect()->route('roles.index');

        } catch (\Exception $e) {


           \Alert::alert('¡Uuuups!', 'Algo salió mal.', 'error');
           return redirect()->route('roles.create'); 
            
        }

        
    }


    public function edit(Role $role) {
        

         if(\Gate::denies('Editar Role'))
        {
            \Alert::alert('¡Uuups!', 'No tienes permitido Ver este módulo', 'error');

            return redirect()->to('home');
        }
        

        return view('roles::edit', compact('role'));
    }


    public function update(Request $request, Role $role) {
        abort_if(Gate::denies('Editar Role'), 403);

        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'required|array'
        ]);

       try {

         $role->update([
            'name' => $request->name
        ]);

        $role->syncPermissions($request->permissions);

        \Alert::alert('¡Bien hecho!', '¡Role actualizado con los permisos seleccionados!.', 'success');

        return redirect()->route('roles.index');
           
       } catch (\Exception $e) {
           
            \Alert::alert('¡Uuuups!', 'Algo salió mal.', 'error');
           return redirect()->route('roles.index');
       }
    }


    public function destroy(Role $role) {
        
         if(\Gate::denies('Eliminar Role'))
        {
            \Alert::alert('¡Uuups!', 'No tienes permitido Ver este módulo', 'error');

            return redirect()->to('home');
        }

        $role->delete();

        toast('Role Deleted!', 'success');

        return redirect()->route('roles.index');
    }
}
