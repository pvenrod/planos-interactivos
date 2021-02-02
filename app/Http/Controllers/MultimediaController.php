<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Multimedia;
use SplFileInfo;

class MultimediaController extends Controller
{
     public function index($id)
     {
          $data['multimedias'] = DB::table('multimedia')->where('multimedia.parcela_id', '=', $id)->get();
          $data['parcela'] = DB::table('parcelas')->where('parcelas.id','=',$id)->first();

          return view('multimedia.all',$data);
     }

     public function create($id)
     {
          $data['tipos'] = array('audio','imagen','video');
          $data['parcela_id'] = $id;

          return view('multimedia.form',$data);
     }

     public function store(Request $r, $id)
     {
          $multimedia = new Multimedia();
          $multimedia->tipo = $r->tipo;
          $multimedia->parcela_id = $id;
          $multimedia->save();
          $idMultimedia = Multimedia::latest()->first()->id;
          if ($this->procesarImagen($_FILES['url'], $idMultimedia) == "error") {
               $data["error"] = "No se ha podido subir la imagen.";
               $data['multimedias'] = DB::table('multimedia')->where('multimedia.parcela_id', '=', $id)->get();
               return view("multimedia.all", $data);
          }

          return redirect()->route('multimedia.index',$id);
     }

     public function edit($id)
     {
          $data['multimedia'] = Multimedia::find($id);
          $data['tipos'] = array('audio','imagen','video');

          return view('multimedia.form',$data);

     }

     public function update(Request $r)
     {
          $multimedia = Multimedia::find($r->id);
          $multimedia->tipo = $r->tipo;
          $multimedia->save();

          if ($this->procesarImagen($_FILES['url'], $r->id) == "error") {
               $data["error"] = "No se ha podido subir la imagen.";
               $data['multimedias'] = DB::table('multimedia')->where('multimedia.parcela_id', '=', $r->id)->get();
               return view("multimedia.all", $data);
          }

          return redirect()->route('multimedia.index',$multimedia->parcela_id);
     }

     public function destroy($id)
     {
          $multimedia = Multimedia::find($id);
          $id_parcela = $multimedia->parcela_id;
          $multimedia->delete();
          return redirect()->route('multimedia.index',$id_parcela); 
     }




     public function procesarImagen($url, $id_multimedia)
     {

          $imagenBuena = "buena";
          if ($url["error"] != 4) {
               /*$tipo = $imagen['type'];
               $tamanyo = $imagen['size'];*/
               $temp = $url['tmp_name'];
               /*if (!((strpos($tipo, "jpeg") || (strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamanyo < 2000000)))) {
                    $imagenBuena = "error";
               } else {*/
                    $nombreImagen = $id_multimedia . '.' . pathinfo($url['name'], PATHINFO_EXTENSION);
                    if ($subida = move_uploaded_file($temp, 'img/multimedia/' . $nombreImagen)) {
                         $multimedia = Multimedia::find($id_multimedia);
                         $multimedia->url = $nombreImagen;
                         $multimedia->save();
                    } else {
                         $imagenBuena = "error";
                    }
               /*}*/
          }

          return $imagenBuena;
     }
}
