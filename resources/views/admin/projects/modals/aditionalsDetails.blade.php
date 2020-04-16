<div class="modal fade" id="aditionalsDetails">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">PROYECTO: </strong> <strong id='idFolioAditionalsDetailsProject'></strong></h4>
                <button type="button" class="" data-dismiss="modal">&times;</button>
            </div>
            <div class="text-right modal-header-info">
                <h4 class=""><strong>Adicionales </strong></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr >
                                    <th style="color:black">#</th>
                                    <th style="color:black">Nota</th>
                                    <th style="color:black">Total</th>
                                    <th style="color:black">Oferta</th>
                                    <th style="color:black">Orden de compra</th>
                                </tr>
                            </thead>
                            <tbody id="bodyAditionalsDetails">
<!--                                 @if(!$project->aditionals_details->isEmpty())
                                    @foreach($project->aditionals_details as $aditional_detail)
                                    <tr>
                                        <td>{{$aditional_detail->id}}</td>
                                        <td>{{$aditional_detail->note}}</td>
                                        <td>{{$aditional_detail->total_amount}}</td>
                                        <td>
                                            <a href="/exportMinute/{{$aditional_detail->id}}">
                                                <button type="button" class="btn btn-dark" title="Descargar"><i class="fas fa-download"></i></button>
                                            </a>
                                            <a href="/minutas/showPdf/{{$aditional_detail->id}}" target="_blank">
                                                <button type="button" class="btn btn-dark" title="Ver acuerdos"><i class="fas fa-eye"></i></button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/exportMinute/{{$aditional_detail->id}}">
                                                <button type="button" class="btn btn-dark" title="Descargar"><i class="fas fa-download"></i></button>
                                            </a>
                                             <a href="/minutas/showPdf/{{$aditional_detail->id}}" target="_blank">
                                                <button type="button" class="btn btn-dark" title="Ver acuerdos"><i class="fas fa-eye"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="5">
                                        No hay adicionales para este proyecto
                                    </td>
                                </tr>
                                @endif -->
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