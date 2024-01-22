<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClasificadorPutRequest extends FormRequest
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
            'codigo'=>'required|unique:clasificadors,codigo,'.$this->get('codigo'),
            'descripcion'=>'required',
            'clasificador_id'=>'required',
            'nivel'=>'required'
        ];
    }
}
