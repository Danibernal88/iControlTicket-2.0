<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoCreateRequest extends FormRequest
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
            'placa'=>'required|string',
            'estado'=>'required|string'
        ];
    }

    public function messages()
    {
        return [
            'placa.required' => 'Campo placa obligatorio.',
            'estado.required' => 'Campo estado obligatorio.'
        ];
    }
}
