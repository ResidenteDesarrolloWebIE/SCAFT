<div class="modal fade" id="createContact">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <span type="hidden" name="_token" value="{{{ csrf_token() }}}" id="tokenLoadImages"> </span>
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">CREAR NUEVO CONTACTO</strong></h4>
                <button type="button" class="" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label for="nameContact"><strong style="color:red">*</strong><strong>Nombre</strong></label>
                                <input type="text" class="form-control" name="nameContact" id="nameContact" value="" required>
                            </div>
                            <div class="form-group text-center">
                                <label for="telephoneContact"><strong style="color:red">*</strong><strong>Telefono</strong></label>
                                <input type="text" class="form-control" name="telephoneContact" id="telephoneContact" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label for="jobContact"><strong>Puesto</strong></label>
                                <input type="text" class="form-control" name="jobContact" id="jobContact" value="" >
                            </div>
                            <div class="form-group text-center">
                                <label for="mobileContact"><strong>Celular</strong></label>
                                <input type="text" class="form-control" name="mobileContact" id="mobileContact" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group text-center">
                                <label for="emailContact"><strong style="color:red">*</strong><strong>Correo electronico</strong></label>
                                <input type="text" class="form-control" name="emailContact" id="emailContact" value="" required>
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