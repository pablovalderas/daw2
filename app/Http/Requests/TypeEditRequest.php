<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeEditRequest extends FormRequest
{

    function attributes() {
        return [
            'nombre' => 'nombre del tipo',
            'descripcion' => 'descripcion del tipo',
        ];
    }
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    function messages() {
        $max = 'El campo :attribute no puede tener más de :max caracteres';
        $min = 'El campo :attribute no puede tener menos de :min caracteres';
        $required = 'El campo :attribute es obligatorio';

        return [
            'nombre.max'      => $max,
            'nombre.min'      => $min,
            'nombre.required' => $required,
            'descripcion.min'      => $min,
            'descripcion.required' => $required,
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required|min:2|max:100',
            'descripcion' => 'required|min:2',
        ];
    }
}
