<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    protected $table="profesiones";
    public $timestamps=false;
    protected $fillable=['nombre','descripcion'];
}
