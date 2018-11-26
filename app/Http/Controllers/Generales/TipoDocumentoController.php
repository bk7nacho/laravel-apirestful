<?php

namespace App\Http\Controllers\Generales;

use App\Http\Controllers\ApiController;
use App\Tipodocumento;
use Illuminate\Http\Request;

class TipoDocumentoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipodoc = Tipodocumento::all();
        return $this->showAll($tipodoc);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = $request->all();
        $model =Tipodocumento::create($campos);
        return $this->showOne($model);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tipodocumento $tipodocumento)
    {
        return $this->showOne($tipodocumento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipodocumento $tipodocumento)
    {
        $tipodocumento->delete();
        return $this->showOne($tipodocumento);
    }
}
