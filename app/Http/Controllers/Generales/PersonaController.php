<?php

namespace App\Http\Controllers\Generales;

use App\Http\Controllers\ApiController;
use App\Persona;
use Illuminate\Http\Request;

class PersonaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all();
        return $this->showAll($personas);
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
            'nombres' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'nacimiento' => 'required',
            'tipodocumentos_id' => 'required',
            'numdocumento' => 'required',
            'sexo' => 'required',
            'correopersonal' => 'required'
        ];

        $this->validate($request, $rules);

        $persona = Persona::create($request->all());

        return $this->showOne($persona);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        return $this->showOne($persona);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        $persona->fill($request->only([
            'nombres',
            'paterno',
            'materno',
            'numdocumento',
            'sexo',
            'fijo1',
            'fijo2',
            'celular1',
            'celular2',
            'nacimiento',
            'direccion',
            'correopersonal',
            'gradoestudios_id',
            'profesiones_id',
            'tipodocumentos_id',
            'paises_id',
            'departamento_id',
            'provincia_id',
            'distrito_id',
            'estado'
        ]));

        if ($persona->isClean()) {
            return $this->errorResponse('Debe especificar al menos un valor diferente para actualizar', 422);
        }

        $persona->save();

        return $this->showOne($persona);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();
        return $this->showOne($persona);
    }

    public function findPersonaByNumdocumento(Request $request){
        $persona = Persona::where('numdocumento', $request->get('numdocumento'))
            ->with(['departamentos','provincias','distritos','administradores'])
            ->firstOrFail();
        return $this->showOne($persona);
    }
}
