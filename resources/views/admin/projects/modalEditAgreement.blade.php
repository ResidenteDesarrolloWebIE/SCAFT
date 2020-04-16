<div class="modal fade" id="modalEditAgreement" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><strong class="modal-folio"></strong> <strong id='folioText'>Editar acuerdo</strong></h4>
                <button type="button" class="" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                {{Form::open(['method'=>'POST','id'=>'frm_agreement','enctype'=>'multipart/form-data', 'class'=>'form','onsubmit'=>'updateAgreement(this); return false;'])}}
                <input type="hidden" name="token" value="{{{ csrf_token() }}}" id="token" readonly="true" />
                <input type="hidden" name='idAgreement' value="" id="idAgreement" readonly='true'/>
                <input type="hidden" name='idMinuta' value="" id="idMinuta" readonly='true'/>
                <br>
                <div class="form-group">
                    <div class="form-group row">
                        <div class="col-md-8">
                            <label><b>Acuerdo</b></label>
                            <textarea type="text" class="form-control" name="agreement" style="resize: none;" id="agreement" rows="2" required readonly></textarea>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label><b>Responsable</b></label>
                            <input type="text" class="form-control" name="responsable" id="responsable" readonly>
                            <br>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-left: 10px;">
                        <label class="col-xs-2 col-form-label">Fecha Inicio</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" required name="dateStart" autocomplete="off" id="dateStart" readonly>
                        </div>
                        <label class="col-xs-2 col-form-label">Fecha Final</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="dateEnd" required autocomplete="off" id="dateEnd" readonly>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <label class="col-xs-2 col-form-label"><b>Estatus</b></label>                        
                        <select class="custom-select" name="status" id="statusAgreement" required>
                            <option value="" selected disabled> Seleccionar un estatus</option> 
                            <option value="" disabled>REGISTRADO</option>                           
                            <option value="PROCESO">PROCESO</option>
                            <option value="REALIZADO">REALIZADO</option>
                            <option value="CANCELADO">CANCELADO</option>
                        </select>                        
                    </div>
                </div>
                <div class="modal-footer " style="justify-content: center;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <!-- type="button" onclick="save()" -->
                    {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>