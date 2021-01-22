<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body> 
    <form method="get" action="{{route('auth.login')}}">
        @csrf
        Usuario: <input type="text" name="usuario"><br>
        Contraseña: <input type="password" name="contrasenya"><br>
        <input type="submit" value="Iniciar sesión"><br><br>
        <span style="color: red">{{$error ?? ""}}</span>
    </form>
</body>
</html>