<?php

namespace App\Http\Controllers\Generales;

use App\Provincia;
use App\Http\Controllers\ApiController;

class ProvinciaController extends ApiController
{
    public function index(){
        $provincias = Provincia::all();
        return $this->showAllwithouPaginate($provincias);
    }

    public function show(Provincia $provincia) {
        return $this->showOne($provincia);
    }
}
