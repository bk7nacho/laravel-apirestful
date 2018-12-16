<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = "administradores";
    public $timestamps = false;
    protected $fillable = ['personas_id', 'users_id', 'estado'];


    public function personas(){
        return $this->belongsTo('App\Persona');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }

}
