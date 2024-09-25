<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Http\Requests\EmpresaUpdateRequest;
use App\Models\Empresa;
use App\Models\Poblacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class EmpresaController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
        $empresa = Auth::user()->empresa;
        //dd(Auth::user());
        return view('empresas.index', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $empresa = Auth::user()->empresa;
        $poblaciones = Poblacion::orderBy('Departamento')->orderBy('Municipio')->orderBy('CentroPoblado')->get();
        return view('empresas.edit', compact('empresa', 'poblaciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmpresaUpdateRequest $request)
    {
        $empresa = Auth::user()->empresa;
        $data = $request->all();
        $data['logoISO'] = $request->has('logoISO') ? true : false;

        if($request->hasFile('foto')){
            try {
                if ($empresa->foto) {
                    Storage::disk('public')->delete( $empresa->foto);
                }
                $path = $request->file('foto')->store('logo_empresa/'.$empresa->nombre ,'public');
                $data['foto'] = $path;
                
            } catch (\Exception $e){
                return redirect()->route('empresa.show')->withErrors(['foto' => 'Error al subir la imagen.']);
            } 
        } else {
            $data['foto'] = $empresa->foto;
        }

        if($request->hasFile('rutaCarpDocTER')){
            try {
                if ($empresa->rutaCarpDocTER) {
                    Storage::disk('public')->delete( $empresa->rutaCarpDocTER);
                }
                $path = $request->file('rutaCarpDocTER')->store('logo_iso/'.$empresa->nombre,'public');
                $data['rutaCarpDocTER'] = $path;
                
            } catch (\Exception $e){
                return redirect()->route('empresa.show')->withErrors(['foto' => 'Error al subir la imagen.']);
            } 
        }
        
        $empresa->update($data);
        
        return redirect()->route('empresa.show')->with('success', 'Empresa actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
