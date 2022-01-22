<?php

namespace Database\Factories;
use \App\Models\Biblioteca;
use Illuminate\Database\Eloquent\Factories\Factory;

class BiblitecasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model=Biblioteca::class;
    
    public function definition()
    {
        return [
            'nombre'=>$this->faker->sentence(),
            'descripcion'=>$this->faker->paragraph(),
        ];
    }
}
