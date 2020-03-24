
<div class="modal fade" id="technicalAdvanceSupply">
    <div class="modal-dialog modal-lg">
        <div class="modal-content class-scroll">
            <div class="modal-header modal-header-info" >
                <h4 class="modal-title" id="idTitleModalService"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">Folio: </strong> <strong  id='idFolioTechnical'></strong></h4>
                <button type="button" class="" data-dismiss="modal">&times;</button>
            </div>
            <div class="text-right modal-header-info">
                <h4 class=""><strong>DETALLE TÉCNICO</strong></h4>
            </div>
            <div class="modal-body container">
                    <div class="row text-center" id="idFormulario">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" id="idTokenTechnical"/>
                                <input type="hidden" name="idTechnical" id="idTechnical" value="" readonly="true">
                            </div> 
                            <div class="col-md-6">          
                                <div class="form-group">
                                    <label><strong>Tipo de cotización:</strong></label><br>
                                    <span class="text-extra-light-cont" id='idTypeTechnical'>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><strong>Monto cotizado:</strong></label>
                                    <br>
                                    <span class="text-extra-light-cont" id='idTotalTechnical'>
                                    </span>
                                </div>                                    
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><strong>Descripción:</strong></label><br>
                                    <span class="text-extra-light-cont" id='idDescriptionTechnical'></span>
                                </div>
                            </div>
                    </div>  
                    <div class="row center"> 
                        <div class="">    
                            <div class="col-md-9">
                                <hr class="modal-separator">  
                            </div> 
                        </div> 
                    </div>                  
                    <div class="row">    
                        <div class="col-md-12">
                            <div class="progress-content text-center" id="idStageTechnical">
                                <label><strong>Etapas de tu Órden</strong></label><br><br><br>
                                <center>
                                    <div class="circle" name='cotizacion_fin' id='cotizacion_fin'>
                                        <span class="label-icon">
                                            <i class="fas fa-dollar-sign fa-2x icon"></i>
                                            <p class="tooltip-stage-bottom"><br><strong id="idStage0TechnicalSupply"></strong></p>
                                        </span>
                                    </div>

                                    <span class="bar" name='aprobacion-bar' id='aprobacion-bar_fin'></span>
                                    <div class="circle" name='aprobacion' id='aprobacion_fin'>
                                        <span class="label-icon">
                                            <i class="fas fa-check-square fa-2x icon"></i>
                                            <p class="tooltip-stage-bottom">Aprobación del Cliente<br><strong id="idStage1TechnicalSupply"></strong></p>
                                        </span>
                                    </div>

                                    <span class="bar" name='pago-bar' id='pago-bar_fin'></span>
                                    <div class="circle" name='pago' id='pago_fin'>
                                        <span class="label-icon ">
                                            <i class="fa fa-star fa-2x icon"></i>
                                            <p class="tooltip-date-top"><strong id="idDateStage2TechnicalSupply"></strong></p>
                                            <p class="tooltip-stage-bottom">Aprobación de Ingeniería<br><strong id="idStage2TechnicalSupply"></strong></p>
                                        </span>
                                    </div>
                                    <span class="bar" name='compra-bar' id='compra-bar_fin'></span>
                                    <div class="circle" name='compra' id='compra_fin'>
                                        <span class="label-icon">
                                            <i class="fa fa-shopping-cart fa-2x icon"></i>
                                            <p class="tooltip-date-top"><strong id="idDateStage3TechnicalSupply"></strong></p>
                                            <p class="tooltip-stage-bottom">Compra de Material<br><strong id="idStage3TechnicalSupply"></strong></p></span>
                                    </div>
                                    <span class="bar" name='fabricacion-bar' id='fabricacion-bar_fin'></span>
                                    <div class="circle" name='fabricacion' id='fabricacion_fin'>
                                        <span class="label-icon">
                                            <i class="fa fa-wrench fa-2x icon"></i>
                                            <p class="tooltip-date-top"><strong id="idDateStage4TechnicalSupply"></strong></p>
                                            <p class="tooltip-stage-bottom">Fabricación<br><strong id="idStage4TechnicalSupply"></strong></p></span>
                                    </div>
                                    <span class="bar" name='entrega-bar' id='entrega-bar_fin'></span>
                                    <div class="circle" name='entrega' id='entrega_fin'>
                                        <span class="label-icon ">
                                            <i class="fa fa-truck fa-2x icon"></i>
                                        <p class="tooltip-date-top"><strong id="idDateStage5TechnicalSupply"></strong></p>
                                        <p class="tooltip-stage-bottom">Entrega al Cliente<br><strong id="idStage5TechnicalSupply"></strong></p></span>
                                    </div>
                                    <br><br><br><br>                                                   
                                </center>
                            </div>
                        </div>
                    </div><br>
                    <div class="row center"> 
                        <div class="col-md-11 text-center">
                            <label><strong>Avance general</strong></label>
                            <div class="progress" style="background: #708090;">
                                <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" id="idProgressTechnical">
                                    <span id="idAdvanceTechnical">0.00 % </span>
                                </div>
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