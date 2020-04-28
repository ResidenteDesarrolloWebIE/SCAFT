<nav class="col-8 navbar navbar-expand-lg navbar-dark navbar-custom  bg-navbar">
    <div class="container">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text"  href="{{url('/home')}}">Inicio</a>
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
            </ul>
            <a class="btn btn-danger" href="{{ route('logout') }}" style="margin-bottom: 5px;" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Cerrar sesión') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>                                                
        </div>
    </div>
</nav>