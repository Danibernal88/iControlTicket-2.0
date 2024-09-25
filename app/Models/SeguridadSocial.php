<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguridadSocial extends Model
{
    use HasFactory;

    protected $table = 'seguridadesSocial';

    protected $primaryKey = "idSegSocial";

    protected $fillable = [
        'fechaPago',
        'periodoSegSocial',
        'vtoSegSocial',
        'idhv'
    ];

    public function hojaVida(){
        return $this->belongsTo(HojaVida::class, 'idhv', 'idhv');
    }
}
