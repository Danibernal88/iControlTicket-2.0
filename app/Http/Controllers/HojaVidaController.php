<?php

namespace App\Http\Controllers;

use App\Http\Requests\HojaVidaCreateRequest;
use App\Http\Requests\HojaVidaUpdateRequest;
use App\Models\Empresa;
use App\Models\HojaVida;
use App\Models\Tercero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HojaVidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresaId = Auth::user()->empresa_id;

        $hojasVidaTerceros = Empresa::with(['terceros.hojasVida.seguridadSocial' => function($query) {
            $query->orderBy('vtoSegSocial', 'desc')->limit(1); // Obtener solo la última fecha de vencimiento
        }])
        ->find($empresaId)
        ->terceros;

        return view('hojasVida.index', ['hojasVidaTerceros' => $hojasVidaTerceros->sortBy("nombreCompleto")]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresaId = Auth::user()->empresa_id;
        $terceros = Tercero::where('idEmpresa', $empresaId)->get();

        return view('hojasVida.create', ['terceros'=>$terceros->sortBy("nombreCompleto")]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hojaVida = new HojaVida($request->all());
        $hojaVida->save();
        return redirect()->route('hojaVidas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(HojaVida $hojaVida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HojaVida $hojaVida)
    {

        $empresaId = Auth::user()->empresa_id;

        $terceros = Tercero::where('idEmpresa', $empresaId)->get();

        $hojaVidaTercero = $hojaVida->tercero;

        return view('hojasVida.edit', ['hojaVida'=>$hojaVida, 'hojaVidaTercero'=>$hojaVidaTercero, 'terceros'=>$terceros->sortBy("nombreCompleto")]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HojaVida $hojaVida)
    {
        $hojaVida->update($request->all());
        return redirect()->route("hojaVidas.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
