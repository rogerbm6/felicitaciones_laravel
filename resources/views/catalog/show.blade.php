@extends('layouts.master')

@section('content')
<div class="row">

    <div class="col-sm-4">

        <img src="{{$cliente['imagen']}}" style="height:200px" class="img-fluid" />

    </div>
    <div class="col-sm-8">

        <h1>{{$cliente['nombre']}}</h1>

        <p><span class="font-weight-bold">correo:</span> {{$cliente['correo']}}</p>
        <p><span class="font-weight-bold">fecha nacimiento:</span> {{$cliente['fecha_nacimiento']}}</p>

        <a type="button" href="#" class="btn btn-warning">editar</a>
        <a type="button" href="/" class="btn btn-primary">&lt;volver</a>

    </div>
</div>

@stop
