@extends('layouts.master')
@section('title', 'Zona particular')

@section('tituloAdministracion')
     <h1 class="tituloAdministracion">Zona particular</h1>
@endsection
    
@section('content')
     <input type="range" id="sliderAnyos" step="5" oninput="mapear(this.value)"><br>
     <span id="anyoSlider"></span>

     <script>

          var parcelas = [];
          var contador = 0;
          var anyo_minimo = Number.MAX_VALUE;
          var anyo_maximo = Number.MIN_VALUE;

          //Con este bucle, guardamos toda la información que nos devuelve el servidor en objetos de javascript. De esta manera, podremos montar los planos con puro javascript.

          @foreach ($parcelas as $parcela)

               var parcela{{$parcela->id}} = new Object();
               parcela{{$parcela->id}}.id = {{$parcela->id}};
               parcela{{$parcela->id}}.nombre = "{{$parcela->nombre}}";
               parcela{{$parcela->id}}.anyo_inicio = {{$parcela->anyo_inicio}};
               parcela{{$parcela->id}}.anyo_fin = {{$parcela->anyo_fin}};
               parcela{{$parcela->id}}.imagen = new Image();
               parcela{{$parcela->id}}.imagen.src = "{{asset('img/parcelas/'.$parcela->imagen)}}";
               parcela{{$parcela->id}}.canvas = document.createElement("canvas");
               parcela{{$parcela->id}}.ctx = parcela{{$parcela->id}}.canvas.getContext("2d");

               parcelas.push(parcela{{$parcela->id}});

          @endforeach

          for (i=0; i<parcelas.length; i++) {
               if (parcelas[i].anyo_inicio < anyo_minimo)
                    anyo_minimo = parcelas[i].anyo_inicio;
               if (parcelas[i].anyo_fin > anyo_maximo)
                    anyo_maximo = parcelas[i].anyo_fin;
          }

          document.getElementById("sliderAnyos").setAttribute("min",anyo_minimo);
          document.getElementById("sliderAnyos").setAttribute("max",anyo_maximo);
          document.getElementById("sliderAnyos").setAttribute("value",anyo_maximo);
          
          setTimeout(function() {
               mapear(2021);
          },100)


          //Función que dibuja los canvas en función del año seleccionado, el cual se le pasa como parámetro.
          function mapear(anyo_seleccionado) 
          {
               if (contador>0)
                    document.getElementById("ultCanvas").remove();

               document.getElementById("anyoSlider").innerHTML = anyo_seleccionado;
               contador++;

               for (i=0; i<parcelas.length; i++) 
               {
                    parcelas[i].ctx.clearRect(0, 0, parcelas[i].canvas.width, parcelas[i].canvas.height);

                    if (anyo_seleccionado >= parcelas[i].anyo_inicio && anyo_seleccionado <= parcelas[i].anyo_fin) 
                    {
                         parcelas[i].canvas.setAttribute("class","zona");
                         parcelas[i].canvas.setAttribute("id","canvas"+anyo_seleccionado + "_" +i);
                         parcelas[i].canvas.setAttribute("data-numeroMapa",""+contador);
                         parcelas[i].canvas.setAttribute("data-nombre",""+parcelas[i].nombre);
                         parcelas[i].canvas.width = parcelas[i].imagen.width;
                         parcelas[i].canvas.height = parcelas[i].imagen.height;

                         parcelas[i].ctx.drawImage(parcelas[i].imagen,0,0);

                         document.getElementById("content").appendChild(parcelas[i].canvas);
                    }
               }

               var ultCanvas = document.createElement("canvas");
               ultCanvas.setAttribute("class","zona");
               ultCanvas.setAttribute("id","ultCanvas");
               ultCanvas.setAttribute("onclick","verificarClick(event)");
               ultCanvas.width = parcelas[0].imagen.width;
               ultCanvas.height = parcelas[0].imagen.width;
               document.getElementById("content").appendChild(ultCanvas);
               
          }


          // Función encargada de saber si el click se ha hecho en un canvas o en otro.
          function verificarClick(event) {

               var rect = parcelas[1].canvas.getBoundingClientRect(); 
               var x = event.x - rect.left;
               var y = event.y - rect.top;

               for (i=0; i<parcelas.length; i++) 
               {
                    if (parcelas[i].ctx.getImageData(x, y, parcelas[i].canvas.width, parcelas[i].canvas.height).data[3] != 0) {

                         console.log(parcelas[i].nombre);

                    }
               }
          }
          

     </script>

     

@endsection