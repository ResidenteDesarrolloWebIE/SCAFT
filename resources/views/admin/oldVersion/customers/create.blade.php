<div class="modal fade" id="createCustomer">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <span type="hidden" name="_token" value="{{{ csrf_token() }}}" id="tokenLoadImages"> </span>
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">CREAR NUEVO CLIENTE</strong></h4>
                <button type="button" class="" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label for="rfcCustomer"><strong style="color:red">*</strong><strong>RFC/ Tax ID:</strong></label>
                                <input type="text" class="form-control" name="rfcCustomer" id="rfcCustomer" value="" required>
                            </div>
                            <div class="form-group text-center">
                                <label for="reasonCustomer"><strong style="color:red">*</strong><strong>Razón social:</strong></label>
                                <input type="text" class="form-control" name="reasonCustomer" id="reasonCustomer" value="" required>
                            </div>
                            <div class="form-group text-center">
                                <label for="address"><strong style="color:red">*</strong><strong>Direccón:</strong></label>
                                <input type="text" class="form-control" name="address" id="addressCustomer" value="" required>
                            </div>
                            <div class="form-group text-center">
                                <label for="nameCustomer"><strong style="color:red">*</strong><strong>Nombre de usuario:</strong></label>
                                <textarea class="form-control" rows="3" id="nameCustomer" name="nameCustomer"></textarea>
                            </div>
                            <div class="form-group text-center">
                                <label for="passwordCustomer"><strong style="color:red">*</strong><strong>Contraseña:</strong></label>
                                <input type="text" class="form-control" name="passwordCustomer" id="passwordCustomer" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label for="countryCustomer"><strong style="color:red">*</strong><strong>Pais:</strong></label>
                                <input type="text" class="form-control" name="countryCustomer" id="countryCustomer" value="">
                            </div>
                            <div class="form-group text-center">
                                <label for="cityCustomer"><strong style="color:red">*</strong><strong>Ciudad:</strong></label>
                                <input type="text" class="form-control" name="cityCustomer" id="cityCustomer" value="">
                            </div>
                            <div class="form-group text-center">
                                <label for="codeCustomer"><strong style="color:red">*</strong><strong>C.P:</strong></label>
                                <input type="text" class="form-control" name="codeCustomer" id="codeCustomer" value="">
                            </div><br>
                            <div class="form-group text-center">
                                <label for="emailCustomer"><strong style="color:red">*</strong><strong>Correo electronico:</strong></label>
                                <input type="text" class="form-control" name="emailCustomer" id="emailCustomer" value="">
                            </div><br>
                            <div class="form-group text-center">
                                <label for="repeatPasswordCustomer"><strong style="color:red">*</strong><strong>Repetir contraseña:</strong></label>
                                <input type="text" class="form-control" name="repeatPasswordCustomer" id="repeatPasswordCustomer" value="">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer " style="justify-content: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>