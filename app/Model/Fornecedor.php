<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    //Trait
    use SoftDeletes;
    
    //Definindo o nome certo da tabela
    protected $table = 'fornecedores';
    
    //Definindo as variáveis que serão trabalhadas
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}
