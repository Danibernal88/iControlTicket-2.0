<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas'; 

    protected $primaryKey = "idEmpresa";

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'movil',
        'email',
        'web',
        'codDirTerritorial',
        'nroResolucionEmp',
        'fechaHab',
        'foto',
        'RLEmpresa',
        'NitEmpresa',
        'Regimen',
        'Lema',
        'nivelServ',
        'rutaCarpDocHV',
        'rutaCarpDocVEH',
        'rutaCarpDocTER',
        'logoISO',
        'habeasData',
        'ciudad'
    ];

    public function poblaciones(){
        return $this->belongsTo(Poblacion::class, 'ciudad', 'idCenPob');
    }

    public function terceros(){
        return $this->hasMany(Tercero::class, 'IdEmpresa', 'idEmpresa');
    }

    public function usuarios()
    {
        return $this->hasMany(User::class, 'empresa_id', 'idEmpresa');
    }

}
