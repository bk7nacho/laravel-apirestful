<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gradoestudio extends Model
{
    public $timestamps=false;
    protected $fillable=['nombre','descripcion'];
}
