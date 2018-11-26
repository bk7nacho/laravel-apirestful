<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipodocumento extends Model
{
    public $timestamps=false;
    protected $fillable=['nombre','descripcion'];
}
