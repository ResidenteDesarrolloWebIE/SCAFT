<div class="modal fade" id="internalMinutaProject" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <span type="hidden" name="_token" value="{{{ csrf_token() }}}" id="tokenLoadImages"> </span>
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><span class="fa fa-spinner"
                        aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">Folio: </strong> <strong
                        id='idFolioProject'></strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="text-right modal-header-info">
                <h4 class=""><strong>MINUTAS INTERNAS</strong></h4>
            </div>
            <div class="modal-body">
                {{Form::open(['method'=>'POST','id'=>'frm_minute','enctype'=>'multipart/form-data', 'class'=>'form','onsubmit'=>'saveMinuta(this); return false;'])}}
                <input type="hidden" name="token" value="{{{ csrf_token() }}}" id="token" readonly="true" />
                <div class="row">
                    <div class="col">
                        <a href="#" class="btn btn-primary btn-sm add_button float-right">Agregar acuerdo <i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="form-group">
                    <label><b>Acuerdo</b></label>
                    <textarea type="text" class="form-control"></textarea>
                    <br>
                    <div class="form-group row" style="margin-left: 10px;">
                        <label  class="col-xs-2 col-form-label">Fecha Inicio</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" required id="date">
                        </div>
                        <label  class="col-xs-2 col-form-label">Fecha Final</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" required>
                        </div>
                    </div>
                </div> 
                <div class="field_wrapper">
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