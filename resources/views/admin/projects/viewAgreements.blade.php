@extends('layouts.app')
@section('content')

@section('content')
<section class="section-projects-admin py-2 text-xs-center">
    <div class="fondo">
    @include('layouts.partials._navigationBar')
    <div class="container container-projects-admin">
        <div class="row table-responsive text-center projects-table">
            <h1 class="text-center" style="font-family: Arial; color:black">LISTA DE ACUERDOS</h1>
            <div class="offset-md-8 col-md-4 text-right">
                @if($minuta->file_id ==null)
                <button type="button" class="btn btn-dark" onclick="openModalAddAgreement({{$minuta}})">
                    Agrega Acuerdos <i class="fas fa-plus"></i>
                </button>
                @endif
                <a href="/minutas/{{$minuta->project_id}}"><button id="btnProject" type="button" class="btn btn-dark" onclick="">
                    Ver minutas  <i class="fas fa-undo"></i>
                </button></a>
            </div>
            <br>
            <table class="table table-sm-responsive" id="tableAgreements">
                <thead class="table-success" style="background-color: #252b37">
                    <tr style="text-align:center" class="color-th-admin">
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
                    <tr style="text-align:center">
                        <td>{{$loop->iteration }}</td>
                        <td>{{$agreement->agreement}}</td>
                        <td>{{$agreement->responsable}}</td>
                        <td>{{$agreement->status}}</td>
                        <td>{{$agreement->start_date}}</td>
                        <td>{{$agreement->end_date}}</td>
                        <td>
                        <button  data-toggle="modal" data-target="#modalEditAgreement" type="button" class="btn btn-primary"  title="Editar Acuerdo" onclick="openModalEditAgreement({{$agreement}})"><i class="fas fa-edit"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin/projects/modalEditAgreement')
    @include('admin/projects/modalAddAgreement')
</section>
@endsection