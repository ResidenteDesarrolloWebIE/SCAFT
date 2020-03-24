<!-- Modal -->
<div class="modal fade" id="moreInformation" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content text-center">
            <div class="modal-header" >
                <h4 class="modal-title" id="modalTitle"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">Folio: </strong> <strong  id='idFolio'></strong></h4>
                <button type="button" class="" data-dismiss="modal">&times;</button>
            </div>
            <div class="text-right modal-header-info">
                <h4 class=""><strong>MAS INFORMACIÓN</strong></h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" id="tokenMoreInformation"/>
                    <div class="col-md-6">
                        <div class="">
                            <span><strong id="idLabelFolio">   </strong></span>
                            <span id="idFolioAux"></span>
                        </div>
                        <div class="">
                            <span><strong> Folio del proyecto:  </strong></span>
                            <span id="idFolioProject"></span>
                        </div>
                        <div class="">
                            <span><strong> Notas  :  </strong></span>
                            <span id="idNotes"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <span><strong> Total:  </strong></span>
                            <span id="idTotal"></span>
                        </div>
                        <div class="">
                            <span><strong> Fecha de creacion  :  </strong></span>
                            <span id="idDate"></span>
                        </div>
                        <div class="">
                            <span><strong> Descripcion  :  </strong></span>
                            <span id="idDescription"></span>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer " style="justify-content: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> 
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>