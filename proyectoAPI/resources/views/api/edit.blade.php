@extends('layouts.base')
@section('title', 'Editar centro ' . $centro->nombre)

@section('content')

    <h1 class="mb-5 text-center">Editar centro {{ $centro->nombre }}</h1>

    {{-- llamando al API directamente <form action="{{ route('apirest.update', $centro->id) }}" method="POST" id="editForm"> --}}
    {{-- AJAX --}}
    <form onsubmit="api_js_edit(this, {{ $centro->id }})" id="editForm">

        {{-- <form action="{{ '/LARAVEL/proyectoAPI/public/api/apirest/' . $centro->id }}" id="editForm"> --}}

        {{-- token --}}
        @csrf

        @method("put")

        <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="nombre"
                    placeholder="{{ __('centros.nombre') }}" value="{{ old('nombre', $centro->nombre) }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="asd" class="col-sm-2 col-form-label">Codigo ASD</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="asd" name="cod_asd"
                    value="{{ old('cod_asd', $centro->cod_asd) }}" placeholder="{{ __('centros.asd') }}">

            </div>
        </div>

        <div class="form-group row">
            <label for="fecha_alta" class="col-sm-2 col-form-label">Fecha alta</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="fecha_alta" name="fec_comienzo_actividad"
                    value="{{ old('fec_comienzo_actividad', $centro->fec_comienzo_actividad) }}">
            </div>
        </div>

        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="opcion_radio" id="radio1" value="option1"
                            {{-- Si no existe y no es la primera vez que se accede al registro se marca checked --}}
                            @if (old('opcion_radio') == 'option1') checked 
                            @elseif($centro->opcion_radio === 'option1') checked @endif>
                        <label class="form-check-label" for="radio1">
                            primer_radio
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="opcion_radio" id="radio2" value="option2"
                            @if (old('opcion_radio') == 'option2') checked
                            @elseif($centro->opcion_radio === 'option2') checked @endif>
                        <label class="form-check-label" for="radio2">
                            Segundo_radio
                        </label>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="form-group row">
            <div class="col-sm-2">Guarderia</div>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="guarderia" name="guarderia" value="1"
                        {{-- Si no existe y no es la primera vez que se accede al registro se marca checked --}}
                        @if (old('guarderia')) checked @elseif($centro->guarderia) checked @endif>
                    <label class="form-check-label" for="guarderia">
                        Con guarderia
                    </label>
                </div>

            </div>
        </div>
        <div class="form-group">
            <label for="categoria">{{ __('centros.categoria') }}</label>
            <select class="form-control" id="categoria" name="categoria">

                @for ($i = 0; $i < 6; $i++)
                    @if ($i === 0)
                        <option disabled selected>Selecciona</option>
                    @else
                        <option value="{{ $i }}"
                            {{ old('categoria', $centro->categoria) == $i ? 'selected' : '' }}>
                            {{ $i }}</option>
                    @endif
                @endfor
            </select>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('centros') }}" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </form>

@endsection
