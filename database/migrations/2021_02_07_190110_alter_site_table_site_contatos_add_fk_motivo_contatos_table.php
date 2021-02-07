<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSiteTableSiteContatosAddFkMotivoContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Adicionando a coluna motivo_contato_id
        Schema::table('site_contatos', function(Blueprint $table){
            $table->foreignId('motivo_contato_id');
        });
        //Adicionando os registros de motivo para a nova coluna motivo_contato_id
        DB::statement('update site_contatos set motivo_contato_id = motivo');
        
        Schema::table('site_contatos', function(Blueprint $table){
            $table->foreign('motivo_contato_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contatos', function(Blueprint $table){
            $table->integer('motivo');
            $table->dropForeign('site_contatos_motivo_contato_id_foreign');           
        });
        
        DB::statement('update site_contatos set motivo = motivo_contato_id');
        
        Schema::table('site_contatos', function(Blueprint $table){
            $table->dropColumn('motivo_contato_id');
        });
    }
}
