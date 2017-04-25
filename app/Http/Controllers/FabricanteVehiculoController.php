<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fabricante;
use App\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FabricanteVehiculoController extends Controller {

	public function __construct()
	{
		$this->middleware('auth.basic',['only'=>['store','update','destroy']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


	public function index($id)
	{
		$fabricante = Fabricante::find($id);
		if (!$fabricante) 
		{
			return response()->json(['mensaje' => 'No se encuentra el fabricante', 'codigo' => 404],404);	
		}
		return response()->json(['datos'=> $fabricante->vehiculos()->get()],200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		return 'Mostrando formulario para agregar vehiculo al fabricante'.$id;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, $id)
	{

		if (!$request->input('color') || !$request->input('cilindraje') || !$request->input('potencia')        || !$request->input('peso')) 
		{
			return response()->json(['Mensaje' => 'NO pueden se procesar los valores', 'Codigo' => 422],422);
		}
		$fabricante = Fabricante::find($id);

		if (!$fabricante) 
		{
			return response()->json(['mensaje' => 'No existe el fabricante asociado','Codigo'=> 404],404);	
		}

		$fabricante->vehiculos()->create($request->all());

		return response()->json(['Mensaje' => 'Vehiculo insertado'],201);	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($idFabricante, $idVehiculo)
	{
		return 'mostrando vehiculo '.$idVehiculo .' del fabricante '.$idFabricante;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($idFabricante, $idVehiculo)
	{
		return "Mostrando formulario para editar el vehiculo ".$idVehiculo." del fabricante ".$idFabricante;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($idFabricante, $idVehiculo)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($idFabricante, $idVehiculo)
	{
		//
	}

}
