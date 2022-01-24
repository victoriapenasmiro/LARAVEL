@extends('layouts.base')
@section('title', 'Contacto' . $contacto->id)

@section('content')

    <ul>
        <li>id: {{ $contacto->id }}</li>
        <li>nombre: {{ $contacto->nombre }}</li>
        <li>Teléfono: {{ $contacto->tlf }}</li>
    </ul>


    <div class="d-flex">
        @can('update', $contacto) <!-- check if is_admin - update policy -->
            <a href="{{ route('agenda.edit', [$lang, $contacto]) }}"
                class="text-white text-decoration-none btn btn-success mb-4 mr-2">Editar</a>
        @endcan

        @can('delete', $contacto) <!-- check if is_admin - delete policy -->
            <form action="{{ route('agenda.destroy', [$lang, $contacto]) }}" method="POST">
                @csrf
                @method('delete')

                <button type="submit" class="btn btn-dark">Eliminar</button>
            </form>
        @endcan
    </div>


    <a href="{{ route('agenda.index', $lang) }}" class="text-white text-decoration-none btn btn-primary">Volver a los
        contactos</a>

@endsection
