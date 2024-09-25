<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EmpresaUpdateRequest extends FormRequest
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
        $rules =  [
            'direccion'=>'required|string',
            'telefono'=>'required|string',
            'movil'=>'required|string',
            'email'=>'required|string',
            'web'=>'required|string',
            'codDirTerritorial'=>'required|string',
            'nroResolucionEmp'=>'required|string',
            'fechaHab'=>'required|date',
            'RLEmpresa'=>'required|string',
            'Regimen'=>'required|string',
            'Lema'=>'required|string',
            'nivelServ'=>'required|string',
            'habeasData'=>'required|string',
            'ciudad'=>'required|string'

        ];

        if ($this->input('logoISO') == "1" || $this->input('logoISO') == true) {

            $empresa = Auth::user()->empresa;
            
            if (empty($empresa->rutaCarpDocTER)) {
                $rules['rutaCarpDocTER'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:2048';
            } 

        } 

        return $rules;
        
    }

    public function messages()
    {
        return [
            'direccion.required' => 'Campo dirección obligatorio.',
            'telefono.required' => 'Campo teléfono obligatorio.',
            'movil.required' => 'Campo movil obligatorio.',
            'email.required' => 'Campo email obligatorio.',
            'web.required' => 'Campo web obligatorio.',
            'codDirTerritorial.required' => 'Campo codigo territorial obligatorio.',
            'nroResolucionEmp.required' => 'Campo número resolución obligatorio.',
            'fechaHab.required' => 'Campo fecha habilitación obligatorio.',
            'RLEmpresa.required' => 'Campo representante legal obligatorio.',
            'Regimen.required' => 'Campo regimen obligatorio.',
            'Lema.required' => 'Campo lema obligatorio.',
            'nivelServ.required' => 'Campo nivel servicio obligatorio.',
            'habeasData.required' => 'Campo habeas data obligatorio.',
            'ciudad.required' => 'Campo ciudad obligatorio.',
            'rutaCarpDocTER.required' => 'Se requiere subir un documento ISO si no hay uno guardado.'
        ];
    }
}

