@extends('layouts.app')
@section('content')

@section('content')
<section class="section-projects-admin py-2 text-xs-center">
    @include('layouts.partials._navigationBar')
    <div class="container container-projects-admin">
        <div class="row table-responsive text-center projects-table">
            <h1 class="text-center">Lista de Minutas</h1>
            <div class="offset-md-8 col-md-4 text-right">
                <button id="btnProject" type="button" class="btn btn-success" onclick="openModalAddMinute({{$project}})">
                    Agregar Minuta <i class="fas fa-plus"></i>
                </button>
            </div>
            <br>
            <table class="table text-center table-sm-responsive" id="tableMinutes">
                <thead class="table-success">
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
                        <button  data-toggle="modal" data-target="#modalAgreements" type="button" class="btn btn-info"  title="Ver Acuerdos" onclick="getAgreements({{$minute->id}})"><i class="fas fa-eye"></i></button>
                        <a href="/exportMinute/{{$minute->id}}"><button type="button" class="btn btn-success" title="Descargar PDF" ><i class="fas fa-file-alt"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin/projects/internalMinuta')
    @include('admin/projects/modalAgreements')
</section>
@endsection