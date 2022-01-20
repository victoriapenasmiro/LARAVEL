@extends('layouts.base')
@section('title', 'Contacto' . $contacto->id)

@section('content')

    <h1>Editar el contacto {{ $contacto->id }}</h1>
    <form action="{{ route('agenda.update', [$lang, $contacto]) }}" method="POST">

        {{-- genero token para poder enviar el formulario. Directoiva obligatoria en Laravel --}}
        @csrf

        {{-- Para actualizar registro, se debe hacer con el metodo PUT, y como html no permite 
            más que GET y POST, utilizamos esta directiva para especificarlo dejando el méthod en POST --}}
        @method("put")

        <label>
            Nombre:<br>
            <input type="text" name="nombre" value="{{ old('nombre', $contacto->nombre) }}"><br>
            @error('nombre')
                <small>*{{ $message }}</small>
                <br><br>
            @enderror
        </label>

        <label>
            Teléfono:<br>
            <input type="text" name="tlf" value="{{ old('tlf', $contacto->tlf) }}"><br>
            @error('tlf')
                <small>*{{ $message }}</small>
                <br><br>
            @enderror
        </label>

        <input type="submit" value="Actualizar" />

    </form>

    <a href="{{ route('agenda.index', $lang) }}" class="text-white text-decoration-none btn btn-primary">Volver a los
        contactos</a>
        
@endsection
