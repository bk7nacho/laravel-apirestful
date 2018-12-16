<?php

namespace App\Http\Controllers\Generales;

use App\Http\Controllers\ApiController;
use App\Provincia;

class ProvinciaDistritoController extends ApiController
{
    public function index(Provincia $provincia)
    {
        $distritos = $provincia->distritos()->get();
        return $this->showAllwithouPaginate($distritos);
    }
}
