<?php

use Illuminate\Database\Seeder;
use App\Model\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        SiteContato::create(
        [
            'nome'=>'Esveraldo', 
            'telefone'=>'21 88888-3333', 
            'email'=>'esveraldo@email.com', 
            'motivo_contato_id'=>1,
            'mensagem'=>'Estou muito contente com o resultado'
        ]);
        
        SiteContato::create(
        [
            'nome'=>'Adriana', 
            'telefone'=>'21 99999-3333', 
            'email'=>'adriana@email.com', 
            'motivo_contato_id'=>2,
            'mensagem'=>'Muito bom'
        ]);
         
        
        factory(SiteContato::class, 100)->create();
    }
}
