<?php

namespace App\Http\Requests;

use App\Models\Contacto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContact extends FormRequest
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
        $contacto = Contacto::withTrashed()->where('tlf', '=', $this->input('tlf'))->first();

        if ($contacto !== null && $contacto->trashed()) {
            return [];
        }

        return [
            'nombre' => 'required|string',
            'tlf' => ['required', 'string', Rule::unique('contactos')->ignore($this->route('agenda'))],
        ];
    }
}
