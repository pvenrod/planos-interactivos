@extends('layouts.master')

@section('title','Lista de multimedia')

@section('tituloAdministracion')
     <h1 class="tituloAdministracion">Multimedia para la parcela "{{ $parcela->nombre }}"</h1>
@endsection

@section('content')
    <table class="tablaCRUD">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>URL</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($multimedias as $multimedia)
                <tr>
                    <td>{{ $multimedia->id }}</td>
                    <td>{{ $multimedia->tipo }}</td>
                    <td><a href="{{ asset('img/multimedia/'.$multimedia->url) }}" target="_blank">Ver detalles</a></td>
                    <td><a class="boton modificar" href="{{ route('multimedia.edit',$multimedia->id) }}">Modificar</a></td>
                    <td><a class="boton eliminar" href="{{ route('multimedia.destroy',$multimedia->id) }}">Eliminar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a class="boton nuevo" href="{{ route('multimedia.create',$parcela->id) }}">Nueva multimedia</a>

@endsection