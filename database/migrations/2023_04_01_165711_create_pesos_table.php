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
        Schema::create('pesos', function (Blueprint $table) {
            $table->id();
            $table->string('id_cliente');
            $table->integer('perdida_peso_1');
            $table->integer('semanas_perdida_peso_1');
            $table->integer('perdida_peso_2');
            $table->integer('semanas_perdida_peso_2');
            $table->integer('perdida_peso_final');
            $table->text('fecha');
            $table->text('peso');
            $table->text('peso_teorico');
            $table->text('nota_pasos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesos');
    }
};
