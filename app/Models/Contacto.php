<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    //
    public $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'email',
        'etiqueta_id',
        'trabajo',
        'puesto_trabajo',
        'nota',
    ];
    public function etiqueta()
    {
        return $this->belongsTo(Etiqueta::class, 'etiqueta_id');
    }
}
