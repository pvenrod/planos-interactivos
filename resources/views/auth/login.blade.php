<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
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
    <style>
          * {
            font-family: 'Kanit', sans-serif;
          }
        .bodyLogin {
            margin:0; 
            color: white;
        }
        .fondo_imagen {
            width: 100vw; 
            height: 100vh; 
            position: absolute; 
            z-index: -9999;
            background-image: url('{{asset("img/principal/almeria.jpg")}}');
            background-repeat: no-repeat;
            background-size: 100vw 100vh;
            background-size: cover;

        }
        .fondo_negro {
            width: 100vw; 
            height: 100vh; 
            background-color: black; 
            position: absolute; 
            z-index: -9998;
            opacity: 0.8;
        }
        #miContenido {
            opacity: 0;
            transition: 0.5s;
        }
        .formLogin {
            width: 300px;
            position: relative; 
            left: 50%;
            top: 100px;
            transform: translateX(-50%);
            font-size: 20px;
        }
        .formLogin input {
            background-color: transparent;
            border: 1px solid white;
            border-radius: 4px;
            padding: 4px;
            border: none;
            color: white;
            border: 1px solid transparent;
            border-bottom: 2px solid white;
            outline: none;
            padding-left: 10px;
            padding-right: 10px;
            transition: 0.1s;
        }
        .formLogin input:focus {
            box-shadow: 0 8px 6px -6px white;
        }
        .formLogin input[type="submit"] {
            position: relative;
            left: 50%;
            transform: translateX(-50%);
            background-color: transparent;
            border: none;
            border-radius: 10px;
            color: white;
            padding: 10px;
            margin-top: 15px;
            cursor: pointer;
            transition: 0.7s;
            outline: none;
            font-size: 25px;
        }
        .formLogin input[type="submit"]:hover {
            color: #8f8f8f;
        }
        .prev {
            position: absolute;
            left: 20px;
            top: 20px;
            width: 20px;
            cursor: pointer;
        }
    </style>
    <script>
    function mostrar() {
        setTimeout(function() {
            document.getElementById("miContenido").style.opacity = "1";
        },100)
    }
        
    </script>
</head>
<body class="bodyLogin" onload="mostrar()"> 
    <div class="fondo_imagen"></div>
    <div class="fondo_negro"></div>
        <div id="miContenido">
        <a href="{{route('principal.index')}}"><img src="{{asset('img/principal/prev.png')}}" class="prev"></a>
        <form method="post" action="{{route('auth.login')}}" class="formLogin" autocomplete="off">
            @csrf

            <table>

                <tr>
                
                    <td>Email&nbsp;&nbsp;&nbsp;</td>
                    <td><input type="text" name="email"></td>
                
                </tr>

                <tr>
                
                    <td>Contraseña&nbsp;&nbsp;&nbsp;</td>
                    <td><input type="password" name="password"></td>
                
                </tr>
    
                <tr>
                
                    <td colspan="2" style="text-align: center;"><span style="color:red; display: block; margin-top: 10px;">{{$error ?? ""}}</span></td>
                
                </tr>

                <tr>
                
                    <td colspan="2"><input type="submit" value="Iniciar sesión"></td>
                
                </tr>

            </table>
        </form>
    </div>
</body>
</html>