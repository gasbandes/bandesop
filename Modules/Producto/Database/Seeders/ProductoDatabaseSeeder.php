<?php

namespace Modules\Producto\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProductoDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


        $codigo1 = uniqid();
        $codigo2 = uniqid();
        $codigo3 = uniqid();
        $codigo4 = uniqid();
        $codigo5 = uniqid();

        $producto = new \App\Models\Producto();
        $producto->name     = 'PROTEÍNAS';
        $producto->cantidad = '1033';
        $producto->status   = 1;
        $producto->codigo = $codigo1;
        $producto->foto   = 'proteinas.jpg';
        $producto->save();


        $producto = new \App\Models\Producto();
        $producto->name     = 'ALIMENTOS SECOS';
        $producto->cantidad = '1033';
        $producto->status   = 1;
        $producto->codigo = $codigo2;
        $producto->foto   = 'alimentos.jpg';
        $producto->save();

        $producto = new \App\Models\Producto();
        $producto->name     = 'IMPLEMENTOS DE LIMPIEZA';
        $producto->cantidad = '1033';
        $producto->status   = 1;
        $producto->codigo = $codigo3;
        $producto->foto   = 'limpieza.jpg';
        $producto->save();


        $producto = new \App\Models\Producto();
        $producto->name     = 'CARTÓN DE HUEVOS';
        $producto->cantidad = '1033';
        $producto->status   = 1;
        $producto->codigo = $codigo4;
        $producto->foto   = 'carton_huevos.jpg';
        $producto->save();


        $producto = new \App\Models\Producto();
        $producto->name     = 'JUEGUETES';
        $producto->cantidad = '1033';
        $producto->status   = 0;
        $producto->codigo = $codigo5;
        $producto->foto   = 'juguetes.jpg';
        $producto->save();


        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = 'AUDITORIA INTERNA
';
        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = 'CONSULTORIA JURIDICA
';
        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = ' GCIA EJEC.ADM DE FONDOS OPER.CAMBIARIAS';
        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = ' GCIA. EJEC. COOP. Y FINAN. INTERNACIONAL
';
        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = ' GCIA. EJEC. DE ADMINISTRACION DE FONDOS
';
        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = ' GCIA. EJEC. DE ADMON INTEGRAL DE RIESGO
';
        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = ' GCIA. EJEC. FONDOS PARA EL DESARROLLO
';
        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = ' GCIA. EJEC. GESTION DEL TALENTO HUMANO
';
        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = ' GCIA. EJEC. SECRETARIA DE LA PRESIDENCIA';
        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = ' GCIA. EJEC. SEGURIDAD DE LA INFORMACION
';
        $gerencia->empresa_id = 1;
        $gerencia->save();


        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = ' GCIA. EJECUTIVA  RESGUARDO INSTITUCIONAL

';
        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = ' GCIA.EJEC. COOP. FINANCIAMIENTO NACIONAL

';
        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = '  GCIA.EJEC.INFORMACIÓN Y RELACIONES PUBLI

';
        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = ' GCIA.EJEC.PLANIFICACION GESTION ESTRATEG

';
        $gerencia->empresa_id = 1;
        $gerencia->save();


        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = ' GCIA.EJEC.TECNOLOGIA DE LA INFORMACION';

        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = ' GCIA.PREVENCION Y CONTROL DE LC/FT/FPADM

';
        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = ' GERENCIA DE PREINVERSION Y ASIST.TECNICA

';
        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = ' GERENCIA EJECUTIVA DE ADMINISTRACION

';
        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = ' GERENCIA EJECUTIVA DE FINANZAS

';
        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = ' PRESIDENCIA

';
        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = '  SECRETARÍA DE LA COMISION CONTRATACIONES


';
        $gerencia->empresa_id = 1;
        $gerencia->save();

        $gerencia = new \App\Models\Gerencia();
        $gerencia->descripcion = '  VICEPRESIDENCIA EJECUTIVA


';
        $gerencia->empresa_id = 1;
        $gerencia->save();

    }
}
