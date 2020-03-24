<div class="modal fade" id="editProject">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <span type="hidden" name="_token" value="{{{ csrf_token() }}}" id="tokenLoadImages"> </span>
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">PROYECTO: </strong> <strong id='folio'></strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="text-right modal-header-info">
                <h4 class=""><strong>EDITAR </strong></h4>
            </div>
            <div class="modal-body">
                {{Form::open(['method'=>'PUT','id'=>'formEditProject','enctype'=>'multipart/form-data', 'class'=>'row','onsubmit'=>'editProject(this); return false;'])}}
                <input type="hidden" name="project" value="" id="idProject" readonly="true" />
                <input type="hidden" name="token" value="{{ csrf_token() }}" id="token" readonly="true" />
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label for="folioProject" ><strong style="color:red">*</strong><strong >Folio</strong></label>
                        <input type="text" class="form-control" name="folioProject" value="" id="idFolioProject" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                    <div class="form-group text-center">
                        <label for="clientProject"><strong style="color:red">*</strong><strong>Cliente</strong></label>
                        <select class="custom-select" id="idClientProject" value="" name="clientProject" required>
                            @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <label for="substationProject"><strong style="color:red">*</strong><strong>Subestacion</strong></label>
                        <input type="text" class="form-control" name="substationProject" value="" id="idSubstationProject"  required>
                    </div>
                    <div class="form-group text-center">
                        <label multiple="" for="affiliationProject"><strong style="color:red">*</strong><strong>Proyectos afiliados</strong></label>
                        <select class="custom-select" id="idAffiliationProject" name="affiliationProject" required>
                            <option value="" selected disabled>Selecciona un Proyecto</option>
                            @foreach($projects as $project)
                            <option value="{{$project->id}}">{{$project->folio}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label for="nameProject"><strong style="color:red">*</strong><strong>Nombre</strong></label>
                        <input type="text" class="form-control" name="nameProject" value="" id="idNameProject"  required>
                    </div>
                    <div class="form-group text-center">
                        <label for="typeProject"><strong style="color:red">*</strong><strong>Tipo</strong></label>
                        <select class="custom-select" id="idTypeProject" name="typeProject" value="" required>
                            <option value="SUMINISTRO">SUMINISTRO</option>
                            <option value="SERVICIO">SERVICIO</option>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <label for="descriptionProject"><strong>Descripcion</strong></label>
                        <textarea class="form-control" rows="2" id="idDescription" name="descriptionProject" required></textarea>
                    </div>
                    <div class="form-group text-center">
                        <label for="statusProject"><strong>Estatus: </strong></label>
                        <select class="custom-select" id="idStatusProject" name="statusProject" value="" style="width:200px">
                            <option value="PENDIENTE" disabled>PENDIENTE</option>
                            <option value="PROCESO" disabled>PROCESO</option>
                            <option value="TERMINADO">TERMINADO</option>
                            <option value="CANCELADO">CANCELADO</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer " style="justify-content: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button><!-- type="button" onclick="save()" -->
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>