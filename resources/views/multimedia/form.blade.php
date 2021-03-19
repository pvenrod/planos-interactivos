@extends('layouts.master')
@section('title', 'Formulario de multimedia')
    
@section('content')  

    @isset($multimedia)
        <form method="post" action="{{route('multimedia.update',$multimedia->id)}}" enctype="multipart/form-data" class="formulario">
        <h1>Modificar multimedia</h1>
    @else
        <form method="post" action="{{route('multimedia.store',$parcela_id)}}" enctype="multipart/form-data" class="formulario">
        <h1>Nueva multimedia</h1>
    @endisset
        @csrf
        Tipo:
        <select name="tipo">
        @foreach ($tipos as $tipo)
            @isset($multimedia)
                @if ($tipo == $multimedia->tipo)
                    <option value="{{ $tipo }}" selected>{{ $tipo }}</option>
                @else
                <option value="{{ $tipo }}">{{ $tipo }}</option>
                @endif

                @else
                    <option value="{{ $tipo }}">{{ $tipo }}</option>
            @endisset
        @endforeach
        </select><br><br>
        Multimedia:<input type="file" name="url"><br>
        @isset($multimedia)
            <img src="{{asset('img/multimedia/'.$multimedia->url)}}"><br>
            <input type="submit" value="Modificar multimedia"><br><br>
        @else
            <input type="submit" value="Crear multimedia"><br><br>
        @endisset
        
        
        
        <span style="color: red">*</span> Campo obligatorio
    </form>

@endsection
