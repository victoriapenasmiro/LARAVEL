@extends('layouts.base')
@section('title', 'Nuevo Centro')

@section('content')

    <h1 class="mb-5 text-center">Nuevo centro</h1>

    {{-- Para hacerlo llamandi al api del controlador directamente: <form action="{{ route('apirest.store') }}" method="POST" enctype="multipart/form-data"> --}}
    {{-- AJAX --}}
        <form onsubmit="api_js_create(this)" id="createForm">
    {{-- fetch --}}
    {{-- <form action="/LARAVEL/proyectoAPI/public/api/apirest" id="createForm"> --}}

        {{-- genero token para poder enviar el formulario. Directoiva obligatoria en Laravel --}}
        @csrf

        <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del centro"
                    value="{{ old('nombre') }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="asd" class="col-sm-2 col-form-label">Código ASD</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="asd" name="cod_asd" value="{{ old('cod_asd') }}"
                    placeholder="Código ASD" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="fecha_alta" class="col-sm-2 col-form-label">Fecha de alta</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="fecha_alta" name="fec_comienzo_actividad"
                    value="{{ old('fec_comienzo_actividad') }}" placeholder="Fecha de alta" required>
            </div>
        </div>

        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="opcion_radio" id="radio1" value="option1"
                            {{ old('opcion_radio') == 'option1' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="radio1">
                            Primer radio
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="opcion_radio" id="radio2" value="option2"
                            {{ old('opcion_radio') == 'option2' ? 'checked' : '' }}>
                        <label class="form-check-label" for="radio2">
                            Segundo radio
                        </label>
                    </div>
                </div>

            </div>
        </fieldset>
        <div class="form-group row">
            <div class="col-sm-2">Guardería</div>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="guarderia" name="guarderia" value="1"
                        {{ old('guarderia') ? 'checked' : '' }} required>
                    <label class="form-check-label" for="guarderia">
                        Con guardería
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" id="categoria" name="categoria" required>

                @for ($i = 0; $i < 6; $i++)
                    @if ($i === 0)
                        <option disabled selected value="">Selecciona</option>
                    @else
                        <option value="{{ $i }}" {{ old('categoria') == $i ? 'selected' : '' }}>
                            {{ $i }}</option>
                    @endif
                @endfor

            </select>

        </div>

        <div class="form-group row mt-3">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-success">Registrar</button>
                <a href="{{ route('centros') }}" class="btn btn-primary">Volver</a>
            </div>
        </div>

    </form>
@endsection
