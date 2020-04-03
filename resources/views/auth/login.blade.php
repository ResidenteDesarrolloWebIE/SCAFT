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

<body class="login-background" >
    <div class="container">
        <div class="row login-text-center">
            <div class="col-xs-8 col-sm-6 col-md-5">
                <div class="card" id="card1">

                    <div class="card-header text-center" style="background-color:#DEDBDB">
                        <h4>{{ __('BIENVENIDO') }}</h4>
                        <img class="login-image" src="{{ asset('images/logo-login.png')}}" class="card-img-top">
                    </div>

                    <div class="card-body" style="background-color:#DEDBDB">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="background-color:#3982ab" id="basic-addon1">
                                            <i class="fas fa-user" style='color:white'></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electrónico"> @error('email')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text login-icon-color" id="pass" style="background-color:#3982ab"><i class="fas fa-key" style='color:white'></i></span>
                                    </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">

                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="showPassword()" style="background-color:#3982ab"><i class="fas fa-eye" style='color:white'></i></span>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <!-- form-group  -->
                                <div class="col offset-md-1" style="margin-top:10px">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" style="background-colorcolor: blue" for="remember">
                                            <strong>{{ __('Recordar contraseña') }}</strong>
                                        </label>
                                    </div>
                                </div><br><br>
                            </div>

                            <br>
                            <div class=" row text-center">
                                <div class="col offset-md-1">
                                    <button type="submit" class="login-btn">{{ __('Iniciar sesión') }}</button>
                                </div>
                            </div>
                            <div class=" row text-center" style="margin-top:12px">
                                <div class="col offset-md-1">
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        <strong>{{ __('¿Olvidaste tu contraseña?') }}</strong>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>