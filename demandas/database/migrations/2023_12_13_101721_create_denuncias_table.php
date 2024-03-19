<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('denuncias', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->boolean("intern");
            $table->bigInteger("estado")->default(1);
            $table->string("observaciones")->default("");
            $table->string("type");
            $table->string("descripcio");
            $table->string('archivo')->nullable();
            $table->string("testigos");
            $table->string('updated');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->boolean("traspased")->default(0);
            $table->timestamps();
        });
        
        //Para almacenar el archivo lo tenemos que guardar en el sistema de archivos de laravel
        $nombreArchivo = 'nombre_archivo.txt';
        $contenidoArchivo = 'Contenido del archivo';
        Storage::put($nombreArchivo, $contenidoArchivo);

        //Sacamos el tiempo actual y lo encriptamos para que no pueda ser editado en la DB
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denuncias');
    }
};
