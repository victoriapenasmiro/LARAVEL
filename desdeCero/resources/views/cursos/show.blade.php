@extends('layouts.plantilla')

@section('title', "Curso $curso")

@section('content')
    <h1>Bienvenido al curso: {{$curso}}
    
    <?php
    
        if (isset($categoria)) echo " de la categoria: $categoria";
    
    ?>
    
</h1>
@endsection