@extends('layouts.base')
@section('title', $centro->nombre)

@section('content')

    <h1 class="mb-5 text-center">Centro {{ $centro->nombre }}</h1>
    <ul>
        <li>Nombre: {{ $centro->nombre }}</li>
        <li>Código asd: {{ $centro->cod_asd }}</li>
        <li>Fecha inicio: {{ $centro->fec_comienzo_actividad }}</li>
        <li>Radio: {{ $centro->opcion_radio }}</li>
        <li>Dispone de guardería: {{ $centro->guarderia }}</li>
        <li>Categoría: {{ $centro->categoria }}</li>
    </ul>

    {{-- <form action="{{ route('centros.destroy', $centro) }}" method="POST" style="display:inline;"> --}}
    {{-- con fetch: <form action="{{ '/LARAVEL/proyectoAPI/public/api/apirest/' . $centro->id }}" id="deleteForm"
        style="display:inline-block"> --}}

        {{-- con AJAX --}}
        <form onsubmit="api_js_delete({{ $centro->id }})" id="deleteForm" style="display:inline-block">
        @csrf
        @method('delete')

        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>


    <a href="{{ route('centros.edit', $centro->id) }}" class="btn btn-success">Editar centro</a>
    <a href="{{ route('centros') }}" class="btn btn-primary">Volver</a>

@endsection
