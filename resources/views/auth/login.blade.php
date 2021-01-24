<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body> 
    <form method="post" action="{{route('auth.login')}}">
        @csrf
        Email: <input type="text" name="email"><br>
        Contraseña: <input type="password" name="password"><br>
        <input type="submit" value="Iniciar sesión"><br><br>
    </form>
    <span style="color:red">{{$error ?? ""}}</span>
</body>
</html>