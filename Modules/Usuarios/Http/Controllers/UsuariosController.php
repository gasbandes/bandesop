<?php

namespace Modules\Usuarios\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Modules\Empresa\Entities\Empresa;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;



class UsuariosController extends Controller
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
        // if(\Gate::denies('Ver Usuario'))
        // {
        //     \Alert::alert('¡Uuups!', 'No tienes permitido Ver a los usuarios', 'error');

        //     return redirect()->to('home');
        // }


        if (\Auth::user()->hasRole('Administrador')) {

            $usuarios = User::with('role')->get();
            return view('usuarios::index',compact('usuarios'));
        }
        else
        {
            $usuarios = User::with('role')->where('empresa_id',\Auth::user()->empresa_id)->get();
            return view('usuarios::index',compact('usuarios'));
        }




    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

         if(\Gate::denies('Registrar Usuario'))
        {
            \Alert::alert('¡Uuups!', 'No tienes permitido Registrar usuarios', 'error');

            return redirect()->to('home');
        }

         $empresas = Empresa::pluck('razon_social','id');
         $estados  =  [1 => 'Activo' ,0 => 'Inactivo'];
         $roles    = Role::where('id','<>',1)->pluck('name','id');
        return view('usuarios::create',compact('empresas','estados','roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

         if(\Gate::denies('Registrar Usuario'))
        {
            \Alert::alert('¡Uuups!', 'No tienes permitido guardar usuarios', 'error');

            return redirect()->to('home');
        }



         if ($request->has('password')) {

         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'empresa_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'username' => ['required', 'string', 'unique:users'],
            'empresa_id' => ['required'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
         ]);


         $usuario = new User();

         $usuario->name = $request->name;
         $usuario->username = $request->username;
         $usuario->email = $request->email;
         $usuario->status = $request->status;
         $usuario->role_id = $request->role_id;
         $usuario->empresa_id = $request->empresa_id;
         $usuario->password = bcrypt($request->password);
         $usuario->save();


         $role = Role::findById($request->role_id);
         $usuario->assignRole($role->name);



         \Alert::alert('¡Bien hecho!', 'Datos Ingresado', 'success');
            return redirect()->to('usuarios');

         }
         else
         {

           $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'username' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
         ]);


         $usuario = new User();

         $usuario->name = $request->name;
         $usuario->username = $request->username;
         $usuario->email = $request->email;
         $usuario->status = $request->status;
         $usuario->role_id = $request->role_id;
         $usuario->empresa_id = \Auth::user()->empresa_id;
         $usuario->password = bcrypt($request->password);
         $usuario->save();


         $role = Role::findById($request->role_id);
         $usuario->syncRoles($role->name);



         \Alert::alert('¡Bien hecho!', 'Datos Ingresado', 'success');
            return redirect()->to('usuarios');

         }







    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('usuarios::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {


        //  if(\Gate::denies('Editar Usuario'))
        // {
        //     \Alert::alert('¡Uuups!', 'No tienes permitido editar usuarios', 'error');

        //     return redirect()->to('home');
        // }




         $usuarios = User::find($id);
         $empresas = Empresa::pluck('razon_social','id');
         $estados  =  [1 => 'Activo' ,0 => 'Inactivo'];
         $roles    = Role::pluck('name','id');

        return view('usuarios::edit',compact('usuarios','empresas','estados','roles'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {


        //   if(\Gate::denies('Editar Usuario'))
        // {
        //     \Alert::alert('¡Uuups!', 'No tienes permitido actualizar usuarios', 'error');

        //     return redirect()->to('home');
        // }


        if ($request->password <> null ) {

           $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'username' => ['required'],
            //'tx_rif' => ['required', 'string', 'max:255', 'unique:empresas'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
         ]);

         $usuario = User::find($id);

         $usuario->name = $request->name;
         $usuario->username = $request->username;
         $usuario->email = $request->email;
         $usuario->status = $request->status;
         $usuario->role_id = $request->role_id;
         $usuario->password = bcrypt($request->password);
         $usuario->save();
         \Alert::alert('¡Bien hecho!', 'Datos modificados', 'success');
            return redirect()->to('usuarios');
       }
       else
       {

           $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'status' => ['required'],
            'role_id' => ['required'],
            //'nu_contacto' => ['required'],
            //'tx_rif' => ['required', 'string', 'max:255', 'unique:empresas'],
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
         ]);

          $usuario = User::find($id);

         $usuario->name = $request->name;
         $usuario->username = $request->username;
         $usuario->email = $request->email;
         $usuario->status = $request->status;
         $usuario->role_id = $request->role_id;
         $usuario->save();

         $role = Role::findById($request->role_id);
         $usuario->syncRoles($role->name);

         \Alert::alert('¡Bien hecho!', '¡Datos modificados satisfactoriamente!.', 'success');
            return redirect()->to('usuarios');
       }

     }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
     public function destroy($id)
    {
         $usuario = User::find($id);

         if ($usuario->id == \Auth::user()->id) {

              \Alert::alert('¡Aviso!', '¡Este usuario no puede ser eliminado!.', 'info');
             return redirect('usuarios');
         }

         $usuario->delete();
         \Alert::alert('¡Bien hecho!', '¡Usuario eliminado satisfactoriamente!.', 'success');
         return redirect()->to('usuarios');
    }
}
