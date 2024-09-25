<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tercero extends Model
{
    use HasFactory;

    protected $table = 'terceros'; 

    protected $primaryKey = "idTerceros";


    protected $fillable = [
        'nDocumento',
        'dvTercero',
        'naturalezaTercero',
        'nombre1Tercero',
        'nombre2Tercero',
        'apellido1Tercero',
        'apellido2Tercero',
        'nombreCompleto',
        'direccionTercero',
        'telefonoTercero',
        'movilTercero',
        'contactoTercero',
        'ceduContactoTercero',
        'direccionContacto',
        'telefonoContacto',
        'mailTercero',
        'autData',
        'tipoTercero',
        'obsTercero',
        'rutaRut',
        'IdEmpresa',
        'idIdentidad',
        'idSociedad',
        'idCenPob',
        'idPaises'
    ];

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'IdEmpresa', 'idEmpresa');
    }

    public function identidad(){
        return $this->belongsTo(Identidad::class, 'idIdentidad', 'idIdentidad');
    }

    public function sociedad(){
        return $this->belongsTo(Sociedad::class, 'idSociedad', 'idSociedad');
    }

    public function poblacion(){
        return $this->belongsTo(Poblacion::class, 'idCenPob', 'idCenPob');
    }

    public function pais(){
        return $this->belongsTo(Pais::class, 'idPaises', 'idPaises');
    }

    public function hojasVida()
    {
        return $this->hasMany(HojaVida::class, 'idtercero', 'idTerceros');
    }

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class);
    }
}
