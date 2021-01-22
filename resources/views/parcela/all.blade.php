@extends('layouts.master')

@section('title','Lista de parcelas')

@section('content')
    <table align="center">
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
                    <td>{{ $parcela->imagen }}</td>
                    <td>{{ $parcela->zona }}</td>
                    <td><a href="{{ route('parcela.edit') }}">Modificar</a></td>
                    <td><a href="{{ route('parcela.destroy') }}">Eliminar</a></td>
                </tr>
            @endforeach
        </tbody>

        <tr>
            
            <td><a href="{{ route('parcela.create') }}">Nueva parcela</a></td>
        </tr>
        
    </table>
@endsection