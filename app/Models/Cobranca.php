<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cobranca extends Model
{
   protected $fillable = [
        
        'associado', 'placa', 'valor_mensalidade', 
        'valor_acordo', 'status', 'data', 'data_pagamento', 
        'local_pag', 'atendente', 'rastreador', 'observacao'
    ];
    
}
