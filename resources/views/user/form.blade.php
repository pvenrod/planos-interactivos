@extends('layouts.master')
@section('title', 'Lista de usuarios')
    
@section('content')  
    @isset($usuario)
        <form method="post" action="{{route('user.update',$usuario->id)}}" class="formulario">
        <h1>Modificar usuario</h1>
    @else
        <form method="post" action="{{route('user.store')}}" class="formulario">
        <h1>Nuevo usuario</h1>
    @endisset
        @csrf
        Usuario:<span style="color: red">*</span> <input type="text" name="usuario" value="{{$usuario->name ?? ''}}"><br><br>
        Email:<span style="color: red">*</span> <input type="text" name="email" value="{{$usuario->email ?? ''}}"><br><br>
        @isset($usuario)
            Nueva contraseña:<span style="color: red">*</span> <input type="password" name="contrasenya1" style="width: 140px;"><br><br>
            <input type="submit" value="Modificar usuario"><br><br>
        @else
            Contraseña:<span style="color: red">*</span> <input type="password" name="contrasenya1"><br><br>
            <input type="submit" value="Crear usuario"><br><br>
        @endisset
        
        <span style="color: red">*</span> Campo obligatorio
    </form>
@endsection
