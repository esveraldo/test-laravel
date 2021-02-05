<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); //cm, mm, kg
            $table->string('deacricao', 100);
            $table->timestamps();
        });
        
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            
            $table->foreign('unidade_id')->references ('id')->on('unidades');
        });
        
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            
            $table->foreign('unidade_id')->references ('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     * 
     *
     * @return void
     */
    public function down()
    {
        //Remover relacionameo com a tabela produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table){
            //Removendo a fk
            $table->dropForeign('produto_detalhes_unidade_id_foreign');//[table]_[coluna]_foreign
            //Remover a coluna
            $table->dropColumn('unidade_id');
        });
        
        //Remover relacionamento com a tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            //Removendo a fk
            $table->dropForeign('produtos_unidade_id_foreign');//[table]_[coluna]_foreign
            //Remover a coluna
            $table->dropColumn('unidade_id');
        });
        
        Schema::dropIfExists('unidades');
    }
}