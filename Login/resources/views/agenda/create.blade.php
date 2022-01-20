@extends('layouts.base')
@section('title', 'nuevo contacto')

@section('content')

    <h1>@lang('agenda.newcontact')</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('agenda.store', $lang) }}" method="POST">

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
            Teléfono:<br>
            <input type="text" name="tlf" class="ml-2" value="{{ old('tlf') }}"><br>
            @error('tlf')
                <small class="text-danger">*{{ $message }}</small>

            @enderror
        </label>

        <button type="submit" class="btn btn-primary ml-3">{{ __('agenda.addcontact')}}</button>

    </form>
    <br>
    <a href="{{ route('agenda.index', $lang) }}" class="text-white text-decoration-none btn btn-primary">Volver a los
        contactos</a>

@endsection
