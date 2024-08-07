<div class="nk-block nk-block-lg">
    <?php if ($this->session->flashdata('success') != null) : ?>
        <div class="alert alert-fill alert-success alert-dismissible alert-icon">
            <em class="icon ni ni-cross-circle"></em> <strong>Importante: </strong><?php echo $this->session->flashdata('success');?>
             <button class="close" data-dismiss="alert"></button>
        </div>
    <?php elseif ($this->session->flashdata('error') != null) : ?>
        <div class="alert alert-fill alert-danger alert-dismissible alert-icon">
            <em class="icon ni ni-cross-circle"></em> <strong>Importante: </strong><?php echo $this->session->flashdata('error'); ?>
            <button class="close" data-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    <div class="nk-block-head nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Lista de Empleados Encuestados</h4>
           
        </div>
    </div>
    <div class="card card-preview">
        <div class="card-inner">
            <table class="table table-sm small" id="empleados-data">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Global Id</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Formación</th>
                        <th>Genero</th>
                        <th>Correo Electrónico</th>
                        <!-- <th></th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1;
                    foreach ($usuarios as $u) : ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $u->global_id; ?></td>
                            <td><?php echo $u->edad; ?></td>
                            <td><?php echo $u->formacion; ?></td>
                            <td><?php echo $u->genero; ?></td>
                            <td><?php echo $u->email; ?></td>

                            <!-- <td>
                                <a href="#" data-toggle="modal" data-target="#edit-user" data-user="<?php echo $u->id; ?>" class="text-primary"><em class="icon ni ni-edit"></em></a>
                                <a href="#" data-toggle="modal" data-target="#change-user" data-user="<?php echo $u->id; ?>" class="text-warning"><em class="icon ni ni-lock-alt-fill"></em></a>
                                <a href="#" data-toggle="modal" data-target="#delete-user" data-user="<?php echo $u->id; ?>" class="text-danger"><em class="icon ni ni-trash"></em></a>
                            </td> -->
                        </tr>
                    <?php $count++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
<!-- modal de agregar usuario -->
<!-- Modal Content Code -->
<div class="modal fade" tabindex="-1" id="modalDefault">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Agregar Usuario</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('usuarios/create'); ?>" method="post">
                    <div class="nk-block">
                        <div class="form-group col-12">
                            <label class="form-label" for="default-01">Nombre</label>
                            <div class="form-control-wrap">
                                <input type="text" name="name" class="form-control" id="default-01" placeholder="Escribe el nombre completo" required>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label" for="default-01">Correo Electrónico</label>
                            <div class="form-control-wrap">
                                <input type="email" name="email" class="form-control" id="default-01" placeholder="example@mail.com" required>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label" for="default-01">Contraseña</label>
                            <div class="form-control-wrap">
                                <input type="password" name="password" class="form-control" id="default-01" placeholder="********" required>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label" for="default-06">Rol</label>
                            <div class="form-control-wrap ">
                                <div class="form-control-select">
                                    <select name="rol" class="form-control" id="default-06" required>
                                        <option value="">Selecciona un rol</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Usuario">Usuario</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-xs"><em class="icon ni ni-save"></em> Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal de edición de usuarios para cada uno de los usuarios excepto su contraseñas -->
<div class="modal fade" tabindex="-1" id="edit-user">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Actualizar datos del usuario</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('usuarios/update'); ?>" method="post">
                    <input type="hidden" id="edit_user_id" name="id" value="">
                    <div class="nk-block">
                        <div class="form-group col-12">
                            <label class="form-label" for="default-01">Nombre</label>
                            <div class="form-control-wrap">
                                <input type="text" name="name" class="form-control" id="edit_name_user" placeholder="Escribe el nombre completo" required>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label" for="default-01">Correo Electrónico</label>
                            <div class="form-control-wrap">
                                <input type="email" name="email" class="form-control" id="edit_email_user" placeholder="example@mail.com" required>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label" for="default-06">Rol</label>
                            <div class="form-control-wrap ">
                                <div class="form-control-select">
                                    <select name="rol" class="form-control" id="edit_rol_user" required>
                                        <option value="">Selecciona un rol</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Usuario">Usuario</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-xs"><em class="icon ni ni-save"></em> Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Solo Actualización de Contraseña -->

<div class="modal fade" tabindex="-1" id="change-user">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Actualizar contraseña del usuario</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('usuarios/changepassword'); ?>" method="post">
                    <div class="nk-block">
                        <input type="hidden" id="change_user_id" value="" name="id">
                        <div class="form-group col-12">
                            <label class="form-label" for="default-01">Contraseña</label>
                            <div class="form-control-wrap">
                                <input type="password" name="password" class="form-control" id="default-01" placeholder="********" required>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-xs"><em class="icon ni ni-save"></em> Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Este modal nos sirve para eliminar el usuario obteniendo el id desde el js -->
<div class="modal fade" tabindex="-1" id="delete-user">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Usuario</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('usuarios/delete'); ?>" method="post">
                    <input type="hidden" name="id" id="delete_user_id" value="">
                    <div class="nk-block">
                        <p class="text-danger text-center font-weight-bold">Este usuario sera eliminado y ya no podra iniciar sesión</p>
                        <p class="text-danger text-center font-weight-bold">¿Desea usted eliminarlo?</p>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-xs"><em class="icon ni ni-save"></em> Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>