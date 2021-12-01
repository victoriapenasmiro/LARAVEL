@extends('layouts.plantilla')

@section('title', 'Cursos')

@section('content')

    <h1>Bienvenido a la página cursos</h1>

    {{-- con el método route puedo llamar al nombre asignado a una ruta --}}
    <a href="{{route('cursos.create')}}">crear curso</a>

    <ul>

        @foreach ($cursos as $curso)
            <li>
                {{-- el método show espera un parámetro, le enviamos el id --}}
                <a href="{{route('cursos.show', $curso->id)}}">{{$curso->name}}</a>
            </li>
        @endforeach

    </ul>
    
    {{$cursos->links()}}

@endsection