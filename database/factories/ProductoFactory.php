<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition()
    {
        return [
			'codigo' => $this->faker->name,
			'name' => $this->faker->name,
			'cantidad' => $this->faker->name,
			'status' => $this->faker->name,
        ];
    }
}
