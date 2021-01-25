@extends('layouts.master')
@section('title', 'Lista de zonas')
    
@section('content')
    <span style="color: red">{{$error ?? ""}}</span>
    <table style="border:1px solid black" align="center">
        <tr>
            <th>ID</th>
            <th>Imagen</th>
            <th>Zona</th>
            <th>Descripción</th>
            <th>Fecha de creación</th>
            <th>Última modificación</th>
            <th colspan="2">Acciones</th>
        </tr>


        
        @foreach ($zonas as $zona)
        
        <tr>
            <td>{{$zona->id}}</td>
            <td><img src="{{asset('img/zonas/'.$zona->imagen)}}" style="width: 100px;"></td>
            <td>{{$zona->nombre}}</td>
            <td>{{$zona->descripcion}}</td>
            <td>{{$zona->created_at}}</td>
            <td>{{$zona->updated_at}}</td>
            <td><a href="{{route('zona.edit',$zona->id)}}">Modificar</a></td>
            <td><a href="{{route('zona.destroy',$zona->id)}}">Eliminar</a></td>
        </tr>

        @endforeach


        <br>
        <tr>
            <td colspan="7">
                <a href="{{route('zona.create')}}">Nueva zona</a>
            </td>
        </tr>
    </table>
@endsection