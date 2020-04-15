@extends('layouts.app')
@section('content')

<head>
    <link href="/css/user.css" rel="stylesheet">
</head>
@section('content')
<section class="section-projects-admin py-2 text-xs-center">
    <div class="fondo">
        @include('layouts.partials._navigationBar')
        <div class="container container-projects-admin">
            <div class="row table-responsive text-center projects-table">
                <h1 class="text-center" style="font-family: Arial" style="color:black" >LISTA DE USUARIOS</h1>

                @if(Auth::user()->hasAnyRole(['Administrador']))
                    <div class="offset-md-8 col-md-4 text-right">
                        <a data-toggle="modal" data-target="#createUser">
                            <button id="btnUser" type="button" class="btn btn-dark">
                                Crear nuevo usuario &nbsp;&nbsp;<i class="fas fa-plus"></i>
                            </button>
                        </a>
                    </div>
                @endif

                <br>
                <table class="table text-center table-sm-responsive" id="tableUsers">
                    <thead style="background-color: #252b37">
                        <tr>
                            <th style="color:white"> Id</th>
                            <th style="color:white"> Tipo</th>
                            <th style="color:white"> Codigo</th>
                            <th style="color:white"> Nombre</th>
                            <th style="color:white"> E-mail</th>
                            <th style="color:white"> Telefono</th>
                            <th class="col-md-3" style="color:white"> Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            @if(is_null($user->code))
                                <td>EMPLEADO</td>
                            @else
                                <td>CLIENTE</td>
                            @endif
                            <td>{{$user->code}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            @if(count($user->contacts)>0)
                                <td>{{$user->contacts[0]->cellphone}}</td>
                            @else
                                <td>Sin teléfono</td>
                            @endif
                            <td>
                                @if(Auth::user()->hasAnyRole(['Administrador']))
                                    <a data-toggle="modal" data-target="#editUser">
                                        <button type="button" class="btn btn-primary" title="Editar Usuario" onclick="openModalEditUser({{$user}})"><i class="fas fa-edit"></i></button>
                                    </a>
                                @else
                                    ..........
                                @endif
                            </td>
                        </tr>
                        @empty
                        <p>No hay datos</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @include('admin/users/create')
        @include('admin/users/edit')
</section>
@endsection