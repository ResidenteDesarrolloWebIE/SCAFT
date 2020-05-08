@extends('layouts.app')
@section('content')
<div class="container-fluid p-0">

    <div class="customer-profile-mobile">
        <div class="col-md-4 menu-customer">
            <div class="d-flex justify-content-center">
                <div class="contorno-avatar">
                    <img class="card-img-top avatar" src="{{asset('images/1.png')}}" alt="Card image">
                </div><br>
            </div>
        </div>
    </div>

    <nav class="col-md-12 navbar navbar-expand-lg navbar-dark navbar-custom bg-navbar">
        <div class="container">
            <a class="navbar-brand logo" href="#"><img src="{{asset('images/IE-Logo1.png')}}"
                    style="height: 30px; width: 30px; margin-right: 60px;" alt="" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link text" href="suministros.html">Inicio</a>
                        <div class="effect"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="suministros.html">Mis suministros</a>
                        <div class="effect"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mis servicios</a>
                        <div class="effect"></div>
                    </li>
                </ul>
                <button type="button" class="btn btn-danger" style="margin-bottom: 5px; margin-right: -90px;">Cerrar
                    sesión</button>
            </div>
        </div>
    </nav>

    <div class="row content-supply m-0">
        <div class="col-md-8 content-projects">
            <div class="col justify-content-center">

                <div class="row info-user m-0">

                    <div class="col content-left">
                        <div class="row">
                            <div class="profile-left">
                                <div class="mini-avatar">
                                    <img class="" src="{{asset('images/1.png')}}">
                                </div>
                            </div>
                            <div class="col-md-10 details"><span>Rodrigo Gonzalez</span><br>
                                <span class="p-0" style="font-size: 20px;font-weight: bold;">Grupo Sheffler</span>
                            </div>
                        </div>
                    </div>
                    <div class="content-right">
                        <div class="float-right col profile-right">
                            <div class="mini-avatar">
                                <img class="" src="{{asset('images/1.png')}}">
                            </div>
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div class="float-right col shade">
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12">

                        <span class="name">Suministros Adquiridos</span>

                        <div class="input-group elements-login" style="margin-bottom: 15px;">
                            <input type="text" class="form-control" placeholder="Buscar" required
                                style="padding:0 0 0 25px; border-radius:10px;position: relative;z-index: 1; height: 30px;">
                            <i class="fas fa-search"
                                style="color: #dbdbdb;position: absolute; left: 7px; top: 7px; z-index: 2;"></i>
                        </div>

                        <div class="col details">
                            <h4 class="m-0" style="font-size: 40px;"></h4>
                            <h5 class="m-0" style="font-size: 20px;"></h6>
                            <h6 class="m-0" style="font-size: 20px;"></h6>
                            <div class="row group-buttons">
                                <div class="col-md-3 col-6"><input class="btn-input black" type="button" value="Todos"></div>
                                <div class="col-md-3 col-6"><input class="btn-input green" type="button" value="En Proceso">
                                </div>
                                <div class="col-md-3 col-6"><input class="btn-input yellow" type="button" value="Terminado">
                                </div>
                                <div class="col-md-3 col-6"><input class="btn-input red" type="button" value="Cancelado">
                                </div>
                            </div>
                        </div>
                        <br>

                    </div>
                    
                    <div class="col-md-12 text-center" style="padding-right: 0;">
                        <div class="row contenedor ">
                            @foreach ($projects as $project)
                                <div class="col-md-12 project" style="margin-top:5px;" onclick="window.location.href = '{{url('/projects/advances/advance',['idProject' => $project->id, 'typeproject' => 1])}}'">
                                    <div class="row bg-image" >
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning" aria-valuenow="80"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 80%; background-color: {{$project->color_text}}">
                                            </div>
                                        </div>
                                        <div style="position: absolute;top: 10%;left: 5%;"> </div>
                                    </div>
                                    <div class="row text" style="background-color: #e5e5e5">
                                        <div class="col-6 text-left">{{$project->folio}}</div>
                                        {{--<div class="col-6 text-right">40%</div>--}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col show-catalogs" style="margin-top: 10px;">
                    <input type="button" class="form-control" value="Ver catalogos de productos"
                        style="background: linear-gradient(to right, #33C2F0 0%, #00436D 100%); color: white;font-weight: bold;">
                </div>

            </div>
            <br>

        </div>

        <div class="col-md-4 bg-image-left">
            <div style="position:absolute;left:0px;bottom:0px;background-color: #33C2F0;opacity: .80;
            ;clip-path: polygon(0 0, 0% 100%, 100% 100%);height: 180px;width: 300px;">
            </div>
            <div style="position:absolute;right:0px;bottom:0px;background-color: #00436D;opacity: .80;
            clip-path: polygon(100% 8%, 0% 100%, 100% 100%);height: 300px;width: 400px;">
            </div>
        </div>

    </div>

</div>
@endsection