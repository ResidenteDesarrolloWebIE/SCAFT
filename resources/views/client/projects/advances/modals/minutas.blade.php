<div class="modal fade" id="idModalMinutas">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">PROYECTO: </strong> <strong id='idFolioProjectMinuta'></strong></h4>
                <button type="button" class="" data-dismiss="modal">&times;</button>
            </div>
            <div class="text-right modal-header-info">
                <h4 class=""><strong>MINUTAS</strong></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Folio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!$project->minutes->isEmpty())
                                    @foreach($project->minutes as $minuta)
                                        <tr>
                                            <td>{{$minuta->folio}}</td>
                                            <td>
                                                <a href="/exportMinute/{{$minuta->id}}">
                                                    <button type="button" class="btn btn-dark" title="Descargar"><i class="fas fa-download"></i></button>
                                                </a>
                                                <a href="/minutas/showPdf/{{$minuta->id}}" target="_blank">
                                                    <button type="button" class="btn btn-dark" title="Ver acuerdos"><i class="fas fa-eye"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="3">
                                        No hay minutas para este proyecto
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer " style="justify-content: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>