<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Rol;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol_admin = Rol::where('nombre','ADMIN')->first();

        $user = new User();
        $user->usuario = 'admin';
        $user->password = bcrypt('secret');
        $user->roles_id = $rol_admin->id;
        $user->save();


    }
}
