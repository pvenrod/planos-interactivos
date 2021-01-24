<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
{
    function index() {

        if (!(session()->has("user"))) {

            return view("auth.login");

        } else {

            return redirect()->route("user.index");

        }

    }

    function login(Request $r) {

        if (!(session()->has("user"))) {

            $objetoUsuario = User::select('id')->where('email', $r->email)->first(); //Recoge el id del usuario (email) introducido.

            if (!empty($objetoUsuario->id)) {

                $user = User::find($objetoUsuario->id); //Recoge el usuario de la BD a partir de su id.

                if (md5($r->password) == $user->password) {

                    session()->put("user",$r->usuario);
                    return redirect()->route("user.index");

                } else {

                    return $this->loginError("Contraseña incorrecta.");

                }

            } else {

                return $this->loginError("El usuario no existe.");

            }

        } else {

            return redirect()->route("user.index");

        }

    }

    function loginError($error) {
        $data["error"] = $error;
        return view("auth.login",$data);
    }

    function logout() {

        if (session()->has("user")) {
            
            session()->pull("user");

        }

        return redirect()->route("auth.index");

    }
}
