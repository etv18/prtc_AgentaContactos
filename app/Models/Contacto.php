<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    //
    public function etiqueta()
    {
        return $this->belongsTo(Etiqueta::class, 'id');
    }
}
