@extends('layouts.master')

@section('content')
<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
        <div class="card">
            <div class="card-header text-center">
                Añadir cliente
            </div>

            @if ($errors->any())

            <div class="row justify-content-center">
                <div class="col-sm-7">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            @endif

            <div class="card-body" style="padding:30px">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Enter name" value={{old('nombre')}}>
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" name="imagen">
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control"value={{old('fecha_nacimiento')}}>
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="correo">Correo electronico</label>
                        <input type="text" name="correo" id="email" class="form-control" value={{old('correo')}}>
                    </fieldset>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                            Añadir cliente
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@stop
