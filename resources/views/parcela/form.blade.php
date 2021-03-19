@extends('layouts.master')
@section('title', 'Lista de planos')
    
@section('content')  

    @isset($parcela)
        <form method="post" action="{{route('parcela.update',$parcela->id)}}" enctype="multipart/form-data" class="formulario">
        <h1>Modificar parcela</h1>
    @else
        <form method="post" action="{{route('parcela.store')}}" enctype="multipart/form-data" class="formulario">
        <h1>Nueva parcela</h1>
    @endisset
        @csrf
        Zona:<span style="color: red">*</span> 
        <select name="zona_id">
        @foreach ($zonas as $zona)
            @isset($parcela)
               @if ($parcela->zona_id == $zona->id)
                   <option value="{{ $zona->id }}" selected>{{ $zona->nombre }}</option>
               @else
                    <option value="{{ $zona->id }}">{{ $zona->nombre }}</option>
               @endif
               @else
                    <option value="{{ $zona->id }}">{{ $zona->nombre }}</option>
            @endisset
        @endforeach
     </select><br><br>
        Nombre:<span style="color: red">*</span> <input type="text" name="nombre" value="{{$parcela->nombre ?? ''}}" required><br><br>
        Descripción:
        <textarea rows="5" name="descripcion">{{$parcela->descripcion ?? ''}}</textarea><br><br>
        Año de inicio:<span style="color: red">*</span> <input type="number" name="anyo_inicio" value="{{ $parcela->anyo_inicio ?? '' }}" required><br><br>
        Año de fin:<span style="color: red">*</span> <input type="number" name="anyo_fin" value="{{ $parcela->anyo_fin ?? date("Y") }}" required><br><br>
        Imagen:<input type="file" name="imagen"><br>
        @isset($parcela)
            <img src="{{asset('img/parcelas/'.$parcela->imagen)}}"><br><br>
            <input type="submit" value="Modificar parcela"><br><br>
        @else
            <input type="submit" value="Crear parcela"><br><br>
        @endisset
        
        
        
        <span style="color: red">*</span> Campo obligatorio
    </form>

@endsection
