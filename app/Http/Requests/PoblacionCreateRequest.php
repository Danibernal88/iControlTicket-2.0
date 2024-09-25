<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoblacionCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'Departamento'=>'required|string',
           'Municipio'=>'required|string',
           'CentroPoblado'=>'required|string'
        ];
    }

    public function messages()
    {
        return [
            'Departamento.required' => 'Campo departamento obligatorio.',
            'Municipio.required' => 'Campo municipio obligatorio.',
            'CentroPoblado.required' => 'Campo centro poblado obligatorio.'
        ];
    }
}
