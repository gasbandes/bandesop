<?php

namespace Database\Factories;

use App\Models\Personal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PersonalFactory extends Factory
{
    protected $model = Personal::class;

    public function definition()
    {
        return [
			'tx_nombres' => $this->faker->name,
			'nu_cedula' => $this->faker->name,
			'tx_gerencia' => $this->faker->name,
			'empresa_id' => $this->faker->name,
			'gerencia_id' => $this->faker->name,
			'nu_edad' => $this->faker->name,
			'nu_telefono' => $this->faker->name,
			'fe_nacimiento' => $this->faker->name,
			'status' => $this->faker->name,
			'user_id' => $this->faker->name,
        ];
    }
}
