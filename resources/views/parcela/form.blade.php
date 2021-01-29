@extends('layouts.master')
@section('title', 'Lista de planos')
    
@section('content')  

    @isset($parcela)
        <form method="post" action="{{route('parcela.update',$parcela->id)}}" enctype="multipart/form-data">
    @else
        <form method="post" action="{{route('parcela.store')}}" enctype="multipart/form-data">
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
        Nombre:<span style="color: red">*</span> <input type="text" name="nombre" value="{{$parcela->nombre ?? ''}}" required><br>
        Descripción:
        <textarea name="descripcion">
            {{$parcela->descripcion ?? ''}}
        </textarea><br>
        Año de inicio:<span style="color: red">*</span> <input type="number" name="anyo_inicio" value="{{ $parcela->anyo_inicio ?? '' }}" required><br>
        Año de fin:<span style="color: red">*</span> <input type="number" name="anyo_fin" value="{{ $parcela->anyo_fin ?? date("Y") }}" required><br>
        Imagen:<input type="file" name="imagen"><br>
        @isset($parcela)
            <img src="{{asset('img/parcelas/'.$parcela->imagen)}}" style="width: 100px;"><br>
            <input type="submit" value="Modificar parcela"><br><br>
        @else
            <input type="submit" value="Crear parcela"><br><br>
        @endisset
        
        
        
        <span style="color: red">*</span> Campo obligatorio
    </form>

@endsection