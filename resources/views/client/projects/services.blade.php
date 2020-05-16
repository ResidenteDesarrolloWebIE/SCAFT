@extends('layouts.app')
@section('content')
<div class="container-fluid p-0">
    @include('layouts.partials._navigationBar')
    <div class="customer-profile-mobile">
        <div class="col-md-4 menu-customer">
            <div class="d-flex justify-content-center">
                <div class="contorno-avatar">
                    <img class="card-img-top avatar" src="{{asset($user->contacts[0]->profile_picture)}}" alt="Card image">
                </div><br>
            </div>
        </div>
    </div>
    <div class="row content-supply m-0">
        <div class="col-md-8 content-projects">
            <div class="col justify-content-center">
                {{--<div class="row info-user m-0">
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
                </div> --}}

                <div class="row info-user m-0">
                    <div class="col content-left">
                        <div class="row">
                            <div class="profile-left ">
                                <div class="mini-avatar">
                                    <img class="" src="{{ asset($user->contacts[0]->profile_picture) }}">
                                </div>
                            </div>
                            <div class="col-md-10 details">
                                <span style="font-size: 20px;font-weight: bold;">{{Auth::user()->name}}</span><br>
                                <span class="p-0" style="font-size: 20px;font-weight: bold;">Integración de energia</span>
                            </div>
                        </div>
                    </div>
                    <div class="content-right">
                        <div class="float-right col profile-right">
                            <div class="mini-avatar">
                                <img class="" src="{{ asset($user->contacts[0]->profile_picture) }}">
                            </div>
                            <i class="fas fa-info-circle info"></i>
                        </div>
                        <div class="float-right col shade">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span class="name">Servicios Adquiridos</span>
                        <form method="GET" action="{{url('projects/services')}}" class="input-group elements-login" style="margin-bottom: 15px;">
                            <input type="text" class="form-control" placeholder="Buscar"
                                style="padding:0 0 0 25px; border-radius:10px;position: relative;z-index: 1; height: 30px;"
                                name="search"
                            >
                            <i class="fas fa-search"
                                style="color: #dbdbdb;position: absolute; left: 7px; top: 7px; z-index: 2;"></i>
                                <input class="btn-search" type="submit"  value="Buscar">
                        </form>
                        <div class="col details">
                            <div class="row group-buttons">
                                <div class="col-md-3 col-6 mb-1"><input class="btn-status orange" type="button" value="Pendiente"></div>
                                <div class="col-md-3 col-6 mb-1"><input class="btn-status green" type="button" value="En Proceso"></div>
                                <div class="col-md-3 col-6 mb-1"><input class="btn-status yellow" type="button" value="Terminado"></div>
                                <div class="col-md-3 col-6 mb-1"><input class="btn-status red" type="button" value="Cancelado"></div>
                            {{--
                                <div class="col-md-3 col-6 mb-1"><input class="btn-status orange" onclick="window.location.href ='{{url('projects/services?search=pendiente')}}'" type="button" value="Pendiente"></div>
                                <div class="col-md-3 col-6 mb-1"><input class="btn-status green" onclick="window.location.href ='{{url('projects/services?search=proceso')}}'" type="button" value="En Proceso"></div>
                                <div class="col-md-3 col-6 mb-1"><input class="btn-status yellow" onclick="window.location.href ='{{url('projects/services?search=terminado')}}'" type="button" value="Terminado"></div>
                                <div class="col-md-3 col-6 mb-1"><input class="btn-status red" onclick="window.location.href ='{{url('projects/services?search=cancelado')}}'" type="button" value="Cancelado"></div>
                            --}}
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
                                                aria-valuemin="0" aria-valuemax="100" style="width: 100%; background-color: {{$project->color_text}}">
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
            </div> <br>
        </div>
        <div class="col-md-4 bg-image-right">
            <div class="triangle-left"> </div>
            <div class="triangle-right"> </div>
        </div>
    </div>
</div>
@endsection