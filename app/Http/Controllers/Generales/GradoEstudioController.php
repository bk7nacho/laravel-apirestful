<?php

namespace App\Http\Controllers\Generales;

use App\Gradoestudio;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class GradoEstudioController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gradoestudios = Gradoestudio::all();
        return $this->showAll($gradoestudios);
    }

    public function ListarSinPaginar(){
        $gradoestudio = Gradoestudio::all();
        return $this->showAllwithouPaginate($gradoestudio);
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

        $gradoestudio = Gradoestudio::create($request->all());

        return $this->showOne($gradoestudio);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gradoestudio $gradoestudio)
    {
        return $this->showOne($gradoestudio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gradoestudio $gradoestudio)
    {
        $gradoestudio->fill($request->only([
            'nombre',
            'descripcion',
        ]));

        if ($gradoestudio->isClean()) {
            return $this->errorResponse('Debe especificar al menos un valor diferente para actualizar', 422);
        }

        $gradoestudio->save();

        return $this->showOne($gradoestudio);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gradoestudio $gradoestudio)
    {
        $gradoestudio->delete();
        return $this->showOne($gradoestudio);
    }
}
