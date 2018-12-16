<?php

namespace App\Http\Controllers\Generales;

use App\Http\Controllers\ApiController;
use App\Profesion;
use Illuminate\Http\Request;

class ProfesionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesion = Profesion::all();
        return $this->showAll($profesion);
    }

    public function ListarSinPaginar(){
        $profesion = Profesion::all();
        return $this->showAllwithouPaginate($profesion);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required'
        ];

        $this->validate($request, $rules);

        $profesion = Profesion::create($request->all());

        return $this->showOne($profesion);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Profesion $profesion)
    {
        return $this->showOne($profesion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesion $profesion)
    {
        $profesion->fill($request->only([
            'nombre',
            'descripcion',
        ]));

        if ($profesion->isClean()) {
            return $this->errorResponse('Debe especificar al menos un valor diferente para actualizar', 422);
        }

        $profesion->save();

        return $this->showOne($profesion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesion $profesion)
    {
        $profesion->delete();
        return $this->showOne($profesion);
    }
}
