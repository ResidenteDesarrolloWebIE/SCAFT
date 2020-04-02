@extends('layouts.app')
@section('content')

<head>
    <link href="/css/minutes.css" rel="stylesheet">
</head>

@section('content')
<section class="section-projects-admin py-2 text-xs-center">
    <div class="fondo">
        @include('layouts.partials._navigationBar')
        <div class="container container-projects-admin">
            <div class="row table-responsive text-center projects-table">
                <h1 class="text-center">LISTA DE MINUTAS</h1>
                @if( (Auth::user()->hasRole('Lider') && Auth::user()->hasRole('Ventas')) || Auth::user()->hasAnyRole(['Administrador','Ofertas']))
                <div class="offset-md-8 col-md-4 text-right">
                    <button id="btnProject" type="button" class="btn btn-dark" onclick="openModalAddMinute({{$project}})">
                        Agregar Minuta <i class="fas fa-plus"></i>
                    </button>
                </div>
                @endif
                <br>
                <table class="table text-center table-sm-responsive" id="tableMinutes">
                    <thead class="table-success" style="background-color: #252b37">
                        <tr>
                            <th>Folio</th>
                            <th>Tipo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($minutes as $minute)
                        <tr>
                            <td>{{$minute->folio}}</td>
                            <td>{{$minute->type}}</td>
                            <td>
                                <button data-toggle="modal" data-target="#modalAgreements" type="button" class="btn btn-primary" title="Ver Acuerdos" onclick="getAgreements({{$minute->id}})"><i class="fas fa-eye"></i></button>
                                <a href="/exportMinute/{{$minute->id}}"><button type="button" class="btn btn-dark" title="Descargar PDF"><i class="fas fa-file-alt"></i></button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('admin/projects/internalMinuta')
        @include('admin/projects/modalAgreements')
        <div class="fondo">
</section>
@endsection