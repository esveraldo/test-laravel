<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MotivoContato extends Model
{
    protected $table = 'motivo_contatos';
    
    protected $fillable = ['motivo'];
}
