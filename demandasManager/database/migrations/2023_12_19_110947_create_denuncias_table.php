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
            $table->longText("observaciones")->default("");
            $table->string("type");
            $table->longText("descripcio");
            $table->string('archivo')->nullable();
            $table->string("testigos");
            $table->string('updated');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean("traspased")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denuncias');
    }
};
