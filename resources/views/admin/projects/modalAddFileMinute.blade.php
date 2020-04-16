<div class="modal fade" id="modalMinuteSignedFile">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><strong class="modal-folio">Agregar minuta firmada</strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                {{Form::open(['method'=>'POST','id'=>'frmMinuteSignedFile','enctype'=>'multipart/form-data', 'class'=>'row','onsubmit'=>'saveMinuteSignedFile(this); return false;'])}}
                <input type="hidden" name="minuteId" id="minuteId" value="" readonly="true" />
                <div class="row" style="width:100%;padding:20px;">
                    <div class="col">
                        <input type="file" name="minuteSigned" id="minuteSigned" accept="document/*">
                    </div>
                </div>
        
                <div id="errorBlock"></div>
            </div>
            <div class="modal-footer " style="justify-content: center;">
                @if(Auth::user()->hasAnyRole(['Administrador','Ofertas','ingenieria','Manufactura','Servicio','Almacen']))
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