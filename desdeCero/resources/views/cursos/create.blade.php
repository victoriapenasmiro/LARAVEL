@extends('layouts.plantilla')

@section('title', 'Crear curso')

@section('content')
    <h1>En esta página podrás crear un curso</h1>    
    <form action="{{route('cursos.store')}}" method="POST">

        {{-- genero token para poder enviar el formulario. Directiva obligatoria en Laravel --}}
        @csrf

        <label>
            Nombre:<br>
            <input type="text" name="name"><br>
            @error('name')
                <small>*{{$message}}</small>
                <br><br>
            @enderror
        </label>
        <label>
            Descripción:<br>
            <textarea name="description" rows="5"></textarea><br>
            @error('description')
                <small>*{{$message}}</small>
                <br><br>
            @enderror
        </label>
        <label>
            Categoría<br>
            <input type="text" name="categoria"><br>
            @error('categoria')
                <small>*{{$message}}</small>
                <br><br>
            @enderror
        </label>
        <br>
        <input type="submit" />

    </form>
@endsection