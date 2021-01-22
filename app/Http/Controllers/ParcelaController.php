<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcela;

class ParcelaController extends Controller
{
    public function index() {
        $data['parcelas'] = Parcela::all();
        return view('parcela.all',$data);
    }
}
