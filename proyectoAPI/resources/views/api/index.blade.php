@extends('layouts.base')
@section('title', 'Pruebas API')

@section('content')

<div id="response"></div>

<button type="button" class="btn btn-primary" onclick="api_js_index()">Ver todos</button>
<a href="{{ route('centros.create') }}" class="btn btn-success">Crear centro</a>

@endsection