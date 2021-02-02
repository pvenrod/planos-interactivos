@extends('layouts.master')
@section('title', 'Lista de usuarios')

@section('tituloAdministracion')
     <h1 class="tituloAdministracion">Administración de usuarios</h1>
@endsection

@section('content')
     
    <table class="tablaCRUD">
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
            <td><a class="boton modificar" href="{{route('user.edit',$usuario->id)}}">Modificar</a></td>
            <td><a class="boton eliminar" href="{{route('user.destroy',$usuario->id)}}">Eliminar</a></td>
        </tr>

        @endforeach

    </table>

    <a class="boton nuevo" href="{{route('user.create')}}">Nuevo usuario</a>

@endsection