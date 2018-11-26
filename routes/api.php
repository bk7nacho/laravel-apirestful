<?php

use Illuminate\Http\Request;

//GradoEstudios
Route::resource('gradoestudios','Generales\GradoEstudioController', ['only' => ['index','show']]);

//TipoDocumento
Route::resource('tipodocumento','Generales\TipoDocumentoController', ['except' => ['create','edit']]);

//Profesion
Route::resource('profesiones','Generales\ProfesionController', ['only' => ['index','show']]);
