<?php

namespace App\Http\Controllers\Generales;

use App\Http\Controllers\ApiController;
use App\Pais;

class PaisController extends ApiController
{
    public function index(){
        $paises = Pais::all();
        return $this->showAllwithouPaginate($paises);
    }

    public function show(Pais $pais) {
        return $this->showOne($pais);
    }
}
