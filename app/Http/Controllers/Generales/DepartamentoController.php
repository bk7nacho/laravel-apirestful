<?php

namespace App\Http\Controllers\Generales;

use App\Departamento;
use App\Http\Controllers\ApiController;

class DepartamentoController extends ApiController
{
    public function index(){
        $departamentos = Departamento::all();
        return $this->showAllwithouPaginate($departamentos);
    }

    public function show(Departamento $departamento) {
        return $this->showOne($departamento);
    }
}
