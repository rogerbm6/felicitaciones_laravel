@extends('layouts.master')

@section('content')

  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">

      <div class="card p-5">
        <div class="card-block">
          <h4 class="card-title">login</h4>
          <form>
            <fieldset class="form-group">
              <label for="formGroupExampleInput">Ususario</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="ejemplo@email.com">
            </fieldset>
            <fieldset class="form-group">
              <label for="formGroupExampleInput2">contraseña</label>
              <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="***********">
            </fieldset>
          </form>
          <a href="#" class="btn btn-primary">Button</a>
        </div>
      </div>

    </div>
    <div class="col-md-4"></div>
  </div>

@stop
