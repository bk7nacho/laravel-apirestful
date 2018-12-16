<?php

namespace App\Http\Controllers\Generales;

use App\Http\Controllers\ApiController;
use App\User;

class RolUserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $roles = $user->roles;
        return $this->showAll($roles);
    }

}
