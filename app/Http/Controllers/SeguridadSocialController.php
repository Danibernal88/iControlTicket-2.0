<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeguridadSocialCreateRequest;
use App\Models\SeguridadSocial;
use Illuminate\Http\Request;

class SeguridadSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeguridadSocialCreateRequest $request)
    {
        $hojaVidaIds = explode(',', $request['idhv']);

        foreach ($hojaVidaIds as $hojaVidaId) {
            SeguridadSocial::create([
                'fechaPago' => $request['fechaPago'],
                'periodoSegSocial' => $request['periodoSegSocial'],
                'vtoSegSocial' => $request['vtoSegSocial'],
                'idhv' => $hojaVidaId
            ]);
        }

        return redirect()->route('hojaVidas.index')->with('success', 'Seguridad Social creada correctamente.');
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
