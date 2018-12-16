<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table="roles";
    public $timestamps=false;
    protected $fillable=['nombre','descripcion'];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
