<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];
}
