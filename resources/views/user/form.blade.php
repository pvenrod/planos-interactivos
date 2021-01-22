<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo usuario</title>
</head>
<body>    
    @isset($usuario)
    <form method="post" action="{{route('user.update',$usuario->id)}}">
    @else
    <form method="post" action="{{route('user.store')}}">
    @endisset
        @csrf
        Usuario:<span style="color: red">*</span> <input type="text" name="usuario" value="{{$usuario->name ?? ''}}"><br>
        Email:<span style="color: red">*</span> <input type="text" name="email" value="{{$usuario->email ?? ''}}"><br>
        @isset($usuario)
            Nueva contraseña:<span style="color: red">*</span> <input type="password" name="contrasenya1"><br>
            <input type="submit" value="Modificar usuario"><br><br>
        @else
            Contraseña:<span style="color: red">*</span> <input type="password" name="contrasenya1"><br>
            <input type="submit" value="Crear usuario"><br><br>
        @endisset
        
        <span style="color: red">*</span> Campo obligatorio
    </form>
</body>
</html>