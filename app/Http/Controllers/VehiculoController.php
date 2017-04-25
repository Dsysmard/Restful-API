<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return response()->json(['datos'=> Vehiculo::all()],200);
	}

	public function show($id)
	{
		$vehiculo = Vehiculo::find($id);
		if (!$vehiculo) 
		{
			return response()->json(['Mensaje' => 'NO se encuentra este vehiculo', 'Codigo' => 404],404);
		}
		return response()->json(['datos' => $vehiculo],200);
	}
}
