<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request) {
        // $user = DB::table('users')->where('email',$request->email)->first();
        $user = User::all()->where('email', $request->email)->first();
        $answer = Array();

        if ($user != null) {

            if (Hash::check($request->password, $user->password)) {

                $answer['type'] = true;
                $answer['message'] = 'Login correcto';
                $answer['data'] = $user;
            } else {

                $answer['type'] = false;
                $answer['message'] = "Existe usuario pero la contraseña incorrecta";
            }
        } else {
            $answer["type"] = false;
            $answer["message"] = "No existe Usuario";
        }

        return response()->json($answer);
    }

}
