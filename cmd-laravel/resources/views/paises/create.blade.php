@extends('layouts.base')
@section('title', 'Crear nuevo pais')

@section('idiomas')

¡Cambia el idioma!
<a href={{route('paises.create', 'en')}}>EN</a>
<a href={{route('paises.create', 'ca')}}>CA</a>
<a href={{route('paises.create', 'es')}}>ES</a>

@endsection

@section('content')

    <div class="row">
        <h1 class="col-12">Crear nuevo @lang('paises.pais')</h1>

        <form action="{{ route('paises.store', $lang) }}" method="POST"
            class="col-12 d-flex justify-content-between align-items-center">

            {{-- genero token para poder enviar el formulario. Directoiva obligatoria en Laravel --}}
            @csrf

            <label>
                Nombre:<br>
                <input type="text" name="nombre" value="{{ old('nombre') }}"><br>
                @error('nombre')
                    <small class="text-danger">*{{ $message }}</small>

                @enderror
            </label>


            <label>
                codigoISO3:<br>
                <input type="text" name="codigoISO3" value="{{ old('codigoISO3') }}"><br>
                @error('codigoISO3')
                    <small class="text-danger">*{{ $message }}</small>

                @enderror
            </label>

            <label>
                codigoISO2:<br>
                <input type="text" name="codigoISO2" value="{{ old('codigoISO2') }}"><br>
                @error('codigoISO2')
                    <small class="text-danger">*{{ $message }}</small>

                @enderror
            </label>

            <label>
                cod_numerico:<br>
                <input type="text" name="cod_numerico" value="{{ old('cod_numerico') }}"><br>
                @error('cod_numerico')
                    <small class="text-danger">*{{ $message }}</small>

                @enderror
            </label>

            <button type="submit" class="btn btn-primary">Crear @lang('paises.pais')</button>

        </form>
        <br>
        <a href={{ route('paises.index', $lang) }} class="col-12">Volver a la lista de países</button>
    </div>

@endsection
