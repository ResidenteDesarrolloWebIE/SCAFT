<div class="modal fade" id="createProject">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"> <span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">CREAR NUEVO PROYECTO</strong></h4>
                <button type="button" class="" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                {{Form::open(['method'=>'POST','id'=>'formCreateProject','enctype'=>'multipart/form-data', 'class'=>'row','onsubmit'=>'saveProject(this); return false;'])}}
                <input type="hidden" name="token" value="{{ csrf_token() }}" id="tokenCreateProject" readonly="true" />
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label for="typeProject"><strong style="color:red">*</strong><strong>Tipo</strong></label>
                        <select class="custom-select" name="typeProject" id="idTypeProject" required>
                            <option value="" selected disabled> Seleccionar un tipo</option>
                            <option id="optionSuministros" value="1">SUMINISTRO</option>
                            <option id="optionServicios" value="2">SERVICIO</option>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <label for="nameProject"><strong style="color:red">*</strong><strong>Nombre</strong></label>
                        <input type="text" class="form-control" name="nameProject" id="nameProject" value="" required placeholder="Nombre">
                    </div>
                    <div class="form-group text-center">
                        <label for="substationProject"><strong style="color:red">*</strong><strong>Subestacion</strong></label>
                        <input type="text" class="form-control" name="substationProject" id="idSubstationProject" value="" required placeholder="Subestacion">
                    </div>
                    <div class="form-group text-center">
                        <label for="affiliationProject"><strong>Proyectos afiliados (Si aplica)</strong></label><br>
                        <select class="custom-select"  name="affiliationProject[]" id="idAffiliationProject" >
                            <option id="optionCliente" value="" selected disabled>Selecciona un cliente</option>
                        </select>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label for="folioProject"><strong style="color:red">*</strong><strong>Folio</strong></label>
                        <div class="input-group">
                            <div class="input-group-append">
                                <input type="text" class="form-control" name="initialsProject" id="idInitialsProject" value="--" readonly style="width: 45px">
                            </div>
                            <input type="number" class="form-control" value="" name="folioProjectCreate" id="idFolioProjectCreate"  required maxlength="5" 
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="20001">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <label for="clientProject"><strong style="color:red">*</strong><strong>Cliente</strong></label>
                        <select class="custom-select" name="clientProject" id="idClientProject" required>
                            <option value="" selected disabled>Selecciona un cliente</option>
                            @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <label for="totalAmount"><strong style="color:red">*</strong><strong>Monto total</strong></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="totalAmountProject" id="idTotalAmountProject" value="" required placeholder="Monto total">
                            <div class="input-group-append">
                                <select class="custom-select" name="coinProject" id="idCoinProject" required>
                                    <option id="optionPesos" value="1" selected>MXN</option>
                                    <option id="optionDolares" value="2">USD</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center" id="divExcangeRateProject">
                        <label for="exchangeRate"><strong style="color:red">*</strong><strong>Tipo de cambio</strong></label>
                        <input type="number" class="form-control" name="exchangeRate" id="idExchangeRate" value="" placeholder="Tipo de cambio">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group text-center">
                        <label for="descriptionProject"><strong style="color:red">*</strong><strong>Descripcion</strong></label>
                        <textarea class="form-control" rows="3" id="idDescriptionProject" name="descriptionProject" required placeholder="Descripcion"></textarea>
                    </div>
                </div>
                <div class="col-md-12 ">
                    <div class="form-group text-center">
                        <label for="offerProject"><strong style="color:red">*</strong><strong>Oferta</strong></label>
                        <input type="file" name="offerProject" id="idOfferProject" accept="document/*" required>
                        <div id="errorFileProject" style="color:red"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer " style="justify-content: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>