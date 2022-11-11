<?php

namespace Database\Factories;

use App\Models\Gerencia;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GerenciaFactory extends Factory
{
    protected $model = Gerencia::class;

    public function definition()
    {
        return [
			'empresa_id' => $this->faker->name,
			'descripcion' => $this->faker->name,
        ];
    }
}
