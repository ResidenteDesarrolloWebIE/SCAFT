<div class="modal fade" id="modalAddAgreement" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><strong class="modal-folio">Agregar acuerdo</strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                {{Form::open(['method'=>'POST','id'=>'frm_agreements','enctype'=>'multipart/form-data', 'class'=>'form','onsubmit'=>'saveAgreements(this); return false;'])}}
                <input type="hidden" name="minutaId" id="minutaId" readonly="true" />
                <br>
                <div class="form-group">
                    <div class="row" style="background-color:#BCBCBC">
                        <div class="col text-center" style="margin-top:2%">
                            <a href="#" class="btn btn-primary btn-sm add_button float-right">Agregar acuerdo <i class="fas fa-plus"></i></a>
                        </div>
                        <div class="w-100"></div>
                        <br>
                        <div class="col-md-8">
                            <label><b>Acuerdo</b></label>
                            <textarea type="text" class="form-control" name="acuerdos[]" style="resize: none;" rows="2" required></textarea>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label><b>Responsable</b></label>
                            <input type="text" class="form-control" name="responsables[]">
                            <br>
                        </div>
                        <div class="w-100"></div>
                        <label class="col-xs-2 col-form-label" style="margin-left: 10px;">Fecha Inicio</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" required name="dateStart[]" autocomplete="off">
                            <br>
                        </div>
                        <label class="col-xs-2 col-form-label">Fecha Final</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="dateEnd[]" required autocomplete="off">
                            <br>
                        </div>
                        <div class="field_wrapper row" style="margin-left:2%">
                        </div>
                    </div>
                    <br>
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