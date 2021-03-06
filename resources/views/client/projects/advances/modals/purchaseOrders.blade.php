<div class="modal fade" id="idModalPurchaseOrder">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">PROYECTO: </strong> <strong id='idFolioProjectPurchaseOrder'></strong></h4>
                <button type="button" class="" data-dismiss="modal">&times;</button>
            </div>
            <div class="text-right modal-header-info">
                <h4 class=""><strong>ORDENES DE COMPRA</strong></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row text-center">
                        <h5 class="text-center"><strong>Orden de compra inicial</strong></h5>
                        <table class="table table-bordered text-center" style="margin-bottom: 50px">
                            <thead>
                                <tr>
                                    <th>Folio</th>
                                    <th>Proyecto</th>
                                    <th>Total </th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!is_null($project->purchaseOrder))
                                <tr>
                                    <td>{{$project->folio}}</td>
                                    <td>{{$project->name}}</td>
                                    <td>$ {{$project->total_amount}} {{$project->coin->code}}</td>
                                    <td>
                                        <a href="{{url('/projects/purchaseOrders/download',$project->id)}}">
                                            <button type="button" class="btn btn-primary" title="Descargar"><i class="fas fa-download"></i></button>
                                        </a>
                                        <a href="{{url('/projects/purchaseOrders/showPdf',$project->id)}}" target="_blank">
                                            <button type="button" class="btn btn-dark" title="Ver"><i class="fas fa-eye"></i></button>
                                        </a>
                                    </td>
                                </tr>
                                @else
                                    <tr>
                                        <td colspan="4">
                                            No hay orden de compra para este proyecto
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        
                        <h5 class="text-center"><strong>Ordenes de compra adicionales</strong></h5>
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Folio</th>
                                    <th>Proyecto</th>
                                    <th>Notas</th>
                                    <th>Total </th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!$project->aditionals_details->isEmpty())
                                    @foreach($project->aditionals_details as $aditional_detail)
                                    <tr>
                                        <td>{{$project->folio}}</td>
                                        <td>{{$project->name}}</td>
                                        <td>{{$aditional_detail->note}}</td>
                                        <td>$ {{$aditional_detail->total_amount}}  {{$project->coin->code}}</td>
                                        <td>
                                            <a href="{{url('/projects/aditionalsDetails/download',$aditional_detail->purchase_order)}}">
                                                <button type="button" class="btn btn-primary" title="Descargar"><i class="fas fa-download"></i></button>
                                            </a>
                                            <a href="{{url('/projects/aditionalsDetails/showPdf',$aditional_detail->purchase_order)}}" target="_blank">
                                                <button type="button" class="btn btn-dark" title="Ver"><i class="fas fa-eye"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">
                                            No hay ordenes adicionales para este proyecto
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