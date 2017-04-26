<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(array('prefix' => 'api/v1.1'), function(){
Route::resource('vehiculos','VehiculoController',['only' => ['index','show']]);
Route::resource('fabricantes','FabricanteController', ['except' => ['edit','create']]);
Route::resource('fabricantes.vehiculos','FabricanteVehiculoController', ['except' => ['show', 'edit', 'create']]);
});


Route::pattern('inexistentes', '.*');

Route::any('/{inexistentes}', function
	()
	{
		return response()->json(['mesaje' => 'Rutas o metodos incorrectos :', 'Codigo' => 400],400);
	}
	);


