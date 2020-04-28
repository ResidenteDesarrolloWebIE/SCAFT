<!doctype html>

<head>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<meta http-equiv="Pragma" content="no-cache" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Expires" content="0" />--}}
    <meta charset="utf-8">

    <title>{{ config('app.name', 'SCATF') }}</title>
    <link href="images/icon.ico" rel="shortcut icon" />

    <link rel="stylesheet" href="{{asset('plugins/fontawesome-5.12.1/css/fontawesome.css') }}">
    <link href="{{asset('css/auth/login.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-4.4.1/css/bootstrap.min.css') }}">

    <script src="{{ asset('plugins/fontawesome-5.12.1/fontawesome.js') }}"></script>
    <script src="{{ asset('plugins/jquery-3.4.1/jquery.min.js')}}"></script>
    <script src="{{ asset('js/auth/login.js') }}"></script>
</head>

<body>
    <div class="container-fluid bg-e5" style="padding: 0px; margin:0px">
        <div class="row login" style="padding: 0px; margin:0px">
            <div class="col-md-8 bg-e5 bg" style="padding: 0px; margin:0px;">
                <div class="col bg-image center-vertically" style="justify-content: flex-end">
                    <div class="col-md-8 text-1" style="padding: 20px 0px 20px 20px">
                        Bienvenido <br>
                        <span class="title">IE PROJECTS</span><br>
                        <p>
                            Es una plataforma digital, en la cual nuestros clientes
                            tienen acceso a un portal de todo el proceso de contruccion
                            o produccion de sus infraestructuras o servicios adquiridos.
                        </p>
                        <p>
                            En integracion de Energia nos preocupamos siempre por el apoyo
                            a nuestros clientes.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 center form bg-e5" style="position:relative">
                <div class="card center-horizontally bg-e5">
                    <div class="center-horizontally">
                        <img class="img-logo" src="{{ asset('images/ie-logo-lg.png')}}" alt="">
                    </div>
                    <div class="card-body" style="padding: 0px">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="input-group center-horizontally input-email">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text "><i class="fas fa-user"></i> </span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electrónico"> @error('email')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="input-group center-horizontally input-email">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-eye"></i> </span>
                                    </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                                    @error('password')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-check text-center input-remenber">
                                <input class="form-check-input " type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Recordar contraseña
                                </label>
                            </div>
                            <div class="form-group row" style="margin-bottom:inherit">
                                <div class="input-group">
                                    <input type="submit" class="btn form-control btn-ingresar" value="Ingresar">
                                </div>
                            </div>
                            <div class="col center-horizontally">
                                @if (Route::has('password.request'))
                                <a class="forgot-password" href="{{ route('password.request') }}">
                                    <strong>¿Olvidaste tu contraseña?</strong>
                                </a>
                                @endif
                            </div>
                        </form>
                        
                    </div>
                    
                </div>
                <div class="text-right" style="position:absolute;bottom:0px">
                <span><i class="fab fa-whatsapp" style="color:green"></i>  Contacto de soporte: 4421090441</span>
                        
                    </div>
            </div>
            <div class="row " style="margin:0px;">
                <div class="col-md-8 text-white text-mv" style="margin-left:0px;">
                    <div class="content">
                        Bienvenido <br>
                        <span class="title">IE PROJECTS</span><br>
                        <p>
                            Es una plataforma digital, en la cual nuestros clientes
                            tienen acceso a un portal de todo el proceso de contruccion
                            o produccion de sus infraestructuras o servicios adquiridos.
                        </p>
                        <p>
                            En integracion de Energia nos preocupamos siempre por el apoyo
                            a nuestros clientes.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>