<?php

namespace Modules\Gerencia\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GerenciaDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'AUDITORIA INTERNA';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'CONSULTORIA JURIDICA';
        $gerencia->save();


        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'GCIA EJEC.ADM DE FONDOS OPER.CAMBIARIAS';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'GCIA. EJEC. COOP. Y FINAN. INTERNACIONAL';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'GCIA. EJEC. DE ADMINISTRACION DE FONDOS';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'GCIA. EJEC. DE ADMON INTEGRAL DE RIESGO';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'GCIA. EJEC. FONDOS PARA EL DESARROLLO';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'GCIA. EJEC. GESTION DEL TALENTO HUMANO';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'GCIA. EJEC. SECRETARIA DE LA PRESIDENCIA';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'GCIA. EJEC. SEGURIDAD DE LA INFORMACION';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'GCIA. EJECUTIVA  RESGUARDO INSTITUCIONAL';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'GCIA.EJEC. COOP. FINANCIAMIENTO NACIONAL';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'GCIA.EJEC.INFORMACIÓN Y RELACIONES PUBLI';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'GCIA.EJEC.PLANIFICACION GESTION ESTRATEG';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'GCIA.EJEC.TECNOLOGIA DE LA INFORMACION';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'GCIA.PREVENCION Y CONTROL DE LC/FT/FPADM';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'GERENCIA DE PREINVERSION Y ASIST.TECNICA';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'GERENCIA EJECUTIVA DE ADMINISTRACION';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'GERENCIA EJECUTIVA DE FINANZAS';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'PRESIDENCIA';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'SECRETARÍA DE LA COMISION CONTRATACIONES';
        $gerencia->save();

        $gerencia = new \Modules\Gerencia\Entities\Gerencia();
        $gerencia->descripcion = 'VICEPRESIDENCIA EJECUTIVA';
        $gerencia->save();



    }
}
