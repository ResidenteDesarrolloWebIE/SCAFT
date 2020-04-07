<div class="modal fade" id="economicAdvanceProject">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">PROYECTO: </strong> <strong id='idFolioProjectEconomicAdvance'></strong></h4>
                <button type="button" class="" data-dismiss="modal">&times;</button>
            </div>
            <div class="text-right modal-header-info">
                <h4 class=""><strong>AVANCE ECONOMICO </strong></h4>
            </div>
            <div class="modal-body">
                {{Form::open(['method'=>'PUT','id'=>'formEconomicAdvance','enctype'=>'multipart/form-data', 'class'=>'row','onsubmit'=>'editEconomicAdvance(); return false;'])}}
                <input type="hidden" name="token" value="{{{ csrf_token() }}}" id="tokenEconomicAdvance" readonly="true" />
                <input type="hidden" name="economicAdvance" value="" id="idEconomicAdvance" readonly="true" />
                <input type="hidden" name="totalAmount" id="idTotalAmount" value="" readonly="true" />
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label for="advance"><strong style="color:red">*</strong><strong>Anticipo</strong></label>
                        <div class="input-group" style="margin-bottom: 4px">
                            <div class="input-group-append">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" class="form-control" name="initialAdvanceMount" id="idInitialAdvanceMount" value="" required placeholder="Monto pagado" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                        <div class="input-group" style="margin-bottom: 4px">
                            <input type="number" class="form-control" name="initialAdvancePercentage" id="idInitialAdvancePercentage" onKeyUp="calculateAmount(event,1)" value="" placeholder="Porcentaje" required {{$inputStatus}}>
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                        <div class="input-group">
                            <select class="custom-select" name="initialAdvanceCompleted" id="idInitialAdvanceCompleted" required {{$selectStatus}}>
                                <option value=0 selected> No completado</option>
                                <option id="optionCienPorciento" value=1>Completado</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <label for="finalPayment"><strong style="color:red">*</strong><strong>Pago final del proyecto</strong></label>
                        <div class="input-group" style="margin-bottom: 4px">
                            <div class="input-group-append">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" class="form-control" name="finalPaymentMount" id="idFinalPaymentMount" value="" required placeholder="Monto pagado" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                        <div class="input-group" style="margin-bottom: 4px">
                            <input type="number" class="form-control" name="finalPaymentPercentage" id="idFinalPaymentPercentage" onKeyUp="calculateAmount(event,3)" value="" placeholder="Porcentaje" required {{$inputStatus}}>
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                        <div class="input-group">
                            <select class="custom-select" name="finalPaymentCompleted" id="idFinalPaymentCompleted" required {{$selectStatus}}>
                                <option value=0 selected> No completado</option>
                                <option id="optionCienPorciento" value=1>Completado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label for="engineeringReleasePayment"><strong style="color:red">*</strong><strong>Pago por liberacion de ingenieria</strong></label>
                        <div class="input-group" style="margin-bottom: 4px">
                            <div class="input-group-append">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" class="form-control" name="engineeringReleasePaymentMount" id="idEngineeringReleasePaymentMount" value="" required placeholder="Monto pagado" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                        <div class="input-group" style="margin-bottom: 4px">
                            <input type="number" class="form-control" name="engineeringReleasePaymentPercentage" id="idEngineeringReleasePaymentPercentage" onKeyUp="calculateAmount(event,2)" value="" placeholder="Porcentaje" required {{$inputStatus}}>
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                        <div class="input-group">
                            <select class="custom-select" name="engineeringReleasePaymentCompleted" id="idEngineeringReleasePaymentCompleted" required {{$selectStatus}}>
                                <option value=0 selected> No completado</option>
                                <option id="optionCienPorciento" value=1>Completado</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group text-center">
                        <label for="total"><strong style="color:red">*</strong><strong>Total</strong></label>
                        <div class="input-group" style="margin-bottom: 4px">
                            <div class="input-group-append">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" class="form-control" name="paymentTotalMount" id="idPaymentTotalMount" value="" required placeholder="Monto pagado" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                        <div class="input-group" style="margin-bottom: 4px">
                            <input type="number" class="form-control" name="paymentTotalPercentage" id="idPaymentTotalPercentage" value="0.000" required placeholder="Porcentaje Total" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                        <!-- <span class="text-center" style="color:reed" id="idErrorPercentage"> Las tres estapas debe sumar 100%</span> -->
                    </div>
                </div>
            </div>
            <div class="modal-footer " style="justify-content: center;">
                @if(Auth::user()->hasAnyRole(['Administrador','Finanzas']))
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                @else
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                @endif
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>