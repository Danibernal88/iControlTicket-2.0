<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identidad extends Model
{
    use HasFactory;

    protected $table = 'identidades'; 

    protected $primaryKey = "idIdentidad";

    protected $fillable = [
        'codIdentidad',
        'nombreIdentidad'
    ];

    public function terceros(){
        return $this->hasMany(Tercero::class, 'idIdentidad', 'idIdentidad');
    }

}
