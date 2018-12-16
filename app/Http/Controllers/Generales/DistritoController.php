<?php

namespace App\Http\Controllers\Generales;

use App\Distrito;
use App\Http\Controllers\ApiController;

class DistritoController extends ApiController
{
    public function index(){
        $distritos = Distrito::all();
        return $this->showAllwithouPaginate($distritos);
    }

    public function show(Distrito $distrito) {
        return $this->showOne($distrito);
    }
}
