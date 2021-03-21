@extends('layouts.master')

@section('title','Lista de parcelas')

@section('tituloAdministracion')
    @if(isset($nombreZona))
        <h1 class="tituloAdministracion">Administración de parcelas {{'de la zona "' . $nombreZona . '"'}}</h1>
    @else
        <h1 class="tituloAdministracion">Administración de parcelas</h1>
    @endif
@endsection

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
                <th colspan="3">Acciones</th>
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
                    <td><a class="boton multimedia" href="{{ route('multimedia.index',$parcela->id) }}">Multimedia</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a class="boton nuevo" href="{{ route('parcela.create') }}">Nueva parcela</a>

@endsection
