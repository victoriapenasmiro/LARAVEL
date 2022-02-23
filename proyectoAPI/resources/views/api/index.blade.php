@extends('layouts.base')
@section('title', 'Pruebas API')

@section('content')

<div id="response"></div>

<button type="button" class="btn btn-primary mr-1" onclick="api_js_index()" id="allCentros">Ver todos</button>
<a href="/LARAVEL/proyectoAPI/public/" class="btn btn-primary mr-1 d-none" id="irInicio">Ir a inicio</button>

<a href="{{ route('centros.create') }}" class="btn btn-success">Crear centro</a>

@endsection