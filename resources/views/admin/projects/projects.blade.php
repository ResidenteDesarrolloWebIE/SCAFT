@extends('layouts.app')
@section('content')

@section('content')
<section class="section-projects-admin py-2 text-xs-center">
    @include('layouts.partials._navigationBar')
    <div class="container container-projects-admin">
        <div class="row table-responsive text-center projects-table">
            <h1 class="text-center">Lista de Proyectos</h1>
            <div class="offset-md-8 col-md-4 text-right" style="margin-bottom: 10px">
                <a data-toggle="modal" data-target="#createProject">
                    <button id="btnProject" type="button" class="btn btn-success">
                        Crear nuevo proyecto &nbsp;&nbsp;<i class="fas fa-plus"></i>
                    </button>
                </a>
            </div>
            <table class="table text-center table-sm-responsive display nowrap" id="tableProjects">
                <thead style="background-color:gray">
                    <tr>
                        <th> Id</th>
                        <th> Folio</th>
                        <th> Status</th>
                        <th class="not-sort"> Tipo</th>
                        <th> Nombre</th>
                        <th class="not-sort"> Descripcion</th>
                        <th> Cliente</th>
                        <th> Codigo</th>
                        <th class="not-sort"> Oferta</th>
                        <th class="not-sort"> Orden de compra</th>
                        <th class="col-md-3 not-sort">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td>{{$project->id}}</td>
                        <td>{{$project->folio}}</td>
                        <td>{{$project->status}}</td>
                        <td>{{$project->type->name}}</td>
                        <td>{{$project->name}}</td>
                        <td>{{$project->description}}</td>
                        <td>{{$project->customer->name}}</td>
                        <td>{{$project->customer->code}}</td>
                        <td>
                            @if(!is_null($project->offer))
                            <a href="{{url('/projects/offers/download',$project->id)}}">
                                <button type="button" class="btn btn-primary" title="Descargar oferta"><i class="fas fa-download"></i></button>
                            </a>
                            @endif
                        </td>
                        <td>
                            @if(!is_null($project->purchaseOrder))
                            <a href="{{url('/projects/purchaseOrders/download',$project->id)}}">
                                <button type="button" class="btn btn-primary" title="Descargar orden de compra"><i class="fas fa-download"></i></button>
                            </a>
                            @endif
                        </td>
                        <td>
                            <a data-toggle="modal" data-target="#editProject">
                                <button type="button" class="btn btn-primary" title="Editar Proyecto" onclick='inicializeEditProject({{$project}})'><i class="fas fa-edit"></i></button>
                            </a>
                            <a data-toggle="modal" data-target="#economicAdvanceProject">
                                <button type="button" class="btn btn-warning" title="Editar avance economico" onclick='initilizeEconomicAdvance({{$project}})'><i class="fas fa-edit"></i><i class="fas fa-dollar-sign"></i></button>
                            </a>
                            <a data-toggle="modal" data-target="#technicalAdvanceProject">
                                <button type="button" class="btn btn-warning" title="Editar avance tecnico" onclick='initializeTechnicalAdvance({{$project}})'><i class="fas fa-edit"></i><i class="fas fa-wrench"></i></button>
                            </a>
                            <a href="{{url('internalMinute',$project)}}">
                                <button type="button" class="btn btn-info" title="Minutas"><i class="fas fa-file-alt"></i></button>
                            </a>
                            <a data-toggle="modal" data-target="#imagesProject" onclick='imagesProject( {{$project}})'>
                                <button type="button" class="btn btn-success" title="Agregar imagenes"><i class="fas fa-images"></i></button>
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
    @include('admin/projects/economicAdvanceEdit')
    @include('admin/projects/technicalAdvanceEdit')
    @include('admin/projects/images')
</section>
@endsection