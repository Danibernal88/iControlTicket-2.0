<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeguridadSocialCreateRequest extends FormRequest
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
            'vtoSegSocial'=>'required|date'
        ];
    }

    public function messages()
    {
        return [
            'vtoSegSocial.required' => 'Campo fecha vencimiento obligatorio.'
        ];
    }
}
