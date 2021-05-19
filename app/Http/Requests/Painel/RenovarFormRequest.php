<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class RenovarFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [          
             
            
                'associado'         => 'required',
                'placa'             => 'required',
                'valor_mensalidade' => 'required|min:3|max:150',
                'valor_renovacao'   => 'required|min:3|max:150',
                'status'            => 'required|min:3|max:9',
                'data'              => 'required',
                'atendente'         => 'required|min:3|max:150',
                'rastreador'        => 'required|min:3|max:3',
       
        ];
    }
}
