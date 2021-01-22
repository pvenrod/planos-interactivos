<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class UserController extends Controller
{
   public function index() {
       $data["usuarios"] = User::all();
       return view("user.all",$data);
   }

   public function create() {
        return view("user.form");
   }

   public function store(Request $r) {
        $user = new User();
        $user->name = $r->usuario;
        $user->email = $r->email;
        $user->password = $r->contrasenya1;
        $user->save();
        return redirect()->route("user.index");
   }

   public function edit($id) {
        $data["usuario"] = User::find($id);
        return view("user.form",$data);
   }

   public function update(Request $r) {
     $user = User::find($r->id);
     $user->name = $r->usuario;
     $user->email = $r->email;
     if ($r->contrasenya1 != "") {
          $user->password = $r->contrasenya1;
     }
     $user->save();
     return redirect()->route("user.index");
}

   public function destroy($id) {
     $user = User::find($id);
     $user->delete();
     return redirect()->route('user.index');
   }
}
