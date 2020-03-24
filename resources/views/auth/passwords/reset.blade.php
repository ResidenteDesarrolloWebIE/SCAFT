<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'SCATF') }}</title>
        <link href="{{asset('images/icon.ico')}}" rel="shortcut icon"/>

        <link rel="stylesheet" href="{{asset('plugins/fontawesome-5.12.1/css/fontawesome.css') }}">
        <link href="{{asset('css/auth/login.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('plugins/bootstrap-4.4.1/css/bootstrap.min.css') }}">

        <script src="{{ asset('plugins/fontawesome-5.12.1/fontawesome.js') }}" ></script>
        <script src="{{ asset('plugins/jquery-3.4.1/jquery.min.js')}}" ></script>
        <script src="{{ asset('js/auth/login.js') }}" ></script>
    </head>
    <body class="login-background">
        <div id="container">
            <div class="row login-text-center"   >
                <div class="col-xs-12 col-sm-8 col-md-5">
                    <div class="card">
                            <div class="card-header text-center" >
                                <h4><strong>{{ __('RESTABLECER CONTRASEÑA') }}</strong></div></h4>
                                <div class="card-body" style="padding-left:70px;padding-right:70px">
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label> -->
                                                <!-- <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="background-color:#225B7C">
                                                        <i class="fas fa-user" style='color:white'></i></span>
                                                </div> -->
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
                                                    value="{{ $email ?? old('email') }}" placeholder="Correo electrónico"  autocomplete="email" hidden >
                                                    @error('email')
                                                        <span class="invalid-feedback text-center" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="input-group">
                                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label> -->
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text login-icon-color" id="pass" style="background-color:#225B7C"><i
                                                            class="fas fa-key" style='color:white'></i></span>
                                                            
                                                </div>        
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" onclick="showPassword()"
                                                        style="background-color:#225B7C"><i class="fas fa-eye"
                                                            style='color:white'></i></span>
                                                </div>
                                                @error('password')
                                                        <span class="invalid-feedback text-center" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text login-icon-color" id="pass" style="background-color:#225B7C">
                                                        <i class="fas fa-check-circle" style='color:white'></i>
                                                    </span>
                                                </div>
                                            <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label> -->
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn" style="background-color:#225B7C;color:white;margin-top:10px"> 
                                                    {{ __('Restablecer') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
