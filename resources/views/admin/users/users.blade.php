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
                <h1 class="text-center">LISTA DE USUARIOS</h1>
                <div class="offset-md-8 col-md-4 text-right">
                    <a data-toggle="modal" data-target="#createUser">
                        <button id="btnUser" type="button" class="btn btn-dark">
                            Crear nuevo usuario<i class="fas fa-exchange-alt"></i>
                        </button>
                    </a>
                </div>
                <br>
                <table class="table text-center table-sm-responsive" id="tableUsers">
                    <thead style="background-color: #252b37">
                        <tr>
                            <th> Id</th>
                            <th> Codigo</th>
                            <th> Nombre</th>
                            <th> E-mail</th>
                            <th class="col-md-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->code}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a data-toggle="modal" data-target="#editUser">
                                    <button type="button" class="btn btn-primary" title="Editar Usuario"><i class="fas fa-edit"></i></button>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <p>No hay datos</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{--@include('admin/users/create')--}}
</section>
@endsection