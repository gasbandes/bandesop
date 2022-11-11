<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(\Modules\Roles\Database\Seeders\RolesAndPermissionsTableSeeder::class);
        $this->call(\Modules\Empresa\Database\Seeders\EmpresaTableSeeder::class);
        $this->call(\Modules\Categoria\Database\Seeders\CategoriaDatabaseSeeder::class);
        $this->call(\Modules\Producto\Database\Seeders\ProductoDatabaseSeeder::class);

    }
}
