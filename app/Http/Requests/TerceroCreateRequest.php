<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TerceroCreateRequest extends FormRequest
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
            'nDocumento'=>'required|string',
            'idCenPob'=>'required|string',
            'nombre1Tercero'=>'required|string'
        ];
    }

    public function messages()
    {
        return [
            'nDocumento.required' => 'Campo número documento obligatorio.',
            'idCenPob.required' => 'Debe seleccionar un departamento y ciudad validos.',
            'nombre1Tercero.required'=>'Campo nombre 1 documento obligatorio.'
        ];
    }
}
