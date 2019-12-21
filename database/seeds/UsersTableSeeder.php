<?php

use App\Employee;
use App\Especialidad;
use App\Patient;
use App\Permiso;
use App\Rol;
use App\Service;
use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permiso::create(['nombre'=> 'Dashboard']);
        Permiso::create(['nombre'=> 'Documentos']);
        Permiso::create(['nombre'=> 'Grupos']);
        Permiso::create(['nombre'=> 'Usuarios']);
        Permiso::create(['nombre'=> 'Reportes']);
        Permiso::create(['nombre'=> 'Configuracion']);
        Permiso::create(['nombre'=> 'Temas']);
        Rol::create(['nombre'=>'Admin', 'estado'=>'a']);
        Rol::create(['nombre'=>'Empleado', 'estado'=>'a']);
        Rol::create(['nombre'=>'Paciente', 'estado'=>'a']);

        User::create([
        	'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=> bcrypt('12345678'),
            'estado'=> 'a',
            'rol_id'=> 1
        ]);
        //-----------------------------------------------
    
        Employee::create(['type'=>null])->person()->create(["ci"=>"19283654","nombre"=>"Señor X","apellido"=>"Camargo","telefono"=>"7489392","fecha_nacimiento"=> "1980-12-14 00:46:48","sexo"=>"m","estado"=>"a","user_id"=>User::all()->max('id')]);
        
        User::create([
        	'name'=>'cristian',
            'email'=>'cristian@gmail.com',
            'password'=> bcrypt('12345678'),
            'estado'=> 'a',
            'rol_id'=> 2
        ]);
        Employee::create(['type'=>null])->person()->create(["ci"=>"127492743","nombre"=>"Cristian","apellido"=>"Molina","telefono"=>"7489554","fecha_nacimiento"=> "1997-12-14 00:46:48","sexo"=>"m","estado"=>"a","user_id"=>User::all()->max('id')]);
        
        User::create([
        	'name'=>'Juan Carlos',
            'email'=>'juan@gmail.com',
            'password'=> bcrypt('12345678'),
            'estado'=> 'a',
            'rol_id'=> 3
        ]);
        Patient::create(['nro_seguro'=>"384935"])->person()->create(["ci"=>"93856934","nombre"=>"Juan Carlos","apellido"=>"Salvatierra","telefono"=>"7489554","fecha_nacimiento"=> "1987-12-14 00:46:48","sexo"=>"m","estado"=>"a","user_id"=>User::all()->max('id')]);
        
        //Especialidad
        Especialidad::create(["nombre"=>"Medicina aeroespacial","status"=>true]);
        Especialidad::create(["nombre"=>"Medicina del deporte","status"=>true]);
        Especialidad::create(["nombre"=>"Neumología","status"=>true]);
        Especialidad::create(["nombre"=>"Reumatología","status"=>true]);
        Especialidad::create(["nombre"=>"Papanicolado","status"=>true]);
        Especialidad::create(["nombre"=>"Oncología médica","status"=>true]);
        Especialidad::create(["nombre"=>"Gastroenterología","status"=>true]);
        Especialidad::create(["nombre"=>"Cardiología","status"=>true]);
        Especialidad::create(["nombre"=>"Pediatría","status"=>true]);
        Especialidad::create(["nombre"=>"Endocrinología","status"=>true]);
        
        //Servicios
        Service::create(["nombre"=>"Rayos x"]);
        Service::create(["nombre"=>"Mamografia"]);
        Service::create(["nombre"=>"Ecografía"]);
        Service::create(["nombre"=>"Laboratorios"]);
        Service::create(["nombre"=>"Cardiología"]);
        Service::create(["nombre"=>"Consultas"]);

    }
}
