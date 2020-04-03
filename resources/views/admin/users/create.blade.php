<div class="modal fade" id="createUser">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <span type="hidden" name="_token" value="{{{ csrf_token() }}}" id="tokenLoadImages"> </span>
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">CREAR NUEVO USUARIO</strong></h4>
                <button type="button" class="" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                {{Form::open(['method'=>'POST','id'=>'formCreateUser','enctype'=>'multipart/form-data', 'class'=>'row','onsubmit'=>'saveUser(this); return false;'])}}
                <input type="hidden" name="token" value="{{ csrf_token() }}" id="token" readonly="true" />
                
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label for="typeUser"><strong style="color:red">*</strong><strong>Tipo de Usuario</strong></label>
                                <select class="custom-select" id="idTypeUser" name="typeUser" required>
                                    <option value="" selected> Seleccionar un tipo</option>
                                    <option value="CLIENTE">CLIENTE</option>
                                    <option value="EMPLEADO">EMPLEADO</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label for="codeUser"><strong style="color:red">*</strong><strong>Codigo</strong></label>
                                 <input type="text" class="form-control" name="codeUser" id="codeUser" value="" disabled="true" onkeyup="mayus(this);" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label for="nameUser"><strong style="color:red">*</strong><strong>Nombre</strong></label>
                                <input type="text" class="form-control" name="nameUser" id="nameUser" value="" onkeyup="mayus(this);" required>
                            </div>
                            <div class="form-group text-center">
                                <label for="emailUser"><strong style="color:red">*</strong><strong>E-mail</strong></label>
                                <input type="text" class="form-control" name="emailUser" id="emailUser" value="" required>
                            </div>
                            <div class="form-group text-center">
                                <label for="passwordUser"><strong style="color:red">*</strong><strong>Contraseña</strong></label>
                                <input type="text" class="form-control" name="passwordUser" id="passwordUser" value="" required>
                            </div>
                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label for="puestoUser"><strong style="color:red">*</strong><strong>Puesto</strong></label>
                                <input type="text" class="form-control" name="puestoUser" id="puestoUser" style="text-transform:uppercase;" onkeyup="mayus(this);" value="" required>
                            </div>

                           <div class="form-group text-center">
                                <label for="cellUser"><strong style="color:red">*</strong><strong>Telefono</strong></label>
                                <input type="text" class="form-control" name="cellUser" id="cellUser" value="" required>
                            </div>
                            
                            <label for="rolUser"><strong>Roles</strong></label>
                            
                                
                            <div class="custom-control custom-checkbox" id="allroles">
                                @forelse($roles as $rol)
                                    <input type="checkbox" name="idRoles[]" value="{{ $rol->id }}">
                                    <label for="{{ $rol->id }}">{{ $rol->name }}</label>
                                    <br>
                                @empty
                                    <p>No hay datos</p>
                                @endforelse
                            </div>

                            
                           
                                                        
                        </div>
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