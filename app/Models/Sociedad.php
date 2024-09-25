<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sociedad extends Model
{
    use HasFactory;

    protected $table = 'sociedades'; 

    protected $primaryKey = "idSociedad";

    protected $fillable = [
        'nombreSociedad',
        'jerarquiaSociedad',
        'autoretenedor',
        'impCompra',
        'impVenta'
    ];

    public function terceros(){
        return $this->hasMany(Tercero::class, 'idSociedad', 'idSociedad');
    }
}
