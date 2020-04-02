@extends('layouts.app')
@section('content')

@section('content')
<section class="section-projects-admin py-2 text-xs-center">
    @include('layouts.partials._navigationBar')
    <div class="container container-projects-admin">
        <div class="row table-responsive text-center projects-table">
            <h1 class="text-center">Lista de acuerdos</h1>
            <div class="offset-md-8 col-md-4 text-right">
            <a href="/minutas/{{$minuta->project_id}}"><button id="btnProject" type="button" class="btn btn-info" onclick="">
                    Ver minutas  <i class="fas fa-undo"></i>
                </button></a>
            </div>
            <br>
            <table class="table table-sm-responsive" id="tableAgreements">
                <thead class="table-success">
                    <tr style="text-align:center">
                        <th>N°</th>
                        <th>Acuerdo</th>
                        <th>Responsable</th>
                        <th>Estatus</th>
                        <th style="width:100px">Fecha inicio</th>
                        <th style="width:100px">Fecha final</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($minuta->agreements as $agreement)
                    <tr>
                        <td>{{$loop->iteration }}</td>
                        <td>{{$agreement->agreement}}</td>
                        <td>{{$agreement->responsable}}</td>
                        <td>{{$agreement->status}}</td>
                        <td>{{$agreement->start_date}}</td>
                        <td>{{$agreement->end_date}}</td>
                        <td>
                        <button  data-toggle="modal" data-target="#modalEditAgreement" type="button" class="btn btn-info"  title="Editar Acuerdo" onclick="openModalEditAgreement({{$agreement}})"><i class="fas fa-edit"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin/projects/modalEditAgreement')
</section>
@endsection