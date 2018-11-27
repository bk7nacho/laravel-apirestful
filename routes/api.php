<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
});

Route::group(['middleware' => 'auth:api'], function() {

    //Api para registro de usuario **** Pero esto se realizara desde otro controlador de usuarios
    //Route::post('signup', 'AuthController@signup');

    //Api para logout de usuario
    Route::get('logout', 'AuthController@logout');

    //Api para obtener el usuario logeado
    Route::get('user', 'AuthController@user');

    //TipoDocumento
    Route::resource('tipodocumento','Generales\TipoDocumentoController', ['except' => ['create','edit']]);

    //Profesion
    Route::resource('profesiones','Generales\ProfesionController', ['only' => ['index','show']]);

    //GradoEstudios
    Route::resource('gradoestudios','Generales\GradoEstudioController', ['only' => ['index','show']]);

});
