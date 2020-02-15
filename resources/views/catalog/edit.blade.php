@extends('layouts.master')

@section('content')
<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
        <div class="card">
            <div class="card-header text-center">
                Modificar cliente
            </div>
            <div class="card-body" style="padding:30px">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <fieldset class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Enter name" value={{$cliente->nombre}}>
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" name="imagen" class="form-control">
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control"
                        value={{$cliente->fecha_nacimiento}}>
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="correo">Correo electronico</label>
                        <input type="email" name="correo" id="email" class="form-control" value={{$cliente->correo}}>
                    </fieldset>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                            Modificar cliente
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@stop
