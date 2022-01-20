<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePais extends FormRequest
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
            'nombre' => 'required|string|max:50',
            'codigoISO3' => 'required|digits:3|integer',
            'codigoISO2' => 'required|size:2|alpha',
            'cod_numerico' => 'required|integer',
        ];
    }

    //para modificar el mensaje completo de error
    //hay que indicar el mensaje por cada validación
    public function messages()
    {
        return [
            'codigoISO3.required' => 'CODIGO ISO3 obligatorio',
            'codigoISO2.required' => 'CODIGO ISO2 obligatorio',
        ];
    }
}
