<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersEditRequest extends FormRequest
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


    //Aqui determina todos os parametros que são necessários para que o construtor funcione
    public function rules()
    {
        return [
            'name'=>'required',
            'email'=>'required',
            'role_id'=>'required',
            'is_active'=>'required',
        ];
    }
}
