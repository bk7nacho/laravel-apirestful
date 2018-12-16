<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'nombres',
        'paterno',
        'materno',
        'numdocumento',
        'sexo',
        'fijo1',
        'fijo2',
        'celular1',
        'celular2',
        'nacimiento',
        'direccion',
        'correopersonal',
        'gradoestudios_id',
        'profesiones_id',
        'tipodocumentos_id',
        'paises_id',
        'departamentos_id',
        'provincias_id',
        'distritos_id',
        'estado'
    ];

    public function departamentos() {
        return $this->belongsTo('App\Departamento');
    }

    public function provincias() {
        return $this->belongsTo('App\Provincia');
    }

    public function distritos() {
        return $this->belongsTo('App\Distrito');
    }

    public function administradores() {
        return $this->hasOne('App\Administrador','personas_id');
    }
}
