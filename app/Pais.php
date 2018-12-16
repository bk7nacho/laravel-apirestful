<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table="paises";
    public $timestamps=false;
    protected $fillable=['nombre','nacionalidad'];

    public function departamentos(){
        return $this->hasMany('App\Departamento');
    }

}
