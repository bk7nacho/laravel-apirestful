<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = new Rol();
        $rol->nombre = 'ADMIN';
        $rol->descripcion = 'ADMINISTRADOR DEL SISTEMA';
        $rol->save();

        $rol = new Rol();
        $rol->nombre = 'ALUMNO';
        $rol->descripcion = 'USUARIO ALUMNO';
        $rol->save();

        $rol = new Rol();
        $rol->nombre = 'DOCENTE';
        $rol->descripcion = 'USUARIO DOCENTE';
        $rol->save();

        $rol = new Rol();
        $rol->nombre = 'SECRETARIA';
        $rol->descripcion = 'USUARIO SECRETARIA';
        $rol->save();
    }
}
