<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $table = 'unidades';
    
    protected $fillable = ['unidade', 'descricao'];
}