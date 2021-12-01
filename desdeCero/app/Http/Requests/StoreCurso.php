<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurso extends FormRequest
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
            'name' => 'required|min:10',
            'description' => 'required|min:10',
            'categoria' => 'required',
        ];
    }

    //para modificar en los mensaje de error el nombre del campo que se mostrará
    public function attributes()
    {
        return [ 'name' => 'nombre del curso', ];
    }

    //para modificar el mensaje completo de error
    //hay que indicar el mensaje por cada validación
    public function messages()
    {
        return [
            'description.required' => 'La descripción para dar de alta un nuevo curso es mandatory',
        ];
    }
}
