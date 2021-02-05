<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAjusteProdutosFiliaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });
        
        Schema::create('produto_filiais', function(Blueprint $table){
            $table->id();
            $table->foreignId('filial_id');
            $table->foreignId('produto_id');
            $table->float('preco_venda', 8,2)->default(0.01);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);
            $table->timestamps();
            
            //Foreign keys
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
        
        //Removendo colunas da tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            //$table->dropColumn(['preco_venda, estoque_minimo, estoque_maximo']);
            $table->dropColumn('preco_venda');
            $table->dropColumn('estoque_minimo');
            $table->dropColumn('estoque_maximo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Removendo colunas da tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->float('preco_venda', 8,2)->default(0.01);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);
        });
        
        //Removendo as tabelas criadas
        Schema::dropIfExists('produto_filiais');
        
        Schema::dropIfExists('filiais');
    }
}
