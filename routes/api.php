<?php

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
});

Route::group(['middleware' => 'auth:api'], function() {

    //Api para registro de usuario **** Pero esto se realizara desde otro controlador de usuarios
    //Route::post('signup', 'AuthController@signup');

    //Api para obtener el usuario logeado
//    Route::get('user', 'AuthController@user');

    //TipoDocumento
    Route::apiResource('tipodocumento','Generales\TipoDocumentoController');
    Route::get('tipodocumentoSinPaginar', 'Generales\TipoDocumentoController@ListarSinPaginar');

    //Profesion
    Route::apiResource('profesion','Generales\ProfesionController');
    Route::get('profesionSinPaginar', 'Generales\ProfesionController@ListarSinPaginar');

    //GradoEstudios
    Route::apiResource('gradoestudio','Generales\GradoEstudioController');
    Route::get('gradoestudioSinPaginar', 'Generales\GradoEstudioController@ListarSinPaginar');

    //Personas
    Route::apiResource('persona','Generales\PersonaController');
    Route::post('findPersonaByNumdocumento', 'Generales\PersonaController@findPersonaByNumdocumento');

    //Administradores
    Route::apiResource('administrador','User\AdministradorController');

    //Pais - Departamento - Provincias - Distrito
    Route::apiResource('paises', 'Generales\PaisController', ['only' => 'index']);
    Route::apiResource('departamentos', 'Generales\DepartamentoController', ['only' => ['index', 'show']]);
    Route::apiResource('provincias', 'Generales\ProvinciaController', ['only' => ['index', 'show']]);
    Route::apiResource('distritos', 'Generales\DistritoController', ['only' => ['index', 'show']]);
    Route::apiResource('departamentos.provincias', 'Generales\DepartamentoProvinciaController', ['only' => 'index']);
    Route::apiResource('provincias.distritos', 'Generales\ProvinciaDistritoController', ['only' => 'index']);

    //Usuario
    Route::apiResource('users','User\UserController');
    Route::get('findUsernameExists/{username}', 'User\UserController@findUsernameExist');
    Route::get('logout', 'AuthController@logout');



});
