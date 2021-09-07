<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renovar extends Model
{
    protected $fillable = [
        
        'users_id','associado', 'placa', 'valor_mensalidade', 
        'valor_renovacao', 'status', 'data_r', 'data_a', 
        'atendente', 'rastreador', 'observacao'
    ];
}
