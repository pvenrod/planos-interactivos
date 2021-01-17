<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo usuario</title>
</head>
<body>    
    <form method="post" action="{{route('user.store')}}">
        @csrf
        Usuario: <input type="text" name="usuario" value="{{$usuario->name ?? ''}}"><br>
        Email: <input type="text" name="email" value="{{$usuario->email ?? ''}}"><br>
        Contraseña: <input type="password" name="contrasenya1"><br>
        Repita contrasenya: <input type="password" name="contrasenya2" ><br>
        <input type="submit" value="Crear usuario">
    </form>
</body>
</html>