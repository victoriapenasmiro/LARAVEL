@extends('layouts.base')
@section('title', 'agenda')

@section('content')

    <h1>@lang('agenda.contacts')</h1>

    <table class="table mt-5 border">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col"></th>
                @can('is-admin')
                    <th scope="col"></th>
                    <th scope="col"></th>
                @endcan
            </tr>
        </thead>
        <tbody>

            @foreach ($contactos as $contacto)
                <tr>
                    <td>{{ $contacto->id }}</td>
                    <td>{{ $contacto->nombre }}</td>
                    <td>{{ $contacto->tlf }}</td>
                    <td><a href="{{ route('agenda.show', [$lang, $contacto]) }}">Ver</a></td>
                    @can('is-admin')
                        <td><a href="{{ route('agenda.edit', [$lang, $contacto]) }}">Editar</a></td>
                        <td>
                            <form action="{{ route('agenda.destroy', [$lang, $contacto]) }}" method="POST">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-dark">Eliminar</button>
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach

        </tbody>
    </table>

    @can('is-admin')
        <a href={{ route('agenda.create', $lang) }} class="text-white text-decoration-none btn btn-primary">{{ __('agenda.addcontact')}}</a>

    @endcan
@endsection
