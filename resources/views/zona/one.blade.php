@extends('layouts.master')
@section('title', 'Zona particular')

@section('tituloAdministracion')
     <h1 class="tituloAdministracion">Zona particular</h1>
@endsection
    
@section('content')
     <input type="range" id="sliderAnyos" step="5" value="2021" oninput="mapear(this.value)"><br>
     <span id="anyoSlider"></span>

     <script>

          var contador = 0;
          var canvas = [];
          var canvasAntiguos = [];
          var ctx = [];
          var img = [];
          var nombre = []; 
          var anyo_inicio = [];
          var anyo_fin = [];
          var anyo_minimo, anyo_maximo; //Los límites del slider
          var canvas_width;
          var canvas_height;

          //Con este bucle, guardamos toda la información que nos devuelve el servidor en variables de javascript. De esta manera, podremos montar los planos con puro javascript.
          @foreach ($parcelas as $parcela)

               nombre.push("{{$parcela->nombre}}");
               anyo_inicio.push(parseInt("{{$parcela->anyo_inicio}}"));
               anyo_fin.push(parseInt("{{$parcela->anyo_fin}}"));

               imagenIndividual{{$parcela->id}} = new Image();
               imagenIndividual{{$parcela->id}}.src = "{{asset('img/parcelas/'.$parcela->imagen)}}";


               img.push(imagenIndividual{{$parcela->id}});

          @endforeach

          // Los tres puntos "desempaquetan" el array, ya que los métodos max y min de la clase Math no funcionan con arrays.
          anyo_minimo = Math.min(...anyo_inicio);
          anyo_maximo = Math.max(...anyo_fin);

          document.getElementById("sliderAnyos").setAttribute("min",anyo_minimo);
          document.getElementById("sliderAnyos").setAttribute("max",anyo_maximo);
          
          mapear(2021)
          //Función que dibuja los canvas en función del año seleccionado, el cual se le pasa como parámetro.
          function mapear(anyo_seleccionado) 
          {
               var tamanyo = canvas.length
               for (let index = 0; index < tamanyo; index++) {
                    canvas[index].remove();
                    canvas.slice(index,1);
                    
               }
               console.log(canvas)
               document.getElementById("anyoSlider").innerHTML = anyo_seleccionado;
               contador++;
               for (i = 0; i < nombre.length; i++) 
               {
                    if (anyo_seleccionado >= anyo_inicio[i] && anyo_seleccionado <= anyo_fin[i]) 
                    {
                         console.log(anyo_seleccionado + "    " + anyo_inicio[i] + "     " + anyo_fin[i])
                         canvas[i] = document.createElement("canvas");
                         canvas[i].setAttribute("class","zona");
                         canvas[i].setAttribute("id","canvas"+anyo_seleccionado + "_" +i);
                         canvas[i].setAttribute("data-mapa",""+contador);
                         canvas[i].setAttribute("data-nombre",""+nombre[i]);
                         canvas[i].width = 500 //img[0].width;
                         canvas[i].height = 500 //img[0].height;

                         canvasAntiguos.push(canvas[i]);

                         ctx[i] = canvas[i].getContext("2d");

                         document.getElementById("content").appendChild(canvas[i]);

                    }

                    setTimeout(function() 
                    {
                         for (i = 0; i < nombre.length; i++) 
                         {
                              ctx[i].drawImage(img[i],0,0);
                         }
                    },100)
               }

               var ultCanvas = document.createElement("canvas");
               ultCanvas.setAttribute("class","zona");
               ultCanvas.setAttribute("id","ultCanvas");
               ultCanvas.setAttribute("onclick","verificarClick(event)");
               ultCanvas.width = 500;
               ultCanvas.height = 500;
               document.getElementById("content").appendChild(ultCanvas);

               //console.log(canvas)
               /*setTimeout(function() {
                    if (canvas[0].dataset.mapa != "1") 
                    {
                         document.getElementById('ultCanvas').remove();
                         var vueltas = canvasAntiguos.length;
                         for (g=0; g<vueltas; g++) 
                         {
                              console.log("Intentando borrar " + canvasAntiguos[g].id)
                              //console.log(canvasAntiguos[g].id + "     " + canvasAntiguos[g].dataset.mapa);
                              if (parseInt(canvasAntiguos[g].dataset.mapa) < contador) 
                              {
                                   canvasAntiguos[g].remove();
                              }
                         }
                         
                    }
               },200)*/
               
               

          }

          // Función encargada de saber si el click se ha hecho en un canvas o en otro.
          function verificarClick(event) {

               var rect = canvas[1].getBoundingClientRect(); 
               var x = event.x - rect.left;
               var y = event.y - rect.top;

               for (i=0; i<canvas.length; i++) {

                    if (ctx[i].getImageData(x, y, canvas[1].width, canvas[1].height).data[3] != 0) {

                         console.log(canvas[i]);

                    }

               }

          }
          

     </script>

     

@endsection