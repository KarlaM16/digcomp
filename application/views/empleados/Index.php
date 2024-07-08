<div class="nk-block nk-block-lg">
    <div class="nk-block-head nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Empleados</h4>

        </div>
    </div>
    <div class="card card-preview">
        <div class="card-inner">
            <div class="table-responsive">
                <table class="table table-sm table-bordered small first" id="empleados-data">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th scope="col">Id Empleado</th>
                            <th scope="col">Fecha de Entrevista</th>
                            <th scope="col">Género</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Formación</th>
                            <th scope="col">Correo Electrónico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;
                        foreach ($empleados as $e) : ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><a href="<?php echo base_url('empleados/details/'.$e->global_id);?>"><?php echo $e->global_id; ?></a></td>
                                <td><?php echo date('d-m-Y H:i:s', strtotime($e->creation_time)); ?></td>
                                <td><?php echo $e->genero; ?></td>
                                <td><?php echo $e->edad; ?></td>
                                <td><?php echo $e->formacion; ?></td>
                                <td><?php echo ($e->email != null) ? $e->email : 'Sin información'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">