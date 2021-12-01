@extends('layouts.plantilla')

@section('title', "Editar curso $curso->name")

@section('content')
    <h1>En esta página podrás editar el curso {{ $curso->id }}</h1>
    <form action="{{ route('cursos.update', $curso) }}" method="POST">

        {{-- genero token para poder enviar el formulario. Directoiva obligatoria en Laravel --}}
        @csrf

        {{-- Para actualizar registro, se debe hacer con el metodo PUT, y como html no permite 
            más que GET y POST, utilizamos esta directiva para especificarlo dejando el méthod en POST --}}
        @method("put")

        <label>
            Nombre:<br>
            <input type="text" name="name" value="{{ old('name', $curso->name) }}"><br>
            @error('name')
                <small>*{{ $message }}</small>
                <br><br>
            @enderror
        </label>
        <label>
            Descripción:<br>
            <textarea name="description" rows="5">{{ old('description', $curso->description) }}</textarea><br>
            @error('description')
                <small>*{{ $message }}</small>
                <br><br>
            @enderror
        </label>
        <label>
            Categoría<br>
            <input type="text" name="categoria" value="{{ old('categoria', $curso->categoria) }}"><br>
            @error('categoria')
                <small>*{{ $message }}</small>
                <br><br>
            @enderror
        </label>
        <br>
        <input type="submit" value="Actualizar curso" />

    </form>
@endsection
