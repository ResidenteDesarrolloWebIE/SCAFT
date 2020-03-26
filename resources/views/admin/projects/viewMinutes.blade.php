@extends('layouts.app')
@section('content')

@section('content')
<section class="section-projects-admin py-2 text-xs-center">
    @include('layouts.partials._navigationBar')
    <div class="container container-projects-admin">
        <div class="row table-responsive text-center projects-table">
            <h1 class="text-center">Lista de Minutas</h1>
            <div class="offset-md-8 col-md-4 text-right">
                <a data-toggle="modal" data-target="#internalMinutaProject">
                    <button id="btnProject" type="button" class="btn btn-success">
                       Agregar Minuta <i class="fas fa-plus"></i>
                    </button>
                </a>
            </div>
            <br>
            <table class="table text-center table-sm-responsive" id="tableProjects">
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
                         
                            <a data-toggle="modal" data-target="#internalMinutaProject">
                                <button type="button" class="btn btn-info"  title="Minutas Interna" ><i class="fas fa-file-alt"></i></button>
                            </a>
                            <a data-toggle="modal" data-target="#externalMinutaProject">
                                <button type="button" class="btn btn-info"  title="Minutas Externas" ><i class="fas fa-file-alt"></i><i class="fas fa-external-link-square-alt"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin/projects/internalMinuta')
    @include('admin/projects/externalMinuta')
</section>
@endsection