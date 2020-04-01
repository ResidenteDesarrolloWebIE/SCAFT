@extends('layouts.app')
@section('content')

@section('content')
<section class="section-projects-admin py-2 text-xs-center">
    @include('layouts.partials._navigationBar')
    <div class="container container-projects-admin">
        <div class="row table-responsive text-center projects-table">
            <h1 class="text-center">Lista de acuerdos</h1>
            
            <br>
            <table class="table text-center table-sm-responsive" id="tableMinutes">
                <thead class="table-success">
                    <tr>
                        <th>N°</th>
                        <th>Acuerdo</th>
                        <th>Responsable</th>
                        <th>Estatus</th>
                        <th>Fecha inicio</th>
                        <th>Fecha final</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($minuta->agreements as $agreement)
                    <tr>
                        <td>1</td>
                        <td>Mi acuerdo</td>
                        <td>Jesus Israel</td>
                        <td>Realizado</td>
                        <td>03/10/20</td>
                        <td>04/10/20</td>
                        <td>
                        <button  data-toggle="modal" data-target="#modalAgreements" type="button" class="btn btn-info"  title="Editar Acuerdo" onclick=""><i class="fas fa-edit"></i></button>
                        <a href="#"><button type="button" class="btn btn-danger" title="Eliminar acuerdo" ><i class="fas fa-trash"></i></button></a>
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