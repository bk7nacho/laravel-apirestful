<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';
    public $timestamps = false;
    protected $fillable = ['departamento', 'paises_id'];

    public function provincias()
    {
        return $this->hasMany('App\Provincia', 'departamentos_id');
    }

    public function pais()
    {
        return $this->belongsTo('App\Paises');
    }

}
