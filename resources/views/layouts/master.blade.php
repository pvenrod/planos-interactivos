<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    <div id="header">
        <h1>Planos interactivos. Bienvenido, {{session("user")}}</h1>
        <form method="post" action="{{ route('auth.logout') }}">
        @csrf
            <input class="boton logout" type="submit" value="Logout">
        </form>
    </div>
    <div id="nav">
        <table>
            <tr>
                <td><a href="{{ route('user.index') }}">Usuarios</a></td>
                <td><a href="{{ route('zona.index') }}">Zonas</a></td>
                <td><a href="{{ route('parcela.index') }}">Parcelas</a></td>
            </tr>
        </table>
    </div>
    <div id="content" class="main-content">
         @yield('tituloAdministracion')
        @yield('content') <!-- Aquí irán las diferentes vistas. Los demás divs se pueden quedar o no -->
    </div>
    <div id="footer">

    </div>
</body>
</html>