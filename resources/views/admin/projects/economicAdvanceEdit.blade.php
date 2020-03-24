<div class="modal fade" id="economicAdvanceProject">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <span type="hidden" name="_token" value="{{{ csrf_token() }}}" id="tokenLoadImages"> </span>
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">PROYECTO: </strong> <strong id='folio'></strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="text-right modal-header-info">
                <h4 class=""><strong>AVANCE ECONOMICO </strong></h4>
            </div>
            <div class="modal-body">
                {{Form::open(['method'=>'PUT','id'=>'formEconomicAdvance','enctype'=>'multipart/form-data', 'class'=>'row','onsubmit'=>'editEconomicAdvance(); return false;'])}}
                <input type="hidden" name="token" value="{{{ csrf_token() }}}" id="token" readonly="true" />
                <input type="hidden" name="economicAdvance" value="" id="idEconomicAdvance" readonly="true" />
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label for="advance"><strong style="color:red">*</strong><strong>Anticipo</strong></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="advance" id="idAdvance" value="" required>
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <label for="finalPayment"><strong style="color:red">*</strong><strong>Pago final del proyecto</strong></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="finalPayment" id="idFinalPayment" value="" required>
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label for="engineeringReleasePayment"><strong style="color:red">*</strong><strong>Pago por liberacion de ingenieria</strong></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="engineeringReleasePayment" id="idEngineeringReleasePayment" value="" required>
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <label for="total"><strong style="color:red">*</strong><strong>Total de proyecto</strong></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="total" id="idTotal" value="" required>
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