<div class="modal fade" id="technicalAdvanceProject">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">PROYECTO: </strong> <strong id='idFolioProjectTechnicalAdvance'> </strong></h4>
                <button type="button" class="" data-dismiss="modal">&times;</button>
            </div>
            <div class="text-right modal-header-info">
                <h4 class=""><strong>AVANCE TECNICO </strong></h4>
            </div>
            <div class="modal-body">
                {{Form::open(['method'=>'POST','id'=>'formTecnicalAdvance','enctype'=>'multipart/form-data', 'class'=>'row','onsubmit'=>'editTechnicalAdvance(this); return false;'])}}
                <input type="hidden" name="technicalAdvance" id="idTechnicalAdvance" value="" readonly="true" />
                <input type="hidden" name="token" value="{{{ csrf_token() }}}" id="token" readonly="true" />
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label for="receiveOrder"><strong style="color:red">*</strong><strong>Recepcion de orden de compra</strong></label>
                        <div class="form-group text-center ">
                            <!-- custom-control custom-switch -->
                            <select class="custom-select" name="receiveOrder" id="idReceiveOrder" required>
                                <option value=0 selected> 0 %</option>
                                <option id="optionCienPorciento" value=100>100 %</option>
                            </select>

                            <!-- <input type="checkbox" class="custom-control-input" id="idReceiveOrder" value=100 name="receiveOrder"> -->
                            <!-- <label class="custom-control-label" for="idReceiveOrder">100 %</label> -->
                            <!-- <span style="color: green"> Verificar el archivo en la lista del proyecto</span> -->
                        </div>
                        <div class="form-group text-center" id="divFilePurchaseOrder">
                            <input type="file" name="purchaseOrder" id="idPurchaseOrder" accept="document/*">
                            <div id="purchaseOrderError" style="color:red"></div>
                        </div>
                        <div class="form-group text-center" id="divDowloadPurchaOrder">
                            <a href="{{url('/projects/purchaseOrders/download',$project->id)}}">
                                <button type="button" class="btn btn-light text-primary"><i class="fas fa-download"></i>Descargar archivo</button>
                            </a>
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