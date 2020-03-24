<div class="modal" id="changeStatus">
    <div class="modal-dialog ">
        <div class="modal-content">
            
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">Folio: </strong> <strong id='folio'></strong></h4>
                <button type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="text-right modal-header-info">
                <h4 class=""><strong>CAMBIAR EL STATUS DEL PROYECTO</strong></h4>
            </div>

            <div class="modal-body">
                <div style="justify-content: center">
                    <input type="hidden" name="token" value="{{ csrf_token() }}"   id="token" readonly="true"/>
                    <input type="hidden" name="idProject" value=""   id="project" />
                    <div class="text-center">
                        <span><strong> Status: </strong></span>
                        <select class="custom-select text-center" name="status" id="status" style="width:200px">
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                        </select>
                    </div>
                    <div class="text-center" style="margin-top: 20px">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button"  class="btn btn-primary" onclick='changeStatus()'>Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>