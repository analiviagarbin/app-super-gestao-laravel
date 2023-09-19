<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('site_contatos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // https://laravel.com/docs/10.x/migrations#creating-tables
            $table->string('nome', 100);
            $table->string('telefone', 20);
            $table->string('email', 100);
            $table->integer('motivo_contato');
            $table->text('mensagem');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_contatos');
    }
};
