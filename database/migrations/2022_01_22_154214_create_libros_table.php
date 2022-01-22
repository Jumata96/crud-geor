<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id(); 
            $table->integer('idBiblioteca')->unsigned(); 
             $table->string("nombre");
            $table->string("edicion");
            $table->timestamps();  
            $table->foreign('idBiblioteca')->references('id')->on('bibliotecas');
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}