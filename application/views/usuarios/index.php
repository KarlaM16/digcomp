<div class="nk-block-head nk-block-head">
    <div class="nk-block-head-content">
        <h4 class="nk-block-title">Lista de usuarios permitidos</h4>
        <div class="nk-block-des d-flex justify-content-end px-3">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalDefault">Agregar usuario</button>
        </div>
    </div>
</div>

<div class="card card-preview">
    <div class="card-inner">
        <table class="table table-sm small">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $count=1; foreach ($usuarios as $u):?> <!-- por cada usuario haga una tabla-->
                    <tr>
                        <td><?php echo $count;?></td>
                        <td><?php echo $u->nombre;?></td>
                        <td><?php echo $u->email;?></td>
                        <td><?php echo $u->rol;?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#edit-user" data-user="<?php echo $u->id;?>" class="btn btn-primary btn xs">Actualizar</a>
                            <a href="#" data-toggle="modal" data-target="#change-user" data-user="<?php echo $u->id;?>" class="btn btn-warning btn xs">Cambiar contraseña</a>
                            <a href="#" data-toggle="modal" data-target="#delete-user" data-user="<?php echo $u->id;?>" class="btn btn-danger btn xs">Eliminar</a>
                        </td>
                       </tr>                      
                <?php $count++; endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal de agregar usuario -->
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
                <form action="<?= base_url('usuarios/create'); ?>" method="post"> <!--formulario,base_url para dirigirse al controlador-->
                    <div class="nk-block">
                        <div class="form-group col 12">
                            <label class="form-label" for="default-01">Nombre</label>
                            <div class="form-control-wrap">
                                <input type="text" name="nombre" class="form-control" id="default-01" placeholder="Escriba nombre completo" required>
                            </div>
                        </div>
                        <div class="form-group col 12">
                            <label class="form-label" for="default-01">Email</label>
                            <div class="form-control-wrap">
                                <input type="email" name="email" class="form-control" id="default-01" placeholder="Escriba correo electrónico" required>
                            </div>
                        </div>
                        <div class="form-group col 12">
                            <label class="form-label" for="default-01">Contraseña</label>
                            <div class="form-control-wrap">
                                <input type="password" name="password" class="form-control" id="default-01" placeholder="usuario@correo.com" required>
                            </div>
                        </div>
                        <div class="form-group col 12">
                            <label class="form-label" for="default-01">Rol</label>
                            <div class="form-control-wrap">
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
                            <button type="submit" class="btn btn-primary btn-xs"><em class="icon ni ni-save"></em>Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="base_url" value="<?php echo base_url();?>">
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
                <form action="<?= base_url('usuarios/update'); ?>" method="post"> <!--formulario,base_url para dirigirse al controlador-->
                    <input type="hidden" id="edit_user_id" name="id" value="">
                    <div class="nk-block">
                        <div class="form-group col 12">
                            <label class="form-label" for="default-01">Nombre</label>
                            <div class="form-control-wrap">
                                <input type="text" name="name" class="form-control" id="edit_name_user" placeholder="Escriba nombre completo" required>
                            </div>
                        </div>
                        <div class="form-group col 12">
                            <label class="form-label" for="default-01">Email</label>
                            <div class="form-control-wrap">
                                <input type="email" name="email" class="form-control" id="edit_email_user" placeholder="Escriba correo electrónico" required>
                            </div>
                        </div>
                        <div class="form-group col 12">
                            <label class="form-label" for="default-01">Rol</label>
                            <div class="form-control-wrap">
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
                            <button type="submit" class="btn btn-primary btn-xs"><em class="icon ni ni-save"></em>Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="change-user">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Agregar Usuario</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('usuarios/create'); ?>" method="post"> <!--formulario,base_url para dirigirse al controlador-->
                    <div class="nk-block">
                        <div class="form-group col 12">
                            <label class="form-label" for="default-01">Nombre</label>
                            <div class="form-control-wrap">
                                <input type="text" name="nombre" class="form-control" id="default-01" placeholder="Escriba nombre completo" required>
                            </div>
                        </div>
                        <div class="form-group col 12">
                            <label class="form-label" for="default-01">Email</label>
                            <div class="form-control-wrap">
                                <input type="email" name="email" class="form-control" id="default-01" placeholder="Escriba correo electrónico" required>
                            </div>
                        </div>
                        <div class="form-group col 12">
                            <label class="form-label" for="default-01">Contraseña</label>
                            <div class="form-control-wrap">
                                <input type="password" name="password" class="form-control" id="default-01" placeholder="usuario@correo.com" required>
                            </div>
                        </div>
                        <div class="form-group col 12">
                            <label class="form-label" for="default-01">Rol</label>
                            <div class="form-control-wrap">
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
                            <button type="submit" class="btn btn-primary btn-xs"><em class="icon ni ni-save"></em>Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="delete-user">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">eliminar usuario</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('usuarios/delete'); ?>" method="post"> <!--formulario,base_url para dirigirse al controlador-->
                    <div class="nk-block">
                    <p> class="text danger text-center>"este usuario sera elminado"

                    </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-xs"><em class="icon ni ni-save"></em>Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>