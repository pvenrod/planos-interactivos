<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>    
    <table>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Fecha de creación</th>
            <th>Última modificación</th>
            <th colspan="2">Acciones</th>
        </tr>


        
        @foreach ($usuarios as $usuario)
        
        <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{$usuario->created_at}}</td>
            <td>{{$usuario->updated_at}}</td>
            <td><a href="{{route('user.edit',$usuario->id)}}">Modificar</a></td>
            <td><a href="{{route('user.destroy',$usuario->id)}}">Eliminar</a></td>
        </tr>

        @endforeach


        <tr>
            <td colspan="7">
                <a href="{{route('user.new')}}">Nuevo usuario</a>
            </td>
        </tr>
    </table>
</body>
</html>