<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Person;
use App\Employee;
use App\Rol;
use App\User;
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
        $employees = DB::table('people')
                      ->join('employees', 'employees.id', '=', 'people.peopleable_id')
                      ->where('peopleable_type','App\Employee')
                      ->get();

		echo json_encode($employees);
        
    }

    public function mostrarVista(){

        $employees = DB::table('people')
                      ->join('employees', 'employees.id', '=', 'people.peopleable_id')
                      ->where('peopleable_type','App\Employee')
                      ->get();
        //LOG
        $quien = 'id: '. Auth()->user()->id. ' name: '.Auth()->user()->name. ' email: '.Auth()->user()->email;
        $descripcion = 'obtener una lista de empleados';
        LogController::storeLog('GET','obtener','Employee',$quien,$descripcion);

        // echo '<pre>'; print_r($employees); echo '</pre>';

        return view('admin.empleados.index')->with(compact('employees'));
    }

    public function almacenarEmpleado(Request $request){
        // dd($request->request);
        //Creamos Empleado
        $employee = new Employee();
		$employee->type = null;
        $employee->save();
        //Asignamos Usuario
        $usuario=new User();
        $usuario->name=$request->nombre;
        $usuario->email = $request->email;
        $usuario->estado= 'a';
        $usuario->rol_id = $request->rol_id;
        $usuario->password=bcrypt($request->ci);
        $usuario->save();

        $user_id = User::all()->max('id');

		$employee->person()->create([
			'ci'=> $request->ci,
			'nombre'=>$request->nombre,
			'apellido'=>$request->apellido,
			'telefono'=>$request->telefono,
            'fecha_nacimiento'=>$request->fecha_nacimiento,
            'sexo'=>$request->sexo,
            'estado'=>'a',
            'user_id' => $user_id ,
        ]);
        //LOG
        $quien = 'id: '. Auth()->user()->id. ' name: '.Auth()->user()->name. ' email: '.Auth()->user()->email;
        $descripcion = 'almaceno al empleado: '. $request->nombre;
        LogController::storeLog('POST','almacenar','Employee',$quien,$descripcion);

        // echo '<pre>'; print_r($request->nombre ." " .$request->email. " ".$request->apellido); echo '</pre>';
        
        return redirect('/empleados');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $rols = Rol::all();
        //LOG
        $quien = 'id: '. Auth()->user()->id. ' name: '.Auth()->user()->name. ' email: '.Auth()->user()->email;
        $descripcion = 'Formulario para crear un empleado ';
        LogController::storeLog('GET','Crear','Employee',$quien,$descripcion);
        return view('admin.empleados.create')->with(compact('rols'));
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
            'sexo'=>$request->sexo,
            'estado'=>$request->estado
		]);

        // echo '<pre>'; print_r($employee->id); echo '</pre>';

        // echo '<pre>'; print_r($employee->id); echo '</pre>';

        $usuario=new Usuario();
        $usuario->nombre=$request->email;
        $usuario->contraseña=$request->ci;
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
        $employee = DB::table('people')
                      ->join('employees', 'employees.id', '=', 'people.peopleable_id')
                      ->where([
                        ['employees.id','=',$id],
                        ['peopleable_type','=','App\Employee']
                      ])
                      ->get()->first();  


		echo json_encode($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\movie  $movie
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request)
    {
        $employee = $this->getEmployee($request->id);

        //LOG
        $quien = 'id: '. Auth()->user()->id. ' name: '.Auth()->user()->name. ' email: '.Auth()->user()->email;
        $descripcion = 'obtener vista editar';
        LogController::storeLog('GET','obtener','Employee',$quien,$descripcion);

        // dd($employee);
        return view('admin.empleados.edit')->with(compact('employee'));        
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
		$employee->type = null;
		$employee->save();
		$employee->person()->update([
            'ci'=> $request->ci,
            'nombre'=>$request->nombre,
			'apellido'=>$request->apellido,
			'telefono'=>$request->telefono,
			'fecha_nacimiento'=>$request->fecha_nacimiento,
            'email'=>$request->email,
            'sexo'=>$request->sexo,
            'estado'=>$request->estado

        ]);
        //LOG
        $quien = 'id: '. Auth()->user()->id. ' name: '.Auth()->user()->name. ' email: '.Auth()->user()->email;
        $descripcion = 'se actualizara al empleado: '. $request->nombre;
        LogController::storeLog('POST','actualizar','Employee',$quien,$descripcion);

        return redirect('/empleados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $employee = Employee::find($id);		
		$employee->person()->update([
            'estado'=>'d'
		]);
        
    }

    public function getEmployee($id){

        return DB::table('people')
                      ->join('employees', 'employees.id', '=', 'people.peopleable_id')
                      ->where([
                        ['employees.id','=',$id],
                        ['peopleable_type','=','App\Employee']
                      ])->get()->first(); 

    }

}
