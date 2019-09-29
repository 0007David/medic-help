<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Employee;
use App\Usuario;

class EmployeeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Person::whereHasMorph('peopleable',[Employee::class])->get();

		echo json_encode($employees);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee();
		$employee->type = $request->type;
		$employee->save();
		$employee->person()->create([
			'ci'=> $request->ci,
			'nombre'=>$request->nombre,
			'apellido'=>$request->apellido,
			'telefono'=>$request->telefono,
            'fecha_nacimiento'=>$request->fecha_nacimiento,
            'email'=>$request->email,
            'sexo'=>$request->sexo
		]);
        $usuario=new Usuario();
        $usuario->nombre=$request->email;
        $usuario->contraseña=bcrypt($request->ci);
        $usuario->id_employee=$employee['id'];
        $usuario->save();
        echo json_encode($usuario);    
		echo json_encode($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);

		echo json_encode($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(movie $movie)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id  identificador del Empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
		$employee->type = $request->type;
		$employee->save();
		$employee->person()->update([
			'nombre'=>$request->nombre,
			'apellido'=>$request->apellido,
			'telefono'=>$request->telefono,
			'fecha_nacimiento'=>$request->fecha_nacimiento
		]);

		echo json_encode($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
