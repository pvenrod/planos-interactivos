<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zona;

class PrincipalController extends Controller
{
    public function index() 
    {
          $data['zonas'] = Zona::all();
          return view('principal.index',$data);
    }
}
