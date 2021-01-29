<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcela;
use App\Models\Zona;
use Illuminate\Support\Facades\DB;

class ParcelaController extends Controller
{
    public function index() 
    {
        $data['parcelas'] = DB::table('parcelas')->join('zonas','parcelas.zona_id','=','zonas.id')->select('parcelas.*','zonas.nombre as zona_nombre')->get();

        return view('parcela.all',$data);
    }

     public function create()
     {
          $data['zonas'] = Zona::all('id','nombre','imagen');
          return view("parcela.form",$data);
     }

     public function store(Request $r)
     {
          $parcela = new Parcela();
          $parcela->nombre = $r->nombre;
          $parcela->descripcion = $r->descripcion;
          $parcela->anyo_inicio = $r->anyo_inicio;
          $parcela->anyo_fin = $r->anyo_fin;
          $parcela->zona_id = $r->zona_id;
          $parcela->save();
          $id = Parcela::latest()->first()->id;
          if ($this->procesarImagen($_FILES['imagen'], $id) == "error") {
               $data["error"] = "No se ha podido subir la imagen.";
               $data["parcelas"] = Parcela::all();
               return view("parcela.all", $data);
          }
          return redirect()->route("parcela.index");
     }

     public function edit($id)
     {
          $data["parcela"] = Parcela::find($id);
          $data['zonas'] = Zona::all('id','nombre','imagen');
          return view("parcela.form", $data);
     }

     public function update(Request $r)
     {
          $parcela = Parcela::find($r->id);
          $parcela->nombre = $r->nombre;
          $parcela->descripcion = $r->descripcion;
          $parcela->anyo_inicio = $r->anyo_inicio;
          $parcela->anyo_fin = $r->anyo_fin;
          $parcela->zona_id = $r->zona_id;
          $parcela->save();

          if ($this->procesarImagen($_FILES['imagen'], $r->id) == "error") {
               $data["error"] = "No se ha podido subir la imagen.";
               $data["parcelas"] = Parcela::all();
               return view("parcela.all", $data);
          }


          return redirect()->route("parcela.index");
     }

     public function destroy($id)
     {
          $parcela = Parcela::find($id);
          $parcela->delete();
          return redirect()->route('parcela.index');
     }

     





     public function procesarImagen($imagen, $id_parcela)
     {

          $imagenBuena = "buena";
          if ($imagen["error"] != 4) {
               $tipo = $imagen['type'];
               $tamanyo = $imagen['size'];
               $temp = $imagen['tmp_name'];
               if (!((strpos($tipo, "jpeg") || (strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamanyo < 2000000)))) {
                    $imagenBuena = "error";
               } else {
                    $nombreImagen = $id_parcela . '.png';
                    if ($subida = move_uploaded_file($temp, 'img/parcelas/' . $nombreImagen)) {
                         $parcela = Parcela::find($id_parcela);
                         $parcela->imagen = $nombreImagen;
                         $parcela->save();
                    } else {
                         $imagenBuena = "error";
                    }
               }
          }

          return $imagenBuena;
     }
}
