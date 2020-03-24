<div class="modal fade bd-example-modal-lg" id="financialAdvance">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" >
                <h4 class="modal-title" id="idModalTitle"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">Folio: </strong> <strong  id='idFolioEconomic'></strong></h4>
                <button type="button" class="" data-dismiss="modal">&times;</button>
            </div>
            <div class="text-right modal-header-info">
                <h4 class=""><strong>DETALLE ECONOMICO</strong></h4>
            </div>
            <div class="modal-body container">
                    <div class="row text-center">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" id="idTokenEconomic"/>
                            <input type="hidden" name="idEconomic" id="idEconomic" value="" readonly="true">
                        </div> 
                        <div class="col-md-6">       
                            <div class="form-group text-center">
                                <label><strong>Tipo de cotización:</strong></label>
                                <br>
                                <span class="" id='idTypeEconomic'>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label><strong>Monto cotizado:</strong></label>
                                <br>
                                <span class="" id='idTotalEconomic'>
                                </span>
                            </div>                                    
                        </div>
                        <div class=col-md-12>
                            <div class="form-group text-center">
                                <label><strong>Descripción</strong></label><br>
                                <span class=""  id='idDescriptionEconomic'>
                                </span>
                            </div>
                        </div>
                    </div> 
                </div>   
                <div class="row center">     
                    <div class="col-md-11 ">
                        <hr class="modal-separator">  
                    </div> 
                </div>
                <div class="row center">                                                   
                    <div class="col-md-11 ">
                        <table class="table table-condensed small">
                            <thead class="modal-table-thead">
                                <tr>
                                    <th>No.</th>
                                    <th>Monto</th>
                                    <th>Tipo de cambio</th>
                                    <th>Fecha de pago</th>
                                    <!-- <th>Descargar</th> -->
                                </tr>
                            </thead>
                            <tbody id='idPayments'>
                            </tbody>
                        </table>
                        <div class="form-group list-payments">
                            <div class="text-center">
                                <label ><strong>Porcentaje de liquidación:</strong></label>
                                <!-- <span class="text-extra-light-cont" name='idFinalDateEconomic' id='idFinalDateEconomic'></span> -->
                            </div>
                        </div>
                        <div class="progress hola" style="background: #708090;">
                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" id="idAdvanceEconomic">
                                <span id="idPercentageEconomic">0.00 %</span>
                            </div>
                        </div>                                               
                    </div>
                </div><br>
                <div class="modal-footer " style="justify-content: center;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> 
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>