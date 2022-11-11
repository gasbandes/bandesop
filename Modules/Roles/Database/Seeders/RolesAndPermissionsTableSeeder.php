<?php

namespace Modules\Roles\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RolesAndPermissionsTableSeeder extends Seeder
{

    private  $super_admin_permissions, $user_permissions;


    public function __construct()
    {
        /*
        set the default permissions
        */
        $this->super_admin_permissions =  [

                                /* Usuarios */
                                'acceso_usuarios',
                                'Ver Usuario',
                                'Registrar Usuario',
                                'Editar Usuario',
                                'Eliminar Usuario',

                                /* Asignar permisos */
                                'Asignar Permisos',


                                'acceso_permisos',
                                'Ver Permisos',
                                'Registrar Permisos',
                                'Editar Permisos',
                                'Eliminar Permisos',

                                /* Logins */
                                'acceso_logins',
                                'Ver Logins',

                                /* Logs*/
                                'acceso_logs',
                                'Ver LogSistema',


                                /* Roles */
                                'acceso_role',
                                'Ver Role',
                                'Registrar Role',
                                'Editar Role',
                                'Eliminar Role',

                                 /* Empresas */
                                'acceso_empresa',
                                'Ver Empresa',
                                'Registrar Empresa',
                                'Editar Empresa',
                                'Eliminar Empresa',

                                 /* Personal */
                                'acceso_personal',
                                'Ver Personal',
                                'Registrar Personal',
                                'Editar Personal',
                                'Eliminar Personal',


                                /* Gerencia */
                                'acceso_gerencia',
                                'Ver Gerencia',
                                'Registrar Gerencia',
                                'Editar Gerencia',
                                'Eliminar Gerencia',

                                /* Productos */
                                'acceso_productos',
                                'Ver Productos',
                                'Registrar Productos',
                                'Editar Productos',
                                'Eliminar Productos',




                              ];

            $user_permissions =
            [

            ];




    }

    public function run()
      {
          // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        foreach ($this->super_admin_permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }




        // create the admin role and set all default permissions
        $role = Role::create(['name' => 'Administrador']);
        $role->givePermissionTo($this->super_admin_permissions);

        // create the admin role and set all default permissions
        $role = Role::create(['name' => 'Operador']);
        $role->givePermissionTo($this->user_permissions);



    }
}
