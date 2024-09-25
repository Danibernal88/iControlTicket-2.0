<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';

    protected $fillable = [
        'placa',
        'NroInterno',
        'fechaAfil',
        'fechaDesafil',
        'estado',
        'emprAfil',
        'relacion',
        'nroContrAfil',
        'clase',
        'marca',
        'modelo',
        'combustible',
        'vehEmpresa',
        'tipoTransporte',
        'observaciones',
        'nroMatricula',
        'orgTransito',
        'fechaExpMatric',
        'linea',
        'cilindraje',
        'capacPjs',
        'color',
        'motor',
        'chasis',
        'nroTarjOper',
        'fechaExpTO',
        'fechaVtoTO',
        'nombreCDA',
        'nroCertCDA',
        'fechaVtoExtintor',
        'fechaExpCDA',
        'fechaVtoCDA',
        'aseguradoraSOAT',
        'nroSOAT',
        'fechaExpSOAT',
        'fechaVtoSOAT',
        'aseguradoraRCC',
        'nroRCC',
        'fechaExpRCC',
        'fechaVtoRCC',
        'aseguradoraRCE',
        'nroRCE',
        'fechaExpRCE',
        'fechaVtoRCE',
        'carct_TV',
        'carct_sonido',
        'carct_banio',
        'carct_sillaReclin',
        'carct_aireAcond',
        'carct_microf',
        'carct_GPS',
        'rutaImgVeh',
        'rutaMatricula1',
        'rutaMatricula2',
        'rutaTOperacion1',
        'rutaTOperacion2',
        'rutaCDA',
        'rutaSoat',
        'rutaRCC',
        'rutaRCE',
        'propietario'
    ];

    public function tercero(){
        return $this->belongsTo(Tercero::class, 'propietario', 'idTerceros');
    }
}
