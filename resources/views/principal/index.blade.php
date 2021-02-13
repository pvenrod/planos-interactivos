<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  		<title>Almería interactiva</title>
<!-- 

Highway Template

https://templatemo.com/tm-520-highway

-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.jpg">

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fontAwesome.css') }}">
        <link rel="stylesheet" href="{{ asset('css/light-box.css') }}">
        <link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">

        <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <script src="{{ asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
    </head>

<body>

    <nav>
        <div class="logo">
            <a href="{{ route('principal.index') }}">Almería Interactiva</a>
        </div>
        <div class="menu-icon">
        <span></span>
      </div>
    </nav>

    <div id="video-container">
        <div class="video-overlay"></div>
        <div class="video-content">
            <div class="inner">
              <h1>ALMERIA INTERACTIVA</h1>
              <p style="font-weight: bold">Planos históricos de la provincia</p>
              <p>Conoce en detalle cada rincón y su historia con nosotros</p>
                <div class="scroll-icon">
                    <a class="scrollTo" data-scrollTo="portfolio" href="#"><img src="{{ asset('img/principal/scroll-icon.png') }}" alt="" style="outline: none"></a>
                </div>    
            </div>
        </div>
        <video autoplay loop muted>
        	<source src="{{ asset('img/principal/video-principal.mp4') }}" type="video/mp4" />
        </video>
    </div>


    <div class="full-screen-portfolio" id="portfolio">
        <div class="container-fluid">
             @foreach ($zonas as $zona)
               <div class="col-md-4 col-sm-6">
                    <div class="portfolio-item">
                         <a href="{{ asset('img/zonas/'.$zona->imagen) }}" data-lightbox="image-1"><div class="thumb">
                              <div class="hover-effect">
                                   <div class="hover-content">
                                        <h1>{{ $zona->nombre }}</h1>

                                   </div>
                              </div>
                              <div class="image">
                                   <img src="{{ asset('img/zonas/'.$zona->imagen) }}" style="object-fit: cover;height:600px">
                              </div>
                         </div></a>
                    </div>
               </div>
             @endforeach
        </div>
    </div>


    <footer>
        <div class="container-fluid">
            <div class="col-md-12">
                <p>2021 Paolo y Rubén
    
    | Designed by TemplateMo</p>
            </div>
        </div>
    </footer>


      <!-- Modal button -->
    <div class="popup-icon">
      <button id="modBtn" class="modal-btn"><img src="{{ asset('img/principal/contact-icon.png') }}" alt=""></button>
    </div>  

    <!-- Modal -->
    <div id="modal" class="modal">
      <!-- Modal Content -->
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="header-title">Say hello to <em>Highway</em></h3>
          <div class="close-btn"><img src="{{ asset('img/principal/close_contact.png') }}" alt=""></div>    
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
          <div class="col-md-6 col-md-offset-3">
            <form id="contact" action="" method="post">
                <div class="row">
                    <div class="col-md-12">
                      <fieldset>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required>
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required>
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required></textarea>
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="btn">Send Message Now</button>
                      </fieldset>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    

    <section class="overlay-menu">
      <div class="container">
        <div class="row">
          <div class="main-menu">
              <ul>
                  <li>
                      <a href="{{ route('principal.index') }}">Inicio</a>
                  </li>
                  <li>
                      <a href="{{ route('principal.about') }}">Sobre nosotros</a>
                  </li>
                  <li>
                      <a href="{{ route('auth.index') }}">Iniciar sesión</a>
                  </li>
              </ul>
          </div>
        </div>
      </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>
    
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    
</body>
</html>
