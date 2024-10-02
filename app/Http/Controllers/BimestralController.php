<?php

namespace App\Http\Controllers;

use App\Models\Bimestral;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class BimestralController extends Controller
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
    public function store(Request $request)
    {
        $bimestral = new Bimestral($request->all());
        $bimestral->save();

        $vehiculo = Vehiculo::findOrFail($request->idVehiculo);

        return redirect()->route('vehiculos.edit', $vehiculo);
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
