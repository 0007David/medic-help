<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Patient;
use App\Person;
use Carbon;

class PatientController extends Controller
{

	/**
	 * Metodo que muestra el contenido inicial hacia una vista
	 * @return view
	 */
	public function index(){

		$patients = DB::table('people')
                      ->join('patients', 'patients.id', '=', 'people.peopleable_id')
                      ->get(); 
		
		echo json_encode($patients);
		

		
	}

	/**
	 * Muestra el formulario donde insertar un datos a un modelo de la BBDD
	 * @return 
	 */
	public function create(){

	}

	/**
	 * Metodo que inserta los datos de un modelo de la BBDD
	 * @return 
	 */
	public function store(Request $request){

		$patient = new Patient();
		$patient->nro_seguro = $request->nro_seguro;
		$patient->save();
		$patient->person()->create([
			'ci'=> $request->ci,
			'nombre'=>$request->nombre,
			'apellido'=>$request->apellido,
			'telefono'=>$request->telefono,
			'fecha_nacimiento'=>$request->fecha_nacimiento,
			'email'=>$request->email,
            'sexo'=>$request->sexo
		]);

		echo json_encode($patient);


	
	}

	/**
	 * Metodo que devuelve el formulario para editar los datos de un modelo de la BBDD
	 * @return 
	 */
	public function edit(){
	
	}

	/**
	 * Metodo que actualiza los datos de un modelo de la BBDD
	 * @return 
	 */
	public function update(Request $request, $id){

		$patient = Patient::find($id);
		$patient->nro_seguro = $request->nro_seguro;
		$patient->save();
		$patient->person()->create([
			'ci'=> $request->ci,
			'nombre'=>$request->nombre,
			'apellido'=>$request->apellido,
			'telefono'=>$request->telefono,
			'fecha_nacimiento'=>$request->fecha_nacimiento
		]);

		echo json_encode($patient);
	
	}

	/**
	 * Metodo que muestra los datos de un modelo de la BBDD
	 * @return 
	 */
	public function show($id){
		$patient = Patient::find($id);

		echo json_encode($patient);
	}

	/**
	 * Metodo que elimina un dato del modelo de la BBDD
	 * @return 
	 */
	public function destroy($id){
	
	}

}
