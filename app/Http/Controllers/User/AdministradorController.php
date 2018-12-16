<?php

namespace App\Http\Controllers\User;

use App\Administrador;
use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;

class AdministradorController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administradores = Administrador::with(['personas:id,nombres,paterno,materno','users:id,usuario'])
            ->get()
        ;
        return $this->showAll($administradores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $username = strtolower($request->get('username'));
        $password = $request->get('password');
        $personaid = $request->get('personaid');

        $user = new User();
        $user->usuario = $username;
        $user->password = bcrypt($password);
        $user->roles_id = 1;
        $user->save();


        $administrador = new Administrador();
        $administrador->personas_id = (int)$personaid;
        $administrador->users_id = (int)$user->id;
        $administrador->estado = 1;
        $administrador->save();

        $admin = Administrador::with(['personas','users'])->where('id',$administrador->id)->firstOrFail();

        return $this->showOne($admin);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Administrador $administrador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrador $administrador)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrador $administrador)
    {
        //
    }
}
