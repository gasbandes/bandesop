<?php

namespace Modules\Categoria\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoriaDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");

        $cate = new \Modules\Categoria\Entities\Categoria();
        $cate->nu_codigo  = '00-484548';
        $cate->nb_nombre  = 'Productos en general';
        $cate->empresa_id = 1;
        $cate->user_id    = 1;
        $cate->status     = 1 ;
        $cate->save();




    }
}
