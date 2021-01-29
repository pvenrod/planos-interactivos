@extends('layouts.master')

@section('title','Lista de parcelas')

@section('content')
    <table align="center" style="border: 1px solid black">
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
                    <td><a href="{{ route('parcela.edit',$parcela->id) }}">Modificar</a></td>
                    <td><a href="{{ route('parcela.destroy',$parcela->id) }}">Eliminar</a></td>
                </tr>
            @endforeach
        </tbody>

        <tr>
            
            <td><a href="{{ route('parcela.create') }}">Nueva parcela</a></td>
        </tr>
        
    </table>
@endsection