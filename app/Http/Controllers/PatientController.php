<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Person;

class PatientController extends Controller
{

	/**
	 * Metodo que muestra el contenido inicial hacia una vista
	 * @return view
	 */
	public function index(){

		$patients = Person::all();

		return $patients;
		// return "Hola";

		
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
	public function store(Request $request, Test $test){
	
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
	public function update(Request $request, Test $test){
	
	}

	/**
	 * Metodo que muestra los datos de un modelo de la BBDD
	 * @return 
	 */
	public function show(){
	
	}

	/**
	 * Metodo que elimina un dato del modelo de la BBDD
	 * @return 
	 */
	public function destroy(Test $test){
	
	}

}
