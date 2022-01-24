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
                @can('create', $is_admin)
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
                    <td><a href="{{ route('agenda.show', [$lang, $contacto]) }}" class="btn btn-primary">Ver</a></td>

                    <td>
                        @can('update', $is_admin)
                            <a href="{{ route('agenda.edit', [$lang, $contacto]) }}"
                                class="btn btn-success">Editar</a>
                        @endcan
                    </td>
                    <td>
                        @can('delete', $is_admin)
                            <form action="{{ route('agenda.destroy', [$lang, $contacto]) }}" method="POST">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-dark">Eliminar</button>
                            </form>
                        @endcan
                    </td>
                
            </tr>
        @endforeach

    </tbody>
</table>

@can('create', $is_admin)
    <a href={{ route('agenda.create', [$lang]) }}
        class="text-white text-decoration-none btn btn-primary mb-4">{{ __('agenda.addcontact') }}</a>

@endcan
@endsection
