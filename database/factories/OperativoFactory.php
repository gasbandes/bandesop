<?php

namespace Database\Factories;

use App\Models\Operativo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OperativoFactory extends Factory
{
    protected $model = Operativo::class;

    public function definition()
    {
        return [
			'usuario_id' => $this->faker->name,
			'personal_id' => $this->faker->name,
			'ente_id' => $this->faker->name,
			'gerencia_id' => $this->faker->name,
			'producto_id' => $this->faker->name,
			'mes' => $this->faker->name,
			'year' => $this->faker->name,
			'hora' => $this->faker->name,
			'cantidad' => $this->faker->name,
			'confirmed' => $this->faker->name,
        ];
    }
}
