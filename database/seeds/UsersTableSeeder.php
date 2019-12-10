<?php

use App\Permiso;
use App\Rol;
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
        User::create([
        	'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=> bcrypt('12345678'),
            'estado'=> 'a'
        ]);
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
        
    }
}
