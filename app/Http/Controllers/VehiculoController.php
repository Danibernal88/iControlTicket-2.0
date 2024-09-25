<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehiculoCreateRequest;
use App\Http\Requests\VehiculoUpdateRequest;
use App\Models\Tercero;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresaId = Auth::user()->empresa_id;

        $vehiculos = Vehiculo::with(['tercero' => function($query) use ($empresaId) {
            $query->where('IdEmpresa', $empresaId); 
        }])->get();

        return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $empresaId = Auth::user()->empresa_id;
        $terceros = Tercero::where('IdEmpresa', $empresaId)->get();

        return view('vehiculos.create', compact('terceros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculoCreateRequest $request)
    {
        $vehiculo = new Vehiculo($request->all());

        if($request->hasFile('fileImgVeh')){
            $filePath = $this->storeFile($request->file('fileImgVeh'), $vehiculo->placa, 'fileImgVeh');
            $vehiculo['rutaImgVeh'] = $filePath;
        }
        if($request->hasFile('fileMatricula1')){
            $filePath = $this->storeFile($request->file('fileMatricula1'), $vehiculo->placa, 'fileMatricula1');
            $vehiculo['rutaMatricula1'] = $filePath;
        }
        if($request->hasFile('fileMatricula2')){
            $filePath = $this->storeFile($request->file('fileMatricula2'), $vehiculo->placa, 'fileMatricula2');
            $vehiculo['rutaMatricula2'] = $filePath;
        }
        if($request->hasFile('fileTOperacion1')){
            $filePath = $this->storeFile($request->file('fileTOperacion1'), $vehiculo->placa, 'fileTOperacion1');
            $vehiculo['rutaTOperacion1'] = $filePath;
        }
        if($request->hasFile('fileTOperacion2')){
            $filePath = $this->storeFile($request->file('fileTOperacion2'), $vehiculo->placa, 'fileTOperacion2');
            $vehiculo['rutaTOperacion2'] = $filePath;
        }
        if($request->hasFile('fileCDA')){
            $filePath = $this->storeFile($request->file('fileCDA'), $vehiculo->placa, 'fileCDA');
            $vehiculo['rutaCDA'] = $filePath;
        }
        if($request->hasFile('fileSoat')){
            $filePath = $this->storeFile($request->file('fileSoat'), $vehiculo->placa, 'fileSoat');
            $vehiculo['rutaSoat'] = $filePath;
        }
        if($request->hasFile('fileRCC')){
            $filePath = $this->storeFile($request->file('fileRCC'), $vehiculo->placa, 'fileRCC');
            $vehiculo['rutaRCC'] = $filePath;
        }
        if($request->hasFile('fileRCE')){
            $filePath = $this->storeFile($request->file('fileRCE'), $vehiculo->placa, 'fileRCE');
            $vehiculo['rutaRCE'] = $filePath;
        }

        $vehiculo->save();
        return redirect()->route('vehiculos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculo $vehiculo)
    {
        $empresaId = Auth::user()->empresa_id;
        $terceros = Tercero::where('IdEmpresa', $empresaId)->get();

        return view('vehiculos.edit', compact('vehiculo', 'terceros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehiculoUpdateRequest $request, Vehiculo $vehiculo)
    {
        if($request->hasFile('fileImgVeh')){
            $filePath = $this->storeFile($request->file('fileImgVeh'), $vehiculo->placa, 'fileImgVeh');
            $vehiculo['rutaImgVeh'] = $filePath;
        }
        if($request->hasFile('fileMatricula1')){
            $filePath = $this->storeFile($request->file('fileMatricula1'), $vehiculo->placa, 'fileMatricula1');
            $vehiculo['rutaMatricula1'] = $filePath;
        }
        if($request->hasFile('fileMatricula2')){
            $filePath = $this->storeFile($request->file('fileMatricula2'), $vehiculo->placa, 'fileMatricula2');
            $vehiculo['rutaMatricula2'] = $filePath;
        }
        if($request->hasFile('fileTOperacion1')){
            $filePath = $this->storeFile($request->file('fileTOperacion1'), $vehiculo->placa, 'fileTOperacion1');
            $vehiculo['rutaTOperacion1'] = $filePath;
        }
        if($request->hasFile('fileTOperacion2')){
            $filePath = $this->storeFile($request->file('fileTOperacion2'), $vehiculo->placa, 'fileTOperacion2');
            $vehiculo['rutaTOperacion2'] = $filePath;
        }
        if($request->hasFile('fileCDA')){
            $filePath = $this->storeFile($request->file('fileCDA'), $vehiculo->placa, 'fileCDA');
            $vehiculo['rutaCDA'] = $filePath;
        }
        if($request->hasFile('fileSoat')){
            $filePath = $this->storeFile($request->file('fileSoat'), $vehiculo->placa, 'fileSoat');
            $vehiculo['rutaSoat'] = $filePath;
        }
        if($request->hasFile('fileRCC')){
            $filePath = $this->storeFile($request->file('fileRCC'), $vehiculo->placa, 'fileRCC');
            $vehiculo['rutaRCC'] = $filePath;
        }
        if($request->hasFile('fileRCE')){
            $filePath = $this->storeFile($request->file('fileRCE'), $vehiculo->placa, 'fileRCE');
            $vehiculo['rutaRCE'] = $filePath;
        }

        $vehiculo['vehEmpresa'] = $request->has('vehEmpresa') ? 1 : 0;
        $vehiculo['carct_TV'] = $request->has('carct_TV') ? 1 : 0;
        $vehiculo['carct_sonido'] = $request->has('carct_sonido') ? 1 : 0;
        $vehiculo['carct_banio'] = $request->has('carct_banio') ? 1 : 0;
        $vehiculo['carct_sillaReclin'] = $request->has('carct_sillaReclin') ? 1 : 0;
        $vehiculo['carct_aireAcond'] = $request->has('carct_aireAcond') ? 1 : 0;
        $vehiculo['carct_microf'] = $request->has('carct_microf') ? 1 : 0;
        $vehiculo['carct_GPS'] = $request->has('carct_GPS') ? 1 : 0;

        $vehiculo->update($request->all());
        return redirect()->route('vehiculos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    public function storeFile($file, $placa, $directory){
        try {
            if($file && $file->isValid()){
                $path = $file->store('docs_vehiculos/'.$placa.'/'.$directory, 'public');
                return $path;
            }
            
        } catch (\Exception $e){
            \Log::error("Error al almacenar el archivo: " . $e->getMessage());
            return null;
        }

        return null;
    }
}
