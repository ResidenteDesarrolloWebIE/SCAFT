<div class="modal fade" id="editUser">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="idFolio"><span class="fa fa-spinner" aria-hidden="true"></span>&nbsp;&nbsp;<strong class="modal-folio">USUARIO : </strong> <strong id='idNameUsuario'></strong></h4>
                <button type="button" class="" data-dismiss="modal">&times;</button>
            </div>
            <div class="text-right modal-header-info">
                <h4 class=""><strong>EDITAR </strong></h4>
            </div>
            <div class="modal-body">
                {{Form::open(['method'=>'POST','id'=>'formEditUser','enctype'=>'multipart/form-data', 'class'=>'row','onsubmit'=>'editUser(this); return false;'])}}
                <input type="hidden" name="token" value="{{ csrf_token() }}" id="token" readonly="true" />
                <input type="hidden" name="user" value="" id="idUser" readonly="true" />
                <input type="hidden" name="contact" value="" id="idContact" readonly="true" />

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <label for="typeUser"><strong style="color:red">*</strong><strong>Tipo de Usuario</strong></label>
                                <select class="custom-select" id="idTypeUserEdit" name="typeUserEdit" required>
                                    <option value="" selected disabled> Seleccionar un tipo</option>
                                    <option value="CLIENTE">CLIENTE</option>
                                    <option value="EMPLEADO">EMPLEADO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label for="nameUser"><strong style="color:red">*</strong><strong>Nombre</strong></label>
                                <input type="text" class="form-control" name="nameUserEdit" id="idNameUserEdit" value="" onkeyup="javascript: this.value = this.value.toUpperCase();" required>
                            </div>
                            <div class="form-group text-center">
                                <label for="emailUser"><strong style="color:red">*</strong><strong>E-mail</strong></label>
                                <input type="email" class="form-control" name="emailUserEdit" id="idEmailUserEdit" value="" required>
                            </div>
                            <div class="form-group text-center">
                                <button type="button"class="btn btn-primary" data-toggle="collapse" data-target="#editPassword">Actualizar contraseña</button>
                                <div id="editPassword" class="collapse">
                                    <label for="passwordUser"><strong style="color:red">*</strong>
                                        <strong>Contraseña</strong><br>
                                        (Debe estar seguro de actualizar la contraseña)
                                    </label>
                                    <input type="password" class="form-control" name="passwordUserEdit" id="idPasswordUserEdit" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label for="puestoUser"><strong style="color:red">*</strong><strong>Puesto</strong></label>
                                <input type="text" class="form-control" name="puestoUserEdit" id="idPuestoUserEdit" style="text-transform:uppercase;" onkeyup="javascript: this.value = this.value.toUpperCase();" value="" required>
                            </div>
                            <div class="form-group text-center">
                                <label for="cellUser"><strong style="color:red">*</strong><strong>Telefono</strong></label>
                                <input type="number" class="form-control" name="cellUserEdit" id="idCellUserEdit" value="" required>
                            </div>
                            <div class="form-group text-center" id="allroles">
                                <label for="clientProject"><strong style="color:red">*</strong><strong>Roles</strong></label>
                                <select class="custom-select" name="rolesEdit[]" id="idSelectRolesUserEdit" multiple>
                                    @foreach($roles as $rol)
                                    <option value="{{$rol->id}}">{{$rol->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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