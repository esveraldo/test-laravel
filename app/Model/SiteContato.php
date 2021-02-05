<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    protected $table = 'site_contatos';
    
    protected $fillable = ['nome', 'telefone', 'email', 'motivo', 'mensagem'];
}
