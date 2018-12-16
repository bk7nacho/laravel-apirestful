<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    public $timestamps=false;
    protected $fillable=['distrito','provincias_id'];

    public function provincia()
    {
        return $this->belongsTo('App\Provincia');
    }
}
