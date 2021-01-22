<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    function index() {
        return view("auth.login");
    }

    function login(Request $r) {

        $userdata = array(
            'name'     => $r->usuario,
            'password'  => $r->contrasenya
        );

        if (Auth::attempt($userdata)) {

            $devolver = redirect()->route("user.index");
    
        } else {

            var_dump($userdata);

        }

        return $devolver;
    }
}
