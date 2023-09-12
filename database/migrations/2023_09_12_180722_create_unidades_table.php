<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); //sigla
            $table->string('descricao', 30);
            $table->timestamps();
        });

        //add relacionamento com produtos e produtos detalhes
        Schema::table('produtos', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades'); //referencia a tabela de origem
        });

        Schema::table('produto_detalhes', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades'); //referencia a tabela de origem
        });

    }

    
    public function down(): void
    {

        //remover relacionamento com produtos e produtos detalhes

        Schema::table('produto_detalhes', function(Blueprint $table){
            
            //remover a foreign key e remover a coluna
            $table->dropForeign('produtos_unidade_id_foreign'); //referencia a tabela de origem
            $table->dropColumn('unidade_id');
        });

        Schema::table('produtos', function(Blueprint $table){
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); //referencia a tabela de origem
            $table->dropColumn('unidade_id');
        });
        
        Schema::dropIfExists('unidades');
    }
};
