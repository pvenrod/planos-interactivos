@extends('layouts.master')
@section('title', 'Lista de planos')
    
@section('content')  

    @isset($zona)
        <form method="post" action="{{route('zona.update',$zona->id)}}" enctype="multipart/form-data" class="formulario">
        <h1>Modificar zona</h1>
    @else
        <form method="post" action="{{route('zona.store')}}" enctype="multipart/form-data" class="formulario">
        <h1>Nueva zona</h1>
    @endisset
        @csrf
        Nombre:<span style="color: red">*</span> <input type="text" name="nombre" value="{{$zona->nombre ?? ''}}" required><br><br>
        Descripción:
        <textarea rows="5" name="descripcion">{{$zona->descripcion ?? ''}}</textarea><br><br>
        Imagen:<input type="file" name="imagen"><br><br>
        Imagen fondo:<input type="file" name="imagen_fondo"><br><br>
        @isset($zona)
            <img src="{{asset('img/zonas/'.$zona->imagen)}}"><br><br>
            <input type="submit" value="Modificar zona"><br><br>
        @else
            <input type="submit" value="Crear zona"><br><br>
        @endisset
        
        <span style="color: red">*</span> Campo obligatorio
    </form>

@endsection
