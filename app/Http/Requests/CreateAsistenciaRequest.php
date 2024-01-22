<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAsistenciaRequest extends FormRequest
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
            //
          'id_persona' => 'required|integer',
          'ci_a' => 'required|integer',
          'tipo_a' => 'required|max:50|in:entrada,salida',
          'estado_a' => 'required|max:50|in:en hora,atrasado,falta'
        ];
    }
}
