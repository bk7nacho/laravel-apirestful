<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table='provincias';
    public $timestamps=false;
    protected $fillable=['provincia','departamentos_id'];

    public function distritos()
    {
        return $this->hasMany('App\Distrito', 'provincias_id');
    }

    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }
}
