<?php

namespace App\Http\Controllers\Generales;


use App\Departamento;
use App\Http\Controllers\ApiController;

class DepartamentoProvinciaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Departamento $departamento)
    {
        $provincias = $departamento->provincias()->get();
        return $this->showAllwithouPaginate($provincias);
    }

}
