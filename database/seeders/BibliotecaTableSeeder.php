<?php

namespace Database\Seeders;
use App\Models\Biblioteca;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class BibliotecaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $biblioteca = new Biblioteca();
        $biblioteca->nombre="Biblioteca 01";
        $biblioteca->descripcion="registro de laravel";
        $biblioteca->save();

        $biblioteca = new Biblioteca();
        $biblioteca->nombre="Biblioteca 02";
        $biblioteca->descripcion="registro de laravel";
        $biblioteca->save(); 
    
    }
}
