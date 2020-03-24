<div class="modal fade" id="technicalAdvanceProject">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">PROYECTO: </strong> <strong id='folio'></strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="text-right modal-header-info">
                <h4 class=""><strong>AVANCE TECNICO </strong></h4>
            </div>
            <div class="modal-body">
                {{Form::open(['method'=>'PUT','id'=>'formTecnicalAdvance','enctype'=>'multipart/form-data', 'class'=>'row','onsubmit'=>'editTechnicalEconomic(); return false;'])}}
                <input type="hidden" name="token" value="{{{ csrf_token() }}}" id="token" readonly="true" />
                <input type="hidden" name="technicalAdvance" value="" id="idTechnicalAdvance" readonly="true" />
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label for="receiveOrder"><strong style="color:red">*</strong><strong>Recepcion de orden de compra</strong></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="receiveOrder" id="idReceiveOrder" value="" required>
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <label for="workProgress"><strong style="color:red">*</strong><strong>Avances de trabajo</strong></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="workProgress" id="idWorkProgress" value="" required>
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label for="engineeringRelease"><strong style="color:red">*</strong><strong>Liberacion de ingenieria</strong></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="engineeringRelease" id="idEngineeringRelease" value="" required>
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <label for="deliveryCustomer"><strong style="color:red">*</strong><strong>Entrega a clientes</strong></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="deliveryCustomer" id="idDeliveryCustomer" value="" required>
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer " style="justify-content: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button><!-- type="button" onclick="save()" -->
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>