@extends('layouts.master')
@section('title', 'Lista de zonas')

@section('tituloAdministracion')
     <h1 class="tituloAdministracion">Administración de zonas</h1>
@endsection
    
@section('content')
    <span style="color: red">{{$error ?? ""}}</span>
    <table class="tablaCRUD">
        <tr>
            <th>ID</th>
            <th>Imagen</th>
            <th>Zona</th>
            <th>Descripción</th>
            <th>Fecha de creación</th>
            <th>Última modificación</th>
            <th colspan="4">Acciones</th>
        </tr>


        
        @foreach ($zonas as $zona)
        
        <tr>
            <td>{{$zona->id}}</td>
            <td><img src="{{asset('img/zonas/'.$zona->imagen)}}" style="width: 100px;"></td>
            <td>{{$zona->nombre}}</td>
            <td>{{$zona->descripcion}}</td>
            <td>{{$zona->created_at}}</td>
            <td>{{$zona->updated_at}}</td>
            <td><a class="boton modificar" href="{{route('zona.edit',$zona->id)}}">Modificar</a></td>
            <td><a class="boton eliminar" href="{{route('zona.destroy',$zona->id)}}">Eliminar</a></td>
            <td><a class="boton visualizar" href="{{route('zona.show',$zona->id)}}">Visualizar</a><br></td>
            <td><a class="boton multimedia" href="{{ route('parcela.zonaConcreta',$zona->id) }}">Parcelas</a></td>
        </tr>

        @endforeach

    </table>

     <a class="boton nuevo" href="{{route('zona.create')}}">Nueva zona</a>

@endsection
