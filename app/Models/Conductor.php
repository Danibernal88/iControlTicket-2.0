<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    use HasFactory;

    protected $table = 'conductores';

    protected $fillable = [
        'retirado',
         'idhv',
         'idVehiculo'
     ];

    public function vehiculo(){
        return $this->belongsTo(Vehiculo::class, 'idVehiculo', 'id');
    }

    public function hojaVida(){
        return $this->belongsTo(HojaVida::class, 'idhv', 'idhv');
    }

    
}
