<?php

namespace Modules\Personal\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Modules\Beneficiario\Entities\Beneficiario;


class Personal extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Personal\Database\factories\PersonalFactory::new();
    }


     // Buscar empleado en base de datos de sigesp
    public function buscarEmpleado($cedula, $nominas)
    {

        $users = DB::connection('2022')->table('sno_personalnomina as a')->select('c.cedper', 'c.nomper', 'c.apeper', 'c.estper', 'c.coreleper', 'c.cauegrper','c.fecnacper','c.telmovper','f.desuniadm')
                ->join('sno_nomina as b', 'a.codnom','=','b.codnom')
                ->join('sno_personal as c', 'a.codper','=','c.codper')
                ->join('sno_unidadadmin as f','a.codemp','=','f.codemp')
                ->join('sno_unidadadmin','a.minorguniadm','=','f.minorguniadm')
                ->where([
                        ['b.espnom', '=', '0'],
                        ['a.codemp', '=', '0001'],
                        ['a.staper', '=', '1'],
                        ['c.cauegrper', '=', ''],
                        ['a.codper', '=', str_pad($cedula, 10, "0", STR_PAD_LEFT)]
                    ])->whereIn('a.codnom', $nominas)->distinct()->orderBy('c.cedper', 'asc')->get();

        return $users;
    }


     // Buscar usuario en la base datos del sistema
    public function buscarUsuario($cedula){
        $personal = Personal::where('nu_cedula',$cedula)->first();
        return $personal;
    }



     public function beneficiarios()
    {
        return $this->hasMany(Beneficiario::class, 'personal_id', 'id');
    }


}
