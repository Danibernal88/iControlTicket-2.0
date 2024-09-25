<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poblacion extends Model
{
    use HasFactory;

    protected $table = 'poblaciones'; 

    protected $primaryKey = "idCenPob";

    protected $fillable = [
        'CentroPoblado',
        'Municipio',
        'Departamento',
        'DANE'
    ];

    public function empresas(){
        return $this->hasMany(Empresa::class, 'ciudad', 'idCenPob');
    }

    public function terceros(){
        return $this->hasMany(Tercero::class, 'idCenPob', 'idCenPob');
    }

    public function getRouteKeyName()
    {
        return 'idCenPob'; // O cualquier otro campo único que desees usar
    }

}
