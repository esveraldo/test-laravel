<?php

use Illuminate\Database\Seeder;
use App\Model\Unidade;

class UnidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unidade::create(['unidade' => 'UN', 'descricao' => 'Unidade']);
    }
}
