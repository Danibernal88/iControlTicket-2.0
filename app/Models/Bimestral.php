<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimestral extends Model
{
    use HasFactory;

    protected $table = 'bimestrales';

    protected $primaryKey = "idRPbimest";

    protected $fillable = [
       'idRPbimest',
        'nombreCDA',
        'fechaExpRPbimest',
        'fechaVtoRPbimest',
        'nroCertCDARPbimest',
        'descripcionRPbimest',
        'idVehiculo'
    ];

    public function vehiculos(){
        return $this->belongsTo(Vehiculo::class, 'idVehiculo', 'id');
    }

}
