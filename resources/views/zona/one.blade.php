<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="apple-touch-icon" href="apple-touch-icon.jpg">

     <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/fontAwesome.css') }}">
     <link rel="stylesheet" href="{{ asset('css/light-box.css') }}">

     <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">


     <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
     <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
     <script>
               
          var parcelas = [];
          var contador = 0;
          var anyo_minimo = Number.MAX_VALUE;
          var anyo_maximo = Number.MIN_VALUE;

          $(document).ready(function() {
     
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
               
     
     
               // Función encargada de saber si el click se ha hecho en un canvas o en otro.
               
          })

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

                         document.getElementById("aquiVanLosCanvas").appendChild(parcelas[i].canvas);
                    }
               }

               var ultCanvas = document.createElement("canvas");
               ultCanvas.setAttribute("class","zona");
               ultCanvas.setAttribute("id","ultCanvas");
               ultCanvas.setAttribute("onclick","verificarClick(event)");
               ultCanvas.width = parcelas[0].imagen.width;
               ultCanvas.height = parcelas[0].imagen.height;
               document.getElementById("aquiVanLosCanvas").appendChild(ultCanvas);
               
               $(".pergamino").css("width",parcelas[0].imagen.width+400)
               $(".pergamino").css("height",parcelas[0].imagen.height+150)
               $("#aquiVanLosCanvas").css("width",parcelas[0].imagen.width)
               $("#aquiVanLosCanvas").css("height",parcelas[0].imagen.height)
          }

          function verificarClick(event) 
          {
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

     <style>
          .fondo_imagen {
               width: 100vw; 
               height: 100vh; 
               position: absolute; 
               z-index: -9999;
               background-image: url('{{asset("img/principal/almeria.jpg")}}');
               background-repeat: no-repeat;
               background-size: cover;
               top: 0;

          }
          .fondo_negro {
               width: 100vw; 
               height: 100vh; 
               background-color: black; 
               position: absolute; 
               z-index: -9998;
               opacity: 0.8;
               top: 0;
          }
          body {
               margin: 0;
               color: white;
          }
          .lateral {
               padding-left: 80px;
               padding-right: 30px;
               text-align: center;
          }
          .imagenMultimedia {
               font-size: 50px;
          }
          .imagenVacia {
               color: black;
               text-shadow: 0px 0px 3px white,0px 0px 3px white,0px 0px 3px white,0px 0px 3px white,0px 0px 3px white,0px 0px 3px white;
          }
          .imagenRellena {
               color: black;
               text-shadow: 0px 0px 30px gold,0px 0px 30px gold,0px 0px 30px gold;
               transition: 0.5s;
          }
          .imagenRellena:hover {
               text-shadow: 0px 0px 30px gold,0px 0px 30px gold,0px 0px 30px gold,0px 0px 30px gold;
               cursor: pointer;
          }
          .tablaGeneral {
               position: relative; 
               left: 50%; 
               transform: translateX(-50%); 
               padding: 30px;
               width: auto;
               top: 75px;
               border-collapse: collapse;
          }
          #aquiVanLosCanvas {
               position: relative;
          }
          .pergamino {
               background-image: url('{{asset("img/zonas/pergamino.png")}}');
               background-repeat: no-repeat;
               display: inline-flex;
               position: absolute;
               left: 50%;
               transform: translateX(-50%);
               background-size: 100% 100%;
               margin-top: 100px;
          }
          input[type=range] {
               width: 100%;
               margin: 11.2px 0;
               background-color: transparent;
               -webkit-appearance: none;
               margin-top: 100px;
          }
          input[type=range]:focus {
               outline: none;
          }
          input[type=range]::-webkit-slider-runnable-track {
               background: #ffb100;
               border: 0;
               border-radius: 24.6px;
               width: 100%;
               height: 7.6px;
               cursor: pointer;
          }
          input[type=range]::-webkit-slider-thumb {
               margin-top: -11.2px;
               width: 30px;
               height: 30px;
               background: #000000;
               border: 3.9px solid #ffffff;
               border-radius: 50px;
               cursor: pointer;
               -webkit-appearance: none;
          }
          input[type=range]:focus::-webkit-slider-runnable-track {
               background: #ffb60f;
          }
          input[type=range]::-moz-range-track {
               background: #ffb100;
               border: 0;
               border-radius: 24.6px;
               width: 100%;
               height: 7.6px;
               cursor: pointer;
          }
          input[type=range]::-moz-range-thumb {
               width: 30px;
               height: 30px;
               background: #000000;
               border: 3.9px solid #ffffff;
               border-radius: 50px;
               cursor: pointer;
          }
          input[type=range]::-ms-track {
               background: transparent;
               border-color: transparent;
               border-width: 11.2px 0;
               color: transparent;
               width: 100%;
               height: 7.6px;
               cursor: pointer;
          }
          input[type=range]::-ms-fill-lower {
               background: #f0a600;
               border: 0;
               border-radius: 49.2px;
          }
          input[type=range]::-ms-fill-upper {
               background: #ffb100;
               border: 0;
               border-radius: 49.2px;
          }
          input[type=range]::-ms-thumb {
               width: 30px;
               height: 30px;
               background: #000000;
               border: 3.9px solid #ffffff;
               border-radius: 50px;
               cursor: pointer;
               margin-top: 0px;
               /*Needed to keep the Edge thumb centred*/
          }
          input[type=range]:focus::-ms-fill-lower {
               background: #ffb100;
          }
          input[type=range]:focus::-ms-fill-upper {
               background: #ffb60f;
          }
          .tituloZona {
               font-size: 30px;
               font-family: 'Kanit';
               display: inline-block;
               left: 50%;
               transform: translateX(-50%);
               position: relative;
               margin-top: 20px;
          }
          /*TODO: Use one of the selectors from https://stackoverflow.com/a/20541859/7077589 and figure out
          how to remove the virtical space around the range input in IE*/
          @supports (-ms-ime-align:auto) {
               /* Pre-Chromium Edge only styles, selector taken from hhttps://stackoverflow.com/a/32202953/7077589 */
               input[type=range] {
                    margin: 0;
                    /*Edge starts the margin from the thumb, not the track as other browsers do*/
               }
          }

     </style>
     <title>{{$zona->nombre}}</title>
</head>
<body>
     <div id="content" style="height: 100vh">
          <a href="{{route('principal.index')}}">
               <img src="{{asset('img/principal/prev.png')}}" class="prev">
          </a>
          <span class="tituloZona">{{$zona->nombre}}</span>
          <div class="fondo_imagen"></div>
          <div class="fondo_negro"></div>
          <div class="pergamino">
               <table class="tablaGeneral">
                    <tr>
                         <td rowspan="3">
                              <div id="aquiVanLosCanvas">

                              </div>
                         </td>
                         <td class="lateral">
                              <i class="fa fa-video-camera imagenMultimedia imagenRellena" aria-hidden="true"></i>
                         </td>
                    </tr>
                    <tr>
                         <td class="lateral">
                              <i class="fa fa-camera imagenMultimedia imagenVacia" aria-hidden="true"></i>
                         </td>
                    </tr>
                    <tr>
                         <td class="lateral">
                              <i class="fa fa-microphone imagenMultimedia imagenVacia" aria-hidden="true"></i>
                         </td>
                    </tr>
                    <tr>
                         <td  style="text-align: center;" colspan="2">
                              <input type="range" id="sliderAnyos" step="5" oninput="mapear(this.value)"><br>
                              <span id="anyoSlider"></span>
                         </td>
                    </tr>
               </table>
          </div>
     </div>
</body>
</html>