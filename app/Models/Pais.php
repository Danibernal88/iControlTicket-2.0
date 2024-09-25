<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'paises'; 

    protected $primaryKey = "idPaises";

    protected $fillable = [
        'nombrePais'
    ];

    public function terceros(){
        return $this->hasMany(Tercero::class, 'idPaises', 'idPaises');
    }
}
