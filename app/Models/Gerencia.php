<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany('Modules\Personal\Entities\Personal', 'gerencia_id', 'id');
    }
    
}
