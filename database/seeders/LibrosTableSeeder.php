<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\libro;

class LibrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $libro = new libro();
        $libro->idBiblioteca=1;
        $libro->nombre="libro 01";
        $libro->edicion="registro de laravel";
        $libro->save();

          


    }
}
