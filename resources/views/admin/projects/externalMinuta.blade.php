<div class="modal fade" id="externalMinutaProject" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">Folio: </strong> <strong id='idFolioProject'></strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="text-right modal-header-info">
                <h4 class=""><strong>MINUTAS EXTERNAS</strong></h4>
            </div>
            <div class="modal-body">
                {{Form::open(['method'=>'POST','id'=>'formulario','enctype'=>'multipart/form-data', 'class'=>'row','onsubmit'=>'save(this); return false;'])}}
                <input type="hidden" name="token" value="{{{ csrf_token() }}}" id="token" readonly="true" />
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label for="folioProject"><strong style="color:red">*</strong><strong>Numero de minuta</strong></label>
                        <input type="text" class="form-control" name="folioProject" id="folioProject" value="" required>
                    </div>
                    <div class="form-group text-center">
                        <label for="folioProject"><strong style="color:red">*</strong><strong>Fecha Inicio</strong></label>
                        <input type="date" class="form-control" name="folioProject" id="folioProject" value="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label for="folioProject"><strong style="color:red">*</strong><strong>Fecha</strong></label>
                        <input type="date" class="form-control" name="folioProject" id="folioProject" value="" required>
                    </div>
                    <div class="form-group text-center">
                        <label for="folioProject"><strong style="color:red">*</strong><strong>Fecha final</strong></label>
                        <input type="date" class="form-control" name="folioProject" id="folioProject" value="" required>
                    </div>
                </div>

            </div>
            <table class=" offset-1 table col-md-10">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Acuerdo</th>
                        <th>Responsable</th>
                        <th><button id="addAgreements">Añadir</button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="divAgreements">
                        <th>
                            <input type="text" class="form-control" name="folioProject" id="folioProject" placeholder="id" value="" required>
                        </th>
                        <td>
                            <input type="text" class="form-control" name="folioProject" id="folioProject" placeholder="Acuerdo" value="" required>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="folioProject" id="folioProject" placeholder="Responsable" value="" required>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="modal-footer " style="justify-content: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button><!-- type="button" onclick="save()" -->
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>