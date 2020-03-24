<div class="modal fade" id="createProject">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <span type="hidden" name="_token" value="{{{ csrf_token() }}}" id="tokenLoadImages"> </span>
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">CREAR NUEVO PROYECTO</strong></h4>
                <button type="button" class="" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                {{Form::open(['method'=>'POST','id'=>'formCreateProject','enctype'=>'multipart/form-data', 'class'=>'row','onsubmit'=>'saveProject(this); return false;'])}}
                <input type="hidden" name="token" value="{{ csrf_token() }}" id="token" readonly="true" />
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label for="folioProject"><strong style="color:red">*</strong><strong>Folio de la cotizacion</strong></label>
                        <input type="text" class="form-control" name="folioProject" id="folioProject" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="" required>
                    </div>
                    <div class="form-group text-center">
                        <label for="clientProject"><strong style="color:red">*</strong><strong>Cliente</strong></label>
                        <select class="custom-select" id="clientProject" name="clientProject" required>
                            <option value="" selected disabled>Selecciona un cliente</option>
                            @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <label for="substationProject"><strong style="color:red">*</strong><strong>Subestacion</strong></label>
                        <input type="text" class="form-control" name="substationProject" id="substationProject" value="" required>
                    </div>
                    <div class="form-group text-center">
                        <label for="affiliationProject"><strong style="color:red">*</strong><strong>Proyectos afiliados</strong></label>
                        <select multiple=""  class="custom-select" id="affiliationProject" name="affiliationProject" required>
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
                        <input type="text" class="form-control" name="nameProject" id="nameProject" value="" required>
                    </div>
                    <div class="form-group text-center">
                        <label for="typeProject"><strong style="color:red">*</strong><strong>Tipo</strong></label>
                        <select class="custom-select" id="idTypeProject" name="typeProject" required>
                            <option value="" selected> Seleccionar un tipo</option>
                            <option value="SUMINISTRO">SUMINISTRO</option>
                            <option value="SERVICIO">SERVICIO</option>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <label for="descriptionProject"><strong>Descripcion</strong></label>
                        <textarea class="form-control" rows="3" id="idDescriptionProject" name="descriptionProject" required></textarea>
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