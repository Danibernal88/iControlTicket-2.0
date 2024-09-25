<?php

namespace App\Http\Controllers;

use App\Http\Requests\PoblacionCreateRequest;
use App\Models\Poblacion;
use Illuminate\Http\Request;

class PoblacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poblaciones = Poblacion::orderBy('Departamento')->orderBy('Municipio')->orderBy('DANE', 'asc')->get();
        return view('poblaciones.index', compact('poblaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $poblaciones = Poblacion::orderBy('departamento')
                             ->orderBy('municipio')
                             ->get();
        $departamentos = Poblacion::select('departamento')->distinct()->orderBy('departamento')->get();

        return view('poblaciones.create', compact('departamentos', 'poblaciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PoblacionCreateRequest $request)
    {
        $departamento = $request->input('Departamento');
        $municipio = $request->input('Municipio');
        $centroPoblado = $request->input('CentroPoblado');

        $maxDane = Poblacion::where('Departamento', $departamento)
                         ->where('Municipio', $municipio)
                         ->max('DANE');

        $nuevoDane = $maxDane ? $maxDane + 1 : 1; 

        $debeAgregarCero = false;

        if ($maxDane) {
            // Convertir a cadena para verificar el primer carácter
            $maxDaneStr = (string)$maxDane;
            if (strlen($maxDaneStr) > 0 && $maxDaneStr[0] === '0') {
                $debeAgregarCero = true;
            }
        }

        if ($debeAgregarCero) {
            $nuevoDaneStr = str_pad($nuevoDane, strlen($maxDaneStr), '0', STR_PAD_LEFT); // Mantener la longitud del DANE existente
        } else {
            $nuevoDaneStr = (string)$nuevoDane; // Guardar como cadena sin ceros adicionales
        }

        Poblacion::create([
            'Departamento' => $departamento,
            'Municipio' => $municipio,
            'CentroPoblado' => $centroPoblado,
            'DANE' => $nuevoDaneStr,
        ]);

        return redirect()->route('poblaciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
