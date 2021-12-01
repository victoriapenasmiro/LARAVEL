@extends('layouts.plantilla')

@section('title', "Curso $curso->name")

@section('content')
    <h1>Bienvenido al curso: {{$curso->name}}
    <?php
    
        if (isset($categoria)) echo " de la categoria: $categoria";
    
    ?>
    </h1>
    <p>{{$curso->description}}</p>

    <a href="{{route('cursos.edit', $curso)}}">Editar curso</a><br>
    <a href="{{route('cursos.index')}}">volver a cursos</a>

    <form action="{{route('cursos.destroy', $curso)}}" method="POST">
        @csrf
        @method('delete')

        <button type="submit">Eliminar</button>
    </form>

@endsection