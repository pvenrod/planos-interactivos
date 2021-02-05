@extends('layouts.master')
@section('title', 'Lista de zonas')

@section('tituloAdministracion')
     <h1 class="tituloAdministracion">Zona particular</h1>
@endsection
    
@section('content')

     <script>

          var parcelas = [];
          var canvas = [];
          var ctx = [];
          var img = [];
          var nombre = [];

          @foreach ($parcelas as $parcela)

               var parcela{{$parcela->id}} = {
                    nombre: "{{$parcela->nombre}}",
                    imagen:"{{asset('img/parcelas/'.$parcela->imagen)}}"
               };

               parcelas.push(parcela{{$parcela->id}});

          @endforeach

          for (i = 0; i < parcelas.length; i++) {

               canvas[i] = document.createElement("canvas");
               canvas[i].setAttribute("class","zona");
               canvas[i].setAttribute("id","canvas"+i);
               canvas[i].width = 500;
               canvas[i].height = 500;

               ctx[i] = canvas[i].getContext("2d");

               img[i] = new Image();
               img[i].src = parcelas[i].imagen;

               nombre[i] = parcelas[i].nombre;

               document.body.appendChild(canvas[i]);


          }

          setTimeout(function() {

               for (i = 0; i < parcelas.length; i++) {

               ctx[i].drawImage(img[i],0,0);

               }

          },200)

          var ultCanvas = document.createElement("canvas");
          ultCanvas.setAttribute("class","zona");
          ultCanvas.setAttribute("id","ultCanvas");
          ultCanvas.setAttribute("onclick","verificarClick(event)");
          ultCanvas.width = 500;
          ultCanvas.height = 500;
          document.body.appendChild(ultCanvas);





          function verificarClick(event) {

               var rect = canvas[1].getBoundingClientRect(); 
               var x = event.x - rect.left;
               var y = event.y - rect.top;

               console.log(x + " x " + y)
               for (i=0; i<canvas.length; i++) {

                    if (ctx[i].getImageData(x, y, canvas[1].width, canvas[1].height).data[3] != 0) {


                         console.log(nombre[i]);

                    }

               }

          }
          

     </script>

@endsection