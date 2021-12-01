@extends('layouts.base')
@section('title', 'formulario con validación')

@section('content')

    <h1 class="my-5 text-center">Formulario con validación</h1>

    @php
    //creo una sesion para almacenar el valor del idioma actual
    //y así poderlo recuperar desde el store
    Session::put('lang', $lang);
    @endphp

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- como muestro el nombre del campo? --}}

    <form class="border p-5" action="{{ route('registro.store') }}" method="POST">

        {{-- genero token para poder enviar el formulario. Directiva obligatoria en Laravel --}}
        @csrf

        <div class="form-row">
            <div class="form-group col-md-6">

                <label for="inputEmail4">{{ __('form.email') }}</label>
                <input type="email" class="form-control" id="inputEmail4" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="alert alert-danger"><small>*{{ $message }}</small></div>
                @enderror

            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">{{ __('form.pw') }}</label>
                <input type="password" class="form-control" id="inputPassword4" name="pw">
                @error('pw')
                    <div class="alert alert-danger"><small>*{{ $message }}</small></div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">@lang("form.address")</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address"
                value="{{ old('address') }}">
            @error('address')
                <div class="alert alert-danger"><small>*{{ $message }}</small></div>
            @enderror
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">@lang("form.city")</label>
                <input type="text" class="form-control" id="inputCity" name="city" value="{{ old('city') }}">
                @error('city')
                    <div class="alert alert-danger"><small>*{{ $message }}</small></div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">@lang("form.state")</label>
                <select id="inputState" class="form-control" name="state">
                    <option value="1" @if (old('state') === '1') {{ 'selected' }} @endif>Option 1</option>
                    <option value="2" @if (old('state') === '2') {{ 'selected' }} @endif>Option 2</option>
                    <option value="3" @if (old('state') === '3') {{ 'selected' }} @endif>Option 3</option>
                </select>
                @error('state')
                    <div class="alert alert-danger"><small>*{{ $message }}</small></div>
                @enderror
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">{{ __('form.cp') }}</label>
                <input type="text" class="form-control" id="inputZip" name="zip" value="{{ old('zip') }}">
                @error('zip')
                    <div class="alert alert-danger"><small>*{{ $message }}</small></div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" name="check"
                    {{ old('check') == 'on' ? 'checked' : '' }}>
                <label class="form-check-label" for="gridCheck">
                    {{ __('form.check') }}
                </label>
                @error('check')
                    <div class="alert alert-danger"><small>*{{ $message }}</small></div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('form.save') }}</button>
    </form>

@endsection
