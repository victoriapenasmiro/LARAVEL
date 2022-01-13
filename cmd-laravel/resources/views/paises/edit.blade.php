@extends('layouts.base')
@section('title', "Pais $pais->nombre")

@section('content')

    <h1>En esta página podrás editar el @lang('paises.pais') {{ $pais->id }} : {{ $pais->nombre }}</h1>
    <form action="{{ route('paises.update', [$lang, $pais]) }}" method="POST">

        {{-- genero token para poder enviar el formulario. Directoiva obligatoria en Laravel --}}
        @csrf

        {{-- Para actualizar registro, se debe hacer con el metodo PUT, y como html no permite 
            más que GET y POST, utilizamos esta directiva para especificarlo dejando el méthod en POST --}}
        @method("put")

        <label>
            Nombre:<br>
            <input type="text" name="nombre" value="{{ old('nombre', $pais->nombre) }}"><br>
            @error('nombre')
                <small>*{{ $message }}</small>
                <br><br>
            @enderror
        </label>

        <label>
            codigoISO3:<br>
            <input type="text" name="codigoISO3" value="{{ old('codigoISO3', $pais->codigoISO3) }}"><br>
            @error('codigoISO3')
                <small>*{{ $message }}</small>
                <br><br>
            @enderror
        </label>

        <label>
            codigoISO2:<br>
            <input type="text" name="codigoISO2" value="{{ old('codigoISO2', $pais->codigoISO2) }}"><br>
            @error('codigoISO2')
                <small>*{{ $message }}</small>
                <br><br>
            @enderror
        </label>

        <label>
            cod_numerico:<br>
            <input type="text" name="cod_numerico" value="{{ old('cod_numerico', $pais->cod_numerico) }}"><br>
            @error('cod_numerico')
                <small>*{{ $message }}</small>
                <br><br>
            @enderror
        </label>

        <input type="submit" value="Actualizar pais" />

    </form>

    <a href={{route('paises.index', $lang)}}>Volver a la lista de países</button>

@endsection
