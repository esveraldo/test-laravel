<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LogAcesso extends Model
{
    protected $table = 'log_acessos';
    
    protected $fillable = ['log'];
}
