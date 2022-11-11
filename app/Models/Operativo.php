<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operativo extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'operativo';

    protected $fillable = ['usuario_id','personal_id','ente_id','gerencia_id','producto_id','mes','year','hora','cantidad','confirmed'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'id', 'ente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function gerencia()
    {
        return $this->hasOne('App\Models\Gerencia', 'id', 'gerencia_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function personal()
    {
        return $this->belongsTo('App\Models\Personal', 'personal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'usuario_id');
    }

    public function productos()
    {
        return $this->belongsTo('App\Models\Producto', 'producto_id');
    }


     public function activos(){
         return $this->hasMany(\App\Models\Personal::class);

     }


     public function empleados(){

        return $this->hasMany('App\Models\Personal', 'id','personal_id');
    }


}
