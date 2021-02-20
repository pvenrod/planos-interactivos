<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zona;
use App\Models\Parcela;

class ZonaController extends Controller
{
     /*public function __construct()
     {
          $this->middleware("auth");
     }*/

     public function index()
     {
          $data["zonas"] = Zona::all();
          return view("zona.all", $data);
     }

     public function show($id) 
     {
          $data["parcelas"] = Parcela::select()->where('zona_id', $id)->get();
          $data["zona"] = Zona::find($id);
          return view("zona.one", $data);
     }

     public function create()
     {
          return view("zona.form");
     }

     public function store(Request $r)
     {
          $zona = new Zona();
          $zona->nombre = $r->nombre;
          $zona->descripcion = $r->descripcion;
          $zona->save();

          $id = Zona::latest()->first()->id;

          if ($this->procesarImagen($_FILES['imagen'], $id) == "error") {
               $data["error"] = "No se ha podido subir la imagen.";
               $data["zonas"] = Zona::all();
               return view("zona.all", $data);
          }


          return redirect()->route("zona.index");
     }

     public function edit($id)
     {
          $data["zona"] = Zona::find($id);
          return view("zona.form", $data);
     }

     public function update(Request $r)
     {
          $zona = zona::find($r->id);
          $zona->nombre = $r->nombre;
          $zona->descripcion = $r->descripcion;
          $zona->save();

          if ($this->procesarImagen($_FILES['imagen'], $r->id) == "error") {
               $data["error"] = "No se ha podido subir la imagen.";
               $data["zonas"] = Zona::all();
               return view("zona.all", $data);
          }


          return redirect()->route("zona.index");
     }

     public function destroy($id)
     {
          $zona = Zona::find($id);
          $zona->delete();
          return redirect()->route('zona.index');
     }




     // Este método requiere dos parámetros: imagen (variable $_FILES["xxxxx"] y el id de la zona)
     public function procesarImagen($imagen, $id_zona)
     {

          $imagenBuena = "buena";
          if ($imagen["error"] != 4) {
               $tipo = $imagen['type'];
               $tamanyo = $imagen['size'];
               $temp = $imagen['tmp_name'];
               if (!((strpos($tipo, "jpeg") || (strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamanyo < 2000000)))) {
                    $imagenBuena = "error";
               } else {
                    $nombreImagen = $id_zona . '.png';
                    if ($subida = move_uploaded_file($temp, 'img/zonas/' . $nombreImagen)) {
                         $zona = Zona::find($id_zona);
                         $zona->imagen = $nombreImagen;
                         $zona->save();
                    } else {
                         $imagenBuena = "error";
                    }
               }
          }

          return $imagenBuena;
     }
}
