@extends('layouts.master')

@section('content')
<div class="row">

    <div class="col-sm-4">

        <img src="https://vignette.wikia.nocookie.net/berserk/images/4/43/Guts_halc%C3%B3n.jpg/revision/latest/scale-to-width-down/340?cb=20160323161125&path-prefix=es{{$cliente->imagen}}" style="height:200px" class="img-fluid" />

    </div>
    <div class="col-sm-8">

        <h1>{{$cliente->nombre}}</h1>

        <p><span class="font-weight-bold">correo:</span> {{$cliente->correo}}</p>
        <p><span class="font-weight-bold">fecha nacimiento:</span> {{$cliente->fecha_nacimiento}}</p>

        <a type="button" href="/catalog/edit/{{$cliente->id}}" class="btn btn-warning">editar</a>
        <a type="button" href="/" class="btn btn-primary">&lt;volver</a>

    </div>
</div>

@stop
