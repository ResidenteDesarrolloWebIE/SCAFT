<div id="preloder">
    <div class="loader"></div>
</div>
<header class="encabezado">
    {{-- <nav class="navbar navbar-expand-sm  fixed-top" style="background-color:#19202C">
        <a href="{{url('/home')}}" class="site-logo text-center">
    <img class="logo" src="{{ asset('images/logo-navigationBar.png') }}" alt="">
    </a>
    <button class="navbar-toggler navbar-toggler-right" style="background-color:gray" type="button" data-toggle="collapse" data-target="#navbarToggler">
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse offset-md-1" id="navbarToggler">
        <ul class="navbar-nav mr-auto">

            @if(Auth::user()->hasAnyRole(['Administrador','Ofertas','Ventas','Ingenieria','Manufactura','Servicio','Almacen','Finanzas', 'Lider', 'Consulta']))
            <li class="nav-item">
                <a class="nav-link" href="{{url('/home')}}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('projects')}}">Lista de proyectos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('users')}}">Lista de Usuarios</a>
            </li>
            @elseif(Auth::user()->hasAnyRole(['Cliente']))
            <li class="nav-item">
                <a class="nav-link " href="{{url('/home')}}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('projects/supplies')}}">Suministros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('projects/services')}}"> Servicios</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link"> El rol asignado no existe</a>
            </li>
            @endif
        </ul>
        <div class="text-center">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="nameUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-transform: uppercase">
                    {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                    <a class="dropdown-item text-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        {{ __('Cerrar sesión') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    </nav> --}}
    <nav class="col-12 navbar navbar-expand-lg navbar-dark navbar-custom  bg-navbar m-0">
        <div class="container m-0">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item icon pt-1 pr-5">
                        <img src="{{ asset('images/icon.png') }}" style="filter: grayscale(100);" alt="" height="30px" width="30px">
                    </li>
                    @if(Auth::user()->hasAnyRole(['Administrador','Ofertas','Ventas','Ingenieria','Manufactura','Servicio','Almacen','Finanzas', 'Lider', 'Consulta']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/home')}}">Inicio</a>
                        <div class="effect"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('projects')}}">Lista de proyectos</a>
                        <div class="effect"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('users')}}">Lista de Usuarios</a>
                        <div class="effect"></div>
                    </li>
                    @elseif(Auth::user()->hasAnyRole(['Cliente']))
                    <li class="nav-item">
                        <a class="nav-link text" href="{{url('/home')}}">Inicio</a>
                        <div class="effect"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('projects/supplies')}}">Mis suministros</a>
                        <div class="effect"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('projects/services')}}">Mis servicios</a>
                        <div class="effect"></div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link"> El rol asignado no existe</a>
                    </li>
                    @endif
                </ul>
                <a class="btn btn-danger btn-logout" href="{{ route('logout') }}" style="margin-bottom: 5px;" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    {{ __('Cerrar sesión') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
</header>