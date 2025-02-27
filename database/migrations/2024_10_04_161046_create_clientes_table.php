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
            $table->string('CPF', 60)->unique();
            $table->string('email', 80)->unique();
            $table->date('nascimento')->nullable(false);
            $table->string('cidade', 60)->nullable(false);
            $table->string('estado', 60)->nullable(false);
            $table->string('pais', 60)->nullable(false);
            $table->string('rua', 60)->nullable(false);
            $table->string('numero', 60)->nullable(false);
            $table->string('bairro', 90)->nullable(false);
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
