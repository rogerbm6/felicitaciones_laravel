@extends('layouts.master')

@section('content')

<div class="row">

    @foreach( $arrayClientes as $key => $cliente )
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">

        <a href="{{ url('/catalog/show/' . $cliente->id ) }}">
            <img src="https://vignette.wikia.nocookie.net/berserk/images/4/43/Guts_halc%C3%B3n.jpg/revision/latest/scale-to-width-down/340?cb=20160323161125&path-prefix=es{{$cliente->image}}" style="height:200px" />
            <h4 style="min-height:45px;margin:5px 0 10px 0">
                {{$cliente->nombre}}
            </h4>
        </a>

    </div>
    @endforeach

</div>

@stop
