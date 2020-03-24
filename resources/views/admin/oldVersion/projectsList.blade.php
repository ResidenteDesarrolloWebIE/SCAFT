@extends('layouts.app')
@section('content')

@section('content')
<section class="section-projects-admin py-2 text-xs-center">
    @include('layouts.partials._navigationBar')
    <div class="container container-projects-admin">
        <div class="row table-responsive text-center projects-table">
            <h1 class="text-center">Lista de Proyectos</h1>
            <table class="table text-center table-sm-responsive" id="tableProjects">
                <thead style="background-color:gray">
                    <tr>
                        <th> Id</th>
                        <th> Folio</th>
                        <th> Nombre</th>
                        <th> Status</th>
                        <th>Nombre</th>
                        <th>Codigo</th>
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
                        @if(is_null($project->service))
                            <td>{{$project->product->user->name}}</td>
                            <td>{{$project->product->user->code}}</td>
                        @else
                        <td>{{$project->service->user->name}}</td>
                        <td>{{$project->service->user->code}}</td>
                        @endif

                        <td>
                            @if(!is_null($project->product_quotation_id))
                            Suministro
                            @elseif(!is_null($project->service_quotation_id))
                            Servicio
                            @else
                            No definido
                            @endif
                        </td>
                        <td>
                            <a data-toggle="modal" data-target="#loadImages" onclick='imagesProject( {{$project}})'>
                                <button type="button" class="btn btn-success" data-toggle="tooltip" title="Agregar imagenes" data-placement="bottom"><i class="fas fa-images"></i></button>
                            </a>
                            <a data-toggle="modal" data-target="#changeStatus" onclick='statusProject( {{$project}})'>
                                <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Cambiar status" data-placement="bottom">
                                    <i class="fas fa-exchange-alt"></i>
                                </button>
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
    @include('admin/modals/loadImages')
    @include('admin/modals/changeStatus')
    <div class="container container-projects-admin">
        @if(session('alert'))
        <div class="alert alert-success">
            {{session('alert')}}
        </div>
        @endif
        <a data-toggle="modal" data-target="#createQuoteProduct">
            <button id="btnSupply" type="button" class="btn btn-primary" data-toggle="tooltip" title="Crear nueva cotizacion Suministro" data-placement="bottom" onclick='createSupply(this.id);'>
                Suministro<i class="fas fa-exchange-alt"></i>
            </button>
        </a>
        <a data-toggle="modal" data-target="#createQuoteService">
            <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Crear nueva cotizacion Servicio" data-placement="bottom">
                Servicio<i class="fas fa-exchange-alt"></i>
            </button>
        </a>
        <a data-toggle="modal" data-target="#createContact">
            <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Crear nuevo contacto" data-placement="bottom">
                Contacto<i class="fas fa-exchange-alt"></i>
            </button>
        </a>
        <a data-toggle="modal" data-target="#createCustomer">
            <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Crear nuevo cliente" data-placement="bottom">
                Cliente<i class="fas fa-exchange-alt"></i>
            </button>
        </a>
    </div>
    @include('client/quotes/supplies/create')
    @include('client/quotes/services/create')
    @include('client/contacts/create')
    @include('client/customers/create')
</section>
@endsection