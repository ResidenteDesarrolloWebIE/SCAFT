<div class="modal fade" id="editProject">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <span type="hidden" name="_token" value="{{{ csrf_token() }}}" id="tokenLoadImages"> </span>
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">PROYECTO: </strong> <strong id='idFolioProjectEdit'></strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="text-right modal-header-info">
                <h4 class=""><strong>EDITAR </strong></h4>
            </div>
            <div class="modal-body">
                {{Form::open(['method'=>'PUT','id'=>'formEditProject','enctype'=>'multipart/form-data', 'class'=>'row','onsubmit'=>'editProject(this); return false;'])}}
                <input type="hidden" name="project" value="" id="idProjectEdit" readonly="true" />
                <input type="hidden" name="token" value="{{ csrf_token() }}" id="token" readonly="true" />
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label for="typeProjectEdit"><strong style="color:red">*</strong><strong>Tipo</strong></label>
                        <select class="custom-select" name="typeProjectEdit" id="idTypeProjectEdit" required disabled>
                            <option id="optionSuministrosEdit" value="1">SUMINISTRO</option>
                            <option id="optionServiciosEdit" value="2">SERVICIO</option>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <label for="nameProjectEdit"><strong style="color:red">*</strong><strong>Nombre</strong></label>
                        <input type="text" class="form-control" name="nameProjectEdit" id="idNameProjectEdit" value="" required placeholder="Nombre" disabled>
                    </div>
                    <div class="form-group text-center">
                        <label for="substationProjectEdit"><strong style="color:red">*</strong><strong>Subestacion</strong></label>
                        <input type="text" class="form-control" name="substationProjectEDit" id="idSubstationProjectEdit" value="" required placeholder="Subestacion" disabled>
                    </div>
                    <div class="form-group text-center">
                        <label for="affiliationProject"><strong>Proyectos afiliados (Si aplica)</strong></label>
                        <select class="custom-select" name="affiliationProjectEdit[]" id="idAffiliationProjectEdit">
                            <option value="" selected>Selecciona un cliente</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label for="folioProjectEdit"><strong style="color:red">*</strong><strong>Folio</strong></label>
                        <div class="input-group">
                            <div class="input-group-append">
                                <input type="text" class="form-control" name="initialsProjectEdit" id="idInitialsProjectEdit" value="--" style="width: 45px" disabled>
                            </div>
                            <input type="number" class="form-control" name="folioProjectEdit" id="idFolioProjectEdit" value="" required disabled>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <label for="clientProjectEdit"><strong style="color:red">*</strong><strong>Cliente</strong></label>
                        <select class="custom-select" name="clientProjectEdit" id="idClientProjectEdit" required disabled>
                            @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <label for="totalAmountEdit"><strong style="color:red">*</strong><strong>Monto total</strong></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="totalAmountEdit" id="idTotalAmountEdit" value="" required placeholder="Monto total" disabled>
                            <div class="input-group-append">
                                <select class="custom-select" name="coinProjectEdit" id="idCoinProjectEdit" required disabled>
                                    <option id="optionPesosEdit" value="1" selected>MXN</option>
                                    <option id="optionDolaresEdit" value="2">USD</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center" id="divExchangeRate">
                        <label for="exchangeRateEdit"><strong style="color:red">*</strong><strong>Tipo de cambio</strong></label>
                        <input type="number" class="form-control" name="exchangeRateEdit" id="idExchangeRateEdit" value="" required placeholder="Tipo de cambio" disabled>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group text-center">
                        <label for="statusProjectEdit"><strong style="color:red">*</strong><strong>Estatus</strong></label>
                        <select class="custom-select" name="statusProjectEdit" id="idStatusProjectEdit" required>
                            <option id="optionPendienteEdit" value="PENDIENTE">PENDIENTE</option>
                            <option id="optionProcesoEdit" value="PROCESO">PROCESO</option>
                            <option id="optionTerminadoEdit" value="TERMINADO">TERMINADO</option>
                            <option id="optionCanceladoEdit" value="CANCELADO">CANCELADO</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group text-center">
                        <label for="descriptionProjectEdit"><strong style="color:red">*</strong><strong>Descripcion</strong></label>
                        <textarea class="form-control" rows="3" id="idDescriptionProjectEdit" name="descriptionProjectEDit" required placeholder="Descripcion" disabled></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer " style="justify-content: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Editar</button><!-- type="button" onclick="save()" -->
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>