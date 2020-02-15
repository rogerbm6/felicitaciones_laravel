<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/" style="color:#777"><i class="fa fa-home"></i> Felicitaciones APP |</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if(Auth::check() )
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::is('catalog') && ! Request::is('catalog/create')? 'active' : ''}}">
                    <a class="nav-link" href="{{url('/catalog')}}">
                        <span class="fa fa-list" aria-hidden="true"></span>
                        Listado de clientes
                    </a>
                </li>
                <li class="nav-item {{  Request::is('catalog/create') ? 'active' : ''}}">
                    <a class="nav-link" href="{{url('/catalog/create')}}">
                        <span>&#10010;</span> Nuevo cliente
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav navbar-right">
                <li class="nav-item">
                    <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                            <i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar sesión
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        @endif
    </div>
</nav>
