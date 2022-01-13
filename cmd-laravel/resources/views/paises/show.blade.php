@extends('layouts.base')
@section('title', 'Crear nuevo pais')

@section('content')

    <h1>@lang('pais'): {{ $pais->nombre }}</h1>

    <ul>
        <li>Nombre: {{ $pais->nombre }}</li>
        <li>codigoISO3: {{ $pais->codigoISO3 }}</li>
        <li>codigoISO2: {{ $pais->codigoISO2 }}</li>
        <li>cod_numerico: {{ $pais->cod_numerico }}</li>
    </ul>


    <form action="{{ route('paises.destroy', [$lang, $pais]) }}" method="POST" style="display:inline;">
        @csrf
        @method('delete')

        <button type="submit">Eliminar</button>
    </form>

    <button><a href="{{ route('paises.edit', [$lang, $pais]) }}">Editar pais</a></button>
    <button><a href={{ route('paises.index', $lang) }}>Volver a la lista de países</a></button>

    @endsection
