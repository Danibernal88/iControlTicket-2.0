<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HojaVida extends Model
{
    use HasFactory;

    protected $table = 'hojasVida';

    protected $primaryKey = "idhv";

    public function getRouteKeyName()
    {
        return 'idhv'; 
    }   

    protected $fillable = [
        'estado',
        'empresaLab',
        'fecha_ing',
        'TipoContrato',
        'cargoHV',
        'tipoEmpl',
        'fechanto',
        'fechaDef',
        'tiposangre',
        'estadocivil',
        'nivelEstudio',
        'habilidades',
        'licencia',
        'categoria',
        'vigLicencia',
        'jefeInmediato',
        'fechaAfilSS',
        'EPS',
        'ARP',
        'FP',
        'CCF',
        'Cesantias',
        'EntBancaria',
        'TipoCuenta',
        'NroCuenta',
        'ultPagoSS',
        'notasHV',
        'rutaImgFoto',
        'rutaImgCedulaF',
        'rutaImgLicenciaF',
        'rutaImgCedulaP',
        'rutaImgLicenciaP',
        'rutaImgLMilitarF',
        'rutaImgLMilitarP',
        'idtercero'
    ];

    public function tercero(){
        return $this->belongsTo(Tercero::class, 'idtercero', 'idTerceros');
    }

    public function seguridadSocial()
    {
        return $this->hasMany(SeguridadSocial::class, 'idhv', 'idhv');
    }

    public function conductores(){
        return $this->hasMany(Conductor::class, 'idhv', 'idhv');
    }



}
