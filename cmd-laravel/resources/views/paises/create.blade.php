@extends('layouts.base')
@section('title', 'Crear nuevo pais')

@section('content')

<h1>Crear nuevo @lang('pais')</h1>

<form action="{{ route('paises.store', $lang) }}" method="POST">

    {{-- genero token para poder enviar el formulario. Directoiva obligatoria en Laravel --}}
    @csrf

    <label>
        Nombre:<br>
        <input type="text" name="nombre" value="{{old('nombre')}}"><br>
        @error('nombre')
            <small>*{{ $message }}</small>
            <br><br>
        @enderror
    </label>

    <label>
        codigoISO3:<br>
        <input type="text" name="codigoISO3" value="{{old('codigoISO3')}}"><br>
        @error('codigoISO3')
            <small>*{{ $message }}</small>
            <br><br>
        @enderror
    </label>

    <label>
        codigoISO2:<br>
        <input type="text" name="codigoISO2" value="{{old('codigoISO2')}}"><br>
        @error('codigoISO2')
            <small>*{{ $message }}</small>
            <br><br>
        @enderror
    </label>

    <label>
        cod_numerico:<br>
        <input type="text" name="cod_numerico" value="{{old('cod_numerico')}}"><br>
        @error('cod_numerico')
            <small>*{{ $message }}</small>
            <br><br>
        @enderror
    </label>

    <input type="submit" value="crear pais" />

</form>

<a href={{route('paises.index', $lang)}}>Volver a la lista de países</button>

@endsection