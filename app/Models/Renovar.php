<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renovar extends Model
{
    protected $fillable = [
        
        'associado', 'placa', 'valor_mensalidade', 
        'valor_renovacao', 'status', 'data', 
        'atendente', 'rastreador', 'observacao'
    ];
}
