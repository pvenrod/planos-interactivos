@extends('layouts.master')

@section('title','Lista de parcelas')

@section('content')
    <table class="tablaCRUD">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Año de inicio</th>
                <th>Año de fin</th>
                <th>Imagen</th>
                <th>Zona</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($parcelas as $parcela)
                <tr>
                    <td>{{ $parcela->id }}</td>
                    <td>{{ $parcela->nombre }}</td>
                    <td>{{ $parcela->descripcion }}</td>
                    <td>{{ $parcela->anyo_inicio }}</td>
                    <td>{{ $parcela->anyo_fin }}</td>
                    <td><img style="width: 100px" src="{{ asset('img/parcelas/'.$parcela->imagen) }}" alt="Imagen de la parcela"></td>
                    <td>{{ $parcela->zona_nombre }}</td>
                    <td><a class="boton modificar" href="{{ route('parcela.edit',$parcela->id) }}">Modificar</a></td>
                    <td><a class="boton eliminar" href="{{ route('parcela.destroy',$parcela->id) }}">Eliminar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a class="boton nuevo" href="{{ route('parcela.create') }}">Nueva parcela</a>

@endsection