@extends('layouts.app')
@section('content')


@section('content')
<section class="section-projects-admin py-2 text-xs-center">
    <div class="fondo">
        @include('layouts.partials._navigationBar')
        <div class="container container-projects-admin">
            <div class="row table-responsive text-center projects-table">
                <h1 class="text-center" style="font-family: Arial; color:black">LISTA DE MINUTAS</h1>
                @if( (Auth::user()->hasRole('Lider') && Auth::user()->hasRole('Ventas')) || Auth::user()->hasAnyRole(['Administrador','Ofertas']))
                <div class="offset-md-8 col-md-4 text-right">
                    <button id="btnProject" type="button" class="btn btn-dark" onclick="openModalAddMinute({{$project}})">
                        Agregar Minuta <i class="fas fa-plus"></i>
                    </button>
                    <a href="/projects"><button id="btnProject" type="button" class="btn btn-dark">
                            Ver proyectos <i class="fas fa-undo"></i>
                        </button></a>
                </div>
                @endif
                <br>
                <table class="table text-center table-sm-responsive" id="tableMinutes">
                    <thead class="table-success" style="background-color: #252b37">
                        <tr class="color-th-admin">
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
                                <button data-toggle="modal" data-target="#modalAgreements" type="button" class="btn btn-primary" title="Listar acuerdos" onclick="getAgreements({{$minute->id}})"><i class="fas fa-list"></i></button>
                                <a href="/exportMinute/{{$minute->id}}"><button type="button" class="btn btn-dark" title="Descargar PDF"><i class="fas fa-file-alt"></i></button></a>
                                <a href="/minutas/showPdf/{{$minute->id}}" target="_blank">
                                    <button type="button" class="btn btn-primary" title="Ver Minuta"><i class="fas fa-eye"></i></button>
                                </a>
                                @if( ( $minute->type == "EXTERNA" && (Auth::user()->hasRole('Lider') && Auth::user()->hasRole('Ventas')) ) || Auth::user()->hasRole('Administrador'))
                                    <a href="/agreements/{{$minute->id}}"><button type="button" class="btn btn-dark" title="Ver acuerdos"><i class="fas fa-external-link-alt"></i></button></a>
                                    @if($minute->file_id == null)
                                    <button  data-toggle="modal" data-target="#modalMinuteSignedFile" type="button" class="btn btn-primary"  title="Agregar Minuta firmada" onclick="openModalAddFile({{$minute->id}})"><i class="fas fa-upload"></i></button>
                                    @else
                                    <a href="/minutas/downloadMinuteSigned/{{$minute->file_id}}" target="_blank">
                                        <button type="button" class="btn btn-primary" title="Descargar Minuta firmada"><i class="fas fa-file"></i></button>
                                    </a>
                                    @endif
                                @elseif ( ($minute->type == "INTERNA" && Auth::user()->hasRole('Ofertas')) || Auth::user()->hasRole('Administrador')) <!-- (Auth::user()->hasRole('Lider') && Auth::user()->hasRole('Ventas')) -->
                                    <a href="/agreements/{{$minute->id}}"><button type="button" class="btn btn-primary" title="Ver acuerdos"><i class="fas fa-external-link-alt"></i></button></a>
                                    <a href="/minutas/showPdf/{{$minute->id}}" target="_blank">
                                        <button type="button" class="btn btn-primary" title="Ver Minuta"><i class="fas fa-eye"></i></button>
                                    </a>
                                    @if($minute->file_id == null)
                                    <button  data-toggle="modal" data-target="#modalMinuteSignedFile" type="button" class="btn btn-primary"  title="Agregar Minuta firmada" onclick="openModalAddFile({{$minute->id}})"><i class="fas fa-upload"></i></button>
                                    @else
                                    <a href="/minutas/downloadMinuteSigned/{{$minute->file_id}}" target="_blank">
                                        <button type="button" class="btn btn-primary" title="Descargar Minuta firmada"><i class="fas fa-file"></i></button>
                                    </a>
                                    
                                    @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('admin/projects/createMinuta')
        @include('admin/projects/modalAgreements')
        @include('admin/projects/modalAddFileMinute')
</section>
@endsection