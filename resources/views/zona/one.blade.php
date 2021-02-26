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
          var multimedias = [];
          var contador = 0;
          var anyo_minimo = Number.MAX_VALUE;
          var anyo_maximo = Number.MIN_VALUE;
          var botonAudio;
          var botonVideo;
          var botonImagen;

          $(document).ready(function() {

               setTimeout(function() {
                    $(".fondoLogo").slideUp(200);
               },2500)

               setTimeout(function() {
                    $("body").css("overflow-y","scroll");
               },2700)
     
               //Con este bucle, guardamos toda la información que nos devuelve el servidor en objetos de javascript. De esta manera, podremos montar los planos con puro javascript.
     
               @foreach ($parcelas as $parcela)
     
                    var parcela{{$parcela->id}} = new Object();
                    parcela{{$parcela->id}}.id = {{$parcela->id}};
                    parcela{{$parcela->id}}.nombre = "{{$parcela->nombre}}";
                    parcela{{$parcela->id}}.descripcion = "{{$parcela->descripcion}}";
                    parcela{{$parcela->id}}.anyo_inicio = {{$parcela->anyo_inicio}};
                    parcela{{$parcela->id}}.anyo_fin = {{$parcela->anyo_fin}};
                    parcela{{$parcela->id}}.imagen = new Image();
                    parcela{{$parcela->id}}.imagen.src = "{{asset('img/parcelas/'.$parcela->imagen)}}";
                    parcela{{$parcela->id}}.canvas = document.createElement("canvas");
                    parcela{{$parcela->id}}.ctx = parcela{{$parcela->id}}.canvas.getContext("2d");
                    parcela{{ $parcela->id }}.multimedia = [];
     
                    parcelas.push(parcela{{$parcela->id}});
     
               @endforeach

               @foreach ($multimedias as $multimedia)
                    var multimedia{{ $multimedia->id }} = new Object();
                    multimedia{{ $multimedia->id }}.id = {{ $multimedia->id }};
                    @switch($multimedia->tipo)
                        @case('audio')
                            multimedia{{ $multimedia->id }}.url = document.createElement('audio')
                            @break;
                        @case('video')
                            multimedia{{ $multimedia->id }}.url = document.createElement('video')
                            @break;
                        @case('imagen')
                            multimedia{{ $multimedia->id }}.url = document.createElement('img')
                            @break;
                    @endswitch
                    multimedia{{ $multimedia->id }}.url.setAttribute('src',"{{asset('img/multimedia/'.$multimedia->url)}}")
                    
                    multimedia{{ $multimedia->id }}.parcela_id = {{ $multimedia->parcela_id }};
                    multimedia{{ $multimedia->id }}.tipo = '{{ $multimedia->tipo }}';
                    multimedias.push(multimedia{{ $multimedia->id }})
               @endforeach
     
               for (i=0; i<parcelas.length; i++) {
                    if (parcelas[i].anyo_inicio < anyo_minimo)
                         anyo_minimo = parcelas[i].anyo_inicio;
                    if (parcelas[i].anyo_fin > anyo_maximo)
                         anyo_maximo = parcelas[i].anyo_fin;
               }

               for (let i = 0; i < parcelas.length; i++) {
                   for (let j = 0; j < multimedias.length; j++) {
                       if (parcelas[i].id == multimedias[j].parcela_id) {
                           parcelas[i].multimedia.push(multimedias[j])
                       }
                   }
               }
     
               $('#sliderAnyos').attr('min',anyo_minimo);
               $('#sliderAnyos').attr('max',anyo_maximo);
               $('#sliderAnyos').attr('value',anyo_maximo);
               
               setTimeout(function() {
                    mapear($("#sliderAnyos").attr("min"));
               },1000)

               setTimeout(function() {
                    mapear(2021);
               },1500)
     
     
               //Función que dibuja los canvas en función del año seleccionado, el cual se le pasa como parámetro.
               
     
     
               // Función encargada de saber si el click se ha hecho en un canvas o en otro.
                botonAudio = document.getElementById('audio');
                botonVideo = document.getElementById('video');
                botonImagen = document.getElementById('imagen');
               
          })

          function mapear(anyo_seleccionado) 
          {
               $("#popup").slideUp(150);
               if (contador>0)
                    $('#ultCanvas').remove();
               $('#anyoSlider').html(anyo_seleccionado);
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


               $('#audio').removeClass('imagenRellena');
               $('#video').removeClass('imagenRellena');
               $('#imagen').removeClass('imagenRellena');
          }

          function verificarClick(event) 
          {
               $('#audio').removeClass('imagenRellena');
               $('#video').removeClass('imagenRellena');
               $('#imagen').removeClass('imagenRellena');

               var rect = parcelas[0].canvas.getBoundingClientRect(); 
               var x = event.x - rect.left;
               var y = event.y - rect.top;

               var audioRelleno = false;
               var videoRelleno = false;
               var imagenRelleno = false;

               for (i=0; i<parcelas.length; i++) 
               {
                    if (parcelas[i].ctx.getImageData(x, y, parcelas[i].canvas.width, parcelas[i].canvas.height).data[3] != 0) {

                         //Modificamos la información de popup
                         $("#popup .titulo").html(parcelas[i].nombre)
                         $("#popup .descripcion").html(parcelas[i].descripcion)

                         //Mostramos el popup
                         $("#popup").slideDown(150);
                         $("#popup").css("left",event.x)
                         $("#popup").css("top",event.y+10)


                        console.log(parcelas[i].nombre);
                        for (let j = 0; j < parcelas[i].multimedia.length; j++) {
                            if (parcelas[i].multimedia[j].tipo == 'audio' && !audioRelleno) {
                                audioRelleno = true;
                                $('#audio').addClass('imagenRellena');
                                $('#audio').attr('data-parcela',parcelas[i].id)
                            } else if (parcelas[i].multimedia[j].tipo == 'video' && !videoRelleno) {
                                videoRelleno = true;
                                $('#video').addClass('imagenRellena');
                                $('#video').attr('data-parcela',parcelas[i].id)
                            } else if (parcelas[i].multimedia[j].tipo == 'imagen' && !imagenRelleno) {
                                imagenRelleno = true;
                                $('#imagen').addClass('imagenRellena');
                                $('#imagen').attr('data-parcela',parcelas[i].id);
                                $('#imagen').attr('onclick','sacarImgParcela(this.dataset.parcela)');
                            }
                        }

                    }
               }

                /*for (let i = 0; i < parcelas[data-parcela].multimedia.length; i++) {
                   HAY QUE RECORRER TODAS LAS PARCELAS PARA SABER CUAL TIENE EL ID DATA-PARCELA
               }*/
          }


          function sacarImgParcela(id) {

               $("#popup").slideUp(200);
               $("#modal").html('<div id="cerrarPopup" onclick="$(\'#modal\').fadeOut(200); $(\'#fondo\').fadeOut(200);"> \
                                   <div id="equis" class="equis1"></div> \
                                   <div id="equis" class="equis2"></div> \
                                 </div>')

               for (i=0; i<parcelas.length; i++) 
               {
                    if (parcelas[i].id == id) 
                    {
                         for (j=0; j<parcelas[i].multimedia.length; j++) 
                         {
                              if (parcelas[i].multimedia[j].tipo == "imagen") 
                              {
                                   $("#modal").html($("#modal").html() + "<div class='imgMulti'><img src='" + parcelas[i].multimedia[j].url.src + "'></div>")
                              }
                         }
                    }
               }

               $("#fondo").fadeIn(200);
               $("#modal").fadeIn(200);
          }



     </script>
     <style>
     

     </style>

     <title>{{$zona->nombre}}</title>
</head>
<body class="plano" style="overflow:hidden">

     <div id="fondo"></div>
     <div id="modal">
          
     </div>

     <div id="popup">
          <div id="pestanyitaPopup"></div>
          <div id="cerrarPopup" onclick="$('#popup').slideUp(100)">
               <div id="equis" class="equis1"></div>
               <div id="equis" class="equis2"></div>
          </div>
          <div class="titulo"></div>
          <div class="descripcion"></div>
     </div>



     <div class="fondoLogo">
          <div class="logo">
               <div class="logo__inner"></div>
               <div class="logo__text">LOADING</div>
          </div>
     </div>

     
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
                              <i id="video" class="fa fa-video-camera imagenMultimedia imagenVacia " aria-hidden="true"></i>
                         </td>
                    </tr>
                    <tr>
                         <td class="lateral">
                              <i id="imagen" class="fa fa-camera imagenMultimedia imagenVacia" aria-hidden="true"></i>
                         </td>
                    </tr>
                    <tr>
                         <td class="lateral">
                              <i id="audio" class="fa fa-microphone imagenMultimedia imagenVacia" aria-hidden="true"></i>
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
</html>