<?php

namespace App\Http\Controllers;

use App\Http\Requests\TerceroCreateRequest;
use App\Http\Requests\TerceroUpdateRequest;
use App\Models\Identidad;
use App\Models\Pais;
use App\Models\Poblacion;
use App\Models\Sociedad;
use App\Models\Tercero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TerceroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresaId = Auth::user()->empresa_id;
        $terceros = Tercero::where('idEmpresa', $empresaId)->get();

        return view('terceros.index', ['terceros'=> $terceros->sortBy("nombreCompleto")]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresa = Auth::user()->empresa;
        $poblaciones = Poblacion::orderBy('Departamento')->orderBy('CentroPoblado')->get();
        $departamentos = $poblaciones->groupBy('Departamento');
        $paises = Pais::orderBy('idPaises')->get();
        $sociedades = Sociedad::orderBy('idSociedad')->get();
        $identidades = Identidad::orderBy('idIdentidad')->get();

        return view('terceros.create', ['empresa'=>$empresa, 'departamentos' => $departamentos, 
                                        'paises' => $paises, 'sociedades' => $sociedades, 'poblaciones' => $poblaciones,
                                        'identidades' => $identidades]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TerceroCreateRequest $request)
    {
        $tercero = new Tercero($request->all());
        $empresa = Auth::user()->empresa;

        $tercero['autData'] = $request->has('autData') ? 1 : 0;

        $nombreCompleto = trim(
            ($request->input('nombre1Tercero') ? $request->input('nombre1Tercero') . ' ' : '') .
            ($request->input('nombre2Tercero') ? $request->input('nombre2Tercero') . ' ' : '') .
            ($request->input('apellido1Tercero') ? $request->input('apellido1Tercero') . ' ' : '') .
            ($request->input('apellido2Tercero') ? $request->input('apellido2Tercero') : '')
        );

        $tercero->nombreCompleto = $nombreCompleto;
        $tercero->IdEmpresa = $empresa->idEmpresa;

        $tercero->save();
        return redirect()->route('terceros.index');
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
    public function edit(Tercero $tercero)
    {
        $empresa = Auth::user()->empresa;
        $poblaciones = Poblacion::orderBy('Departamento')->orderBy('CentroPoblado')->get();
        $departamentos = $poblaciones->groupBy('Departamento');
        $paises = Pais::orderBy('idPaises')->get();
        $sociedades = Sociedad::orderBy('idSociedad')->get();
        $identidades = Identidad::orderBy('idIdentidad')->get();

        return view('terceros.edit',['tercero'=>$tercero, 'poblaciones' => $poblaciones, 'departamentos' => $departamentos,
                                        'paises' => $paises, 'sociedades' => $sociedades, 
                                        'identidades' => $identidades, 'empresa'=> $empresa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TerceroUpdateRequest $request, Tercero $tercero)
    {
        $nombreCompleto = trim(
            ($request->input('nombre1Tercero') ? $request->input('nombre1Tercero') . ' ' : '') .
            ($request->input('nombre2Tercero') ? $request->input('nombre2Tercero') . ' ' : '') .
            ($request->input('apellido1Tercero') ? $request->input('apellido1Tercero') . ' ' : '') .
            ($request->input('apellido2Tercero') ? $request->input('apellido2Tercero') : '')
        );

        $tercero['autData'] = $request->has('autData') ? 1 : 0;

        $empresa = Auth::user()->empresa;

        $tercero->nombreCompleto = $nombreCompleto;
        $tercero->IdEmpresa = $empresa->idEmpresa;

        $tercero->update($request->all());

        return redirect()->route('terceros.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tercero $tercero)
    {
        $tercero->delete();
        return back();
    }
}
