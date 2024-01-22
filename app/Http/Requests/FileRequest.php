<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        switch ($this->request->get('fileType')) {
            case 'addition':
                return[
                    'tipo'=>'required|in:referencial,informe',
                    'archivo'=>'required'
                ];
                break;
            case 'quotation':
                return[
                    'archivo'=>'required'
                ];
                break;
            case 'bill':
                return[
                    'archivo'=>'required'
                ];
            break;
        }
        return [
            //
        ];
    }
    public function messages(){
        return [
            'tipo.required'=>'El tipo es requerido',
            'archivo.required'=>'El archivo es requerido'
        ];
    }
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    
}
