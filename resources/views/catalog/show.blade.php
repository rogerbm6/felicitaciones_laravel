@extends('layouts.master')

@section('content')
<div class="row">

    <div class="col-sm-4">

        <img src={{url('storage/clientes/'.$cliente->imagen)}} style="height:200px" class="img-fluid" />

    </div>
    <div class="col-sm-8">

        <h1>{{$cliente->nombre}}</h1>

        <p><span class="font-weight-bold">correo:</span> {{$cliente->correo}}</p>
        <p><span class="font-weight-bold">fecha nacimiento:</span> {{$cliente->fecha_nacimiento}}</p>

        <a type="button" href="/catalog/edit/{{$cliente->id}}" class="btn btn-warning">editar</a>
        <a type="button" href="/catalog" class="btn btn-primary">&lt;volver</a>
        <form action="{{action('CatalogController@putDelete', $cliente->id)}}" method="POST" style="display:inline">
            {{ method_field('DELETE') }}
            {!! csrf_field() !!}
            <button type="submit" class="btn btn-danger" style="display:inline">
                Borrar
            </button>
        </form>


    </div>
</div>

@stop
