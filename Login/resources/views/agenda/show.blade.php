@extends('layouts.base')
@section('title', 'Contacto' . $contacto->id)

@section('content')

    <ul>
        <li>id: {{ $contacto->id }}</li>
        <li>nombre: {{ $contacto->nombre }}</li>
        <li>Teléfono: {{ $contacto->tlf }}</li>
    </ul>

    @can('is-admin')
    <div class="d-flex"> <a href="{{ route('agenda.edit', [$lang, $contacto]) }}"
            class="text-white text-decoration-none btn btn-success mb-4 mr-2">Editar</a>
        <form action="{{ route('agenda.destroy', [$lang, $contacto]) }}" method="POST">
            @csrf
            @method('delete')

            <button type="submit" class="btn btn-dark">Eliminar</button>
        </form>
    </div>
    @endcan

    <a href="{{ route('agenda.index', $lang) }}" class="text-white text-decoration-none btn btn-primary">Volver a los
        contactos</a>

@endsection