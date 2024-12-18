<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    //
    public $fillable = ['nombre'];

    public function contactos()
    {
        return $this->hasMany(Contacto::class, 'etiqueta_id');
    }
}
