@extends('layouts.master')
@section('title', 'Lista de usuarios')
    
@section('content')
    <table style="border:1px solid black" align="center">
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


        <br>
        <tr>
            <td colspan="7">
                <a href="{{route('user.create')}}">Nuevo usuario</a>
            </td>
        </tr>
    </table>
@endsection