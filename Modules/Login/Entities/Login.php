<?php

namespace Modules\Login\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Login extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $dates = [
    'created_at',
    'updated_at',
    'logout_at'
];
    
    protected static function newFactory()
    {
        return \Modules\Login\Database\factories\LoginFactory::new();
    }



    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
