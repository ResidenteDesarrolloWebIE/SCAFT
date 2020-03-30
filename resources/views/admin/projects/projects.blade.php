@extends('layouts.app')
@section('content')

@section('content')
<section class="section-projects-admin py-2 text-xs-center">
    @include('layouts.partials._navigationBar')
    <div class="container container-projects-admin">
        <div class="row table-responsive text-center projects-table">
            <h1 class="text-center">Lista de Proyectos</h1>
            <div class="offset-md-8 col-md-4 text-right">
                <a data-toggle="modal" data-target="#createProject">
                    <button id="btnProject" type="button" class="btn btn-success">
                        Crear nuevo proyecto<i class="fas fa-exchange-alt"></i>
                    </button>
                </a>
            </div>
            <table class="table text-center table-sm-responsive" id="tableProjects">
                <thead style="background-color:gray">
                    <tr>
                        <th> Id</th>
                        <th> Folio</th>
                        <th> Nombre</th>
                        <th> Status</th>
                        <th> Descripcion</th>
                        <th>
                            Tipo
                        </th>
                        <th class="col-md-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td>{{$project->id}}</td>
                        <td>{{$project->folio}}</td>
                        <td>{{$project->name}}</td>
                        <td>{{$project->status}}</td>
                        <td>{{$project->description}}</td>
                        <td>{{$project->type}}</td>
                        <td>
                            <a data-toggle="modal" data-target="#editProject" >
                                <button type="button" class="btn btn-primary"  title="Editar Proyecto" onclick='inicializeEditProject({{$project}})' ><i class="fas fa-edit"></i></button>
                            </a>
                            <a data-toggle="modal" data-target="#changeStatusProject" onclick='statusProject({{$project}})'>
                                <button type="button" class="btn btn-warning"  title="Cambiar status"><i class="fas fa-exchange-alt"></i></button>
                            </a>
                            <a data-toggle="modal" data-target="#economicAdvanceProject">
                                <button type="button" class="btn btn-primary"  title="Editar avance economico" onclick='economicAdvance({{$project}})'><i class="fas fa-edit"></i><i class="fas fa-dollar-sign"></i></button>
                            </a>
                            <a data-toggle="modal" data-target="#technicalAdvanceProject">
                                <button type="button" class="btn btn-primary"  title="Editar avance tecnico" ><i class="fas fa-edit"></i><i class="fas fa-wrench"></i></button>
                            </a>
                            <a href="{{url('internalMinute',$project)}}">
                                <button type="button" class="btn btn-info"  title="Minutas Interna" ><i class="fas fa-file-alt"></i></button>
                            </a>
                            <a data-toggle="modal" data-target="#externalMinutaProject" onclick='imagesProject( {{$project}})'>
                                <button type="button" class="btn btn-info"  title="Minutas Externas" ><i class="fas fa-file-alt"></i><i class="fas fa-external-link-square-alt"></i></button>
                            </a>
                            <a data-toggle="modal" data-target="#imagesProject" onclick='imagesProject( {{$project}})'>
                                <button type="button" class="btn btn-success"  title="Agregar imagenes" ><i class="fas fa-images"></i></button>
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
    @include('admin/projects/create')
    @include('admin/projects/edit')
    @include('admin/projects/changeStatus')
    @include('admin/projects/economicAdvanceEdit')
    @include('admin/projects/technicalAdvanceEdit')
    @include('admin/projects/internalMinuta')
    @include('admin/projects/externalMinuta')
    @include('admin/projects/images')
</section>
@endsection