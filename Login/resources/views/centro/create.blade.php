@extends('layouts.base')
@section('title', 'Nuevo Centro')

@section('content')

    <h1 class="mb-5 text-center">Alta centro educativo</h1>
    <form>
        <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" placeholder="Nombre">
            </div>
        </div>

        <div class="form-group row">
            <label for="asd" class="col-sm-2 col-form-label">Código ASD</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="asd" placeholder="Nombre">
            </div>
        </div>

        <div class="form-group row">
            <label for="descripcion" class="col-sm-2 col-form-label">Descripción centro</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="descripcion" placeholder="Tipos de estudios disponibles"></textarea>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="fecha_alta" class="col-sm-2 col-form-label">Fecha de alta</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="fecha_alta" placeholder="Fecha de alta">
            </div>
        </div>

        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1"
                            checked>
                        <label class="form-check-label" for="gridRadios1">
                            First radio
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                        <label class="form-check-label" for="gridRadios2">
                            Second radio
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3"
                            disabled>
                        <label class="form-check-label" for="gridRadios3">
                            Third disabled radio
                        </label>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="form-group row">
            <div class="col-sm-2">Guardería</div>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="guarderia">
                    <label class="form-check-label" for="guarderia">
                        Tiene guardería
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" id="categoria">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
          <div class="form-group">
            <label for="ambitos">Elige los ámbitos (ctrl + click) </label>
            <select multiple class="form-control" id="ambitos">
              <option>Infantil</option>
              <option>Primaria</option>
              <option>ESO</option>
              <option>Bachiller</option>
              <option>FP</option>
            </select>
          </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    </form>

@endsection
