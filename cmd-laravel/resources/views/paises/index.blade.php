@extends('layouts.base')
@section('title', 'Listados de Paises')

@section('content')

    <h1 class="my-5 text-center">@lang('paises.listado') de @lang('paises.pais')</h1>

    <a href="{{ route('paises.create', $lang) }}"
        style="padding: 10px; border: 2px solid black; background: grey; color:white; display:block; width: fit-content; margin: 0 auto; margin-bottom: 30px;">Crear
        Nuevo Pais</a>

    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">codigoISO3</th>
                <th scope="col">codigoISO2</th>
                <th scope="col">cod_numerico</th>
                <th scope="col">nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paises as $pais)
                <tr>
                    <td scope="row">{{ $pais->codigoISO3 }}</td>
                    <td>{{ $pais->codigoISO2 }}</td>
                    <td>{{ $pais->cod_numerico }}</td>
                    <td>{{ $pais->nombre }}</td>
                    <td><a href={{ route('paises.show', [$lang, $pais]) }}>Ver</a></td>
                    <td><a href={{ route('paises.edit', [$lang, $pais]) }}>Edit pais</a></td>
                    <td>

                        <form action="{{ route('paises.destroy', [$lang, $pais]) }}" method="POST">
                            @csrf
                            @method('delete')

                            <button type="submit">Eliminar</button>
                        </form>

                </tr>
            @endforeach

        </tbody>
    </table>

@endsection
