<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'SCATF') }}</title>
        <link href="images/icon.ico" rel="shortcut icon"/>

        <link rel="stylesheet" href="{{asset('plugins/fontawesome-5.12.1/css/fontawesome.css') }}">
        <link href="{{asset('css/auth/login.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('plugins/bootstrap-4.4.1/css/bootstrap.min.css') }}">

        <script src="{{ asset('plugins/fontawesome-5.12.1/fontawesome.js') }}" ></script>
        <script src="{{ asset('plugins/jquery-3.4.1/jquery.min.js')}}" ></script>
        <script src="{{ asset('js/auth/login.js') }}" ></script>
    </head>
    <body class="login-background">
        <div class="container">
            <div class="row login-text-center">
                <div class="col-xs-12 col-sm-10 col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4><strong>{{ __('RECUPERAR CONTRASEÑA') }}</strong> </h4></div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success text-center" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf<br>
                                <div class="form-group  ">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1" style="background-color:#225B7C"><i class="fas fa-user" style='color:white'></i></span>
                                        </div>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Correo electrónico"> 
                                        @error('email')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror                           
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col text-center"><br>
                                        <button type="submit" class="btn" style="background-color:#225B7C; color:white">
                                            <strong>{{ __('Continuar') }}</strong>
                                            
                                        </button>
                                        <br><br>
                                        <a class="text-center" href="{{ route('login') }}"><strong> O iniciar sesión</strong></a>
                                    </div>
                                </div>
<!--                                 <div class="text-center"><br>
                                    <a href="{{ route('login') }}"> O iniciar sesion</a>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>