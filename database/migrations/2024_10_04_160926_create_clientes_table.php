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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 60)->nullable(false);
            $table->string('celular', 60)->nullable(false);
            $table->string('CPF')->nullable(true);
            $table->string('email', 60)->nullable(false);
            $table->date('dataNascimento')->nullable(false);
            $table->string('cidade', 60)->nullable(false);
            $table->string('estado',60)->nullable(false);
            $table->string('rua', 60)->nullable(false);
            $table->integer('numero')->nullable(false);
            $table->string('bairro', 60)->nullable(false);
            $table->string('CEP', 60)->nullable(false);
            $table->timestamps();
        });
    }






    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
