<?php

namespace Modules\Gerencia\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gerencia extends Model
{


    use HasFactory;

    public $timestamps = true;

    protected $table = 'gerencias';

    protected $fillable = ['empresa_id','descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personals()
    {
        return $this->hasMany('App\Models\Personal', 'gerencia_id', 'id');
    }
    
    protected static function newFactory()
    {
        return \Modules\Gerencia\Database\factories\GerenciaFactory::new();
    }

    public function ente()
    {
        return $this->belongsTo(\Modules\Empresa\Entities\Empresa::class, 'empresa_id', 'id');
    }
}
