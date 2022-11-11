<?php

namespace Modules\Empresa\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Empresa\Entities\Empresa;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresa = new Empresa();
        $empresa->razon_social = 'BANDES';
        $empresa->documento    = 'J-25212293-8';
        $empresa->telefono     = '02125058000';
        $empresa->direccion    = 'Caracas - Veneuela';
        $empresa->email        = 'informacionyrrpp@bandes.gob.ve';
        $empresa->logo_empresa = 'logo_verde.png';
        $empresa->is_active    = 1;
        $empresa->save();







        $configuracion = new \App\Models\ConfiguracionGeneral();
        $configuracion->serie = '001';
        $configuracion->correlativo = '0000000';
        $configuracion->empresa_id = 1;
        $configuracion->save();


    }
}
