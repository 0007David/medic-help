<?php

namespace App\Http\Controllers;

use App\Employee;
use App\user;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employee=Employee::getEmployeeByUser();
        $groupsEmployee=Employee::find($employee)->groups()->get();
        return view('home',compact('groupsEmployee'));
        //->with("usuario",$usuarioactual);
    }
}
