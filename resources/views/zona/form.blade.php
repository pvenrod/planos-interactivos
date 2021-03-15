@extends('layouts.master')
@section('title', 'Lista de planos')
    
@section('content')  

    @isset($zona)
        <form method="post" action="{{route('zona.update',$zona->id)}}" enctype="multipart/form-data">
    @else
        <form method="post" action="{{route('zona.store')}}" enctype="multipart/form-data">
    @endisset
        @csrf
        Nombre:<span style="color: red">*</span> <input type="text" name="nombre" value="{{$zona->nombre ?? ''}}" required><br>
        Descripción:
        <textarea name="descripcion">{{$zona->descripcion ?? ''}}</textarea><br>
        Imagen:<input type="file" name="imagen"><br>
        Imagen fondo:<input type="file" name="imagen_fondo"><br>
        @isset($zona)
            <img src="{{asset('img/zonas/'.$zona->imagen)}}" style="width: 100px;"><br>
            <input type="submit" value="Modificar zona"><br><br>
        @else
            <input type="submit" value="Crear zona"><br><br>
        @endisset
        
        <span style="color: red">*</span> Campo obligatorio
    </form>

@endsection