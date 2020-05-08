@extends('layouts.app')
@section('content')


@section('content')
<section class="section-projects-admin py-2 text-xs-center">
    <div class="fondo">
        @include('layouts.partials._navigationBar')

        <div class="container container-projects-admin">
            <div class="row table-responsive text-center projects-table">
                <h1 class="text-center" style="font-family: Arial; color:black">LISTA DE PROYECTOS</h1>
                @if( (Auth::user()->hasRole('Lider') && Auth::user()->hasRole('Ventas')) || Auth::user()->hasAnyRole(['Administrador','Ofertas','Ventas']))
                <div class="offset-md-8 col-md-4 text-right" style="margin-bottom: 10px">
                    <a data-toggle="modal" data-target="#createProject">
                        <button id="btnProject" type="button" class="btn btn-dark">
                            Crear nuevo proyecto &nbsp;&nbsp;<i class="fas fa-plus"></i>
                        </button>
                    </a>
                </div>
                @endif
                <table class="table text-center table-sm-responsive display nowrap" id="tableProjects">
                    <thead style="background-color: #252b37">
                        <tr class="color-th-admin">
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
                            <th class="not-sort"> Adicionales</th>
                            <th class="col-md-3 not-sort">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projects as $project)
                        <tr>
                            @if(Auth::user()->hasAnyRole(['Consulta']))
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
                                    <a href="{{url('/projects/offers/showPdf',$project->id)}}" target="_blank">
                                        <button type="button" class="btn btn-dark" title="Ver oferta"><i class="fas fa-eye"></i></button>
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if(!is_null($project->purchaseOrder))
                                    <a href="{{url('/projects/purchaseOrders/download',$project->id)}}">
                                        <button type="button" class="btn btn-primary" title="Descargar orden de compra"><i class="fas fa-download"></i></button>
                                    </a>
                                    <a href="{{url('/projects/purchaseOrders/showPdf',$project->id)}}" target="_blank">
                                        <button type="button" class="btn btn-dark" title="Ver orden de compra"><i class="fas fa-eye"></i></button>
                                    </a>
                                @endif
                            </td>
                            <td>
                                <a data-toggle="modal" data-target="#aditionalsDetails">
                                    <button type="button" class="btn btn-primary" title="Adicionales" onclick='inicializeAditionalsDetails({{$project}})'><i class="fas fa-file"></i></button>
                                </a>
                            </td>
                            <td>
                                @if( (Auth::user()->hasRole('Lider') && Auth::user()->hasRole('Ventas')) || Auth::user()->hasAnyRole(['Administrador','Ofertas','Ventas'])) <!-- Servicios -->
                                    <a data-toggle="modal" data-target="#editProject">
                                        <button type="button" class="btn btn-primary" title="Editar Proyecto" onclick='inicializeEditProject({{$project}})'><i class="fas fa-edit"></i></button>
                                    </a>
                                @endif
                                @if(!Auth::user()->hasAnyRole(['Ingenieria','Manufactura','Servicio','Almacen']))
                                    <a data-toggle="modal" data-target="#economicAdvanceProject">
                                        <button type="button" class="btn btn-dark" title="Editar avance economico" onclick='initilizeEconomicAdvance({{$project}})'><i class="fas fa-edit" style="color:#fff"></i><i class="fas fa-dollar-sign" style="color:#fff"></i></button>
                                    </a>
                                @endif
                                <a data-toggle="modal" data-target="#technicalAdvanceProject">
                                    <button type="button" class="btn btn-primary" title="Editar avance tecnico" onclick='initializeTechnicalAdvance({{$project}})'><i class="fas fa-edit" style="color:#fff"></i><i class="fas fa-wrench" style="color:#fff"></i></button>
                                </a>
                                <a href="{{url('minutas',$project)}}">
                                    <button type="button" class="btn btn-dark" title="Minutas"><i class="fas fa-file-alt"></i></button>
                                </a>
                                @if(Auth::user()->hasAnyRole(['Administrador','Manufactura','Servicio']))
                                    @if(Auth::user()->hasAnyRole(['Manufactura','Servicio']))
                                        @if(Auth::user()->hasRole('Manufactura') && $project->type->name=="SUMINISTRO")
                                            <a data-toggle="modal" data-target="#imagesProject" onclick='imagesProject( {{$project}})'>
                                                <button type="button" class="btn btn-primary" title="Agregar imagenes"><i class="fas fa-images"></i></button>
                                            </a>
                                        @endif
                                        @if(Auth::user()->hasRole('Servicio') && $project->type->name=="SERVICIO")
                                            <a data-toggle="modal" data-target="#imagesProject" onclick='imagesProject( {{$project}})'>
                                                <button type="button" class="btn btn-primary" title="Agregar imagenes"><i class="fas fa-images"></i></button>
                                            </a>
                                        @endif
                                    @else
                                        <a data-toggle="modal" data-target="#imagesProject" onclick='imagesProject( {{$project}})'>
                                            <button type="button" class="btn btn-primary" title="Agregar imagenes"><i class="fas fa-images"></i></button>
                                        </a>
                                    @endif
                                @endif
                            </td>
                            @else
                            <td colspan="11">
                                Sin registros por mostrar. No tiene el rol de consulta asignado.
                            </td>
                            @endif
                        </tr>
                        @empty
                        <p>No hay datos</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin/projects/modals/create')
    @if(!$projects->isEmpty())
        @include('admin/projects/modals/edit')
        @include('admin/projects/modals/economicAdvanceEdit')
        @include('admin/projects/modals/technicalAdvanceEdit')
        @include('admin/projects/modals/images')
        @include('admin/projects/modals/aditionalsDetails')
    @else
        @include('admin/projects/modals/create')
    @endif
</section>
@endsection