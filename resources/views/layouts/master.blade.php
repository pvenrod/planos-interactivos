<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <div id="header">
        <h1>Planos interactivos. Bienvenido, {{session("user")}}</h1>
        <form method="post" action="{{ route('auth.logout') }}">
        @csrf
            <input type="submit" value="Logout">
        </form>
    </div>
    <div id="nav">
        <table>
            <tr>
                <td><a href="{{ route('user.index') }}">Usuarios</a></td>
                <td><a href="{{ route('parcela.index') }}">Parcelas</a></td>
            </tr>
        </table>
    </div>
    <div id="content" class="main-content">
        @yield('content') <!-- Aquí irán las diferentes vistas. Los demás divs se pueden quedar o no -->
    </div>
    <div id="footer">

    </div>
</body>
</html>