<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-aside-wrap">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Preguntas</h4>
                            <div class="nk-block-des">
                                <p>Preguntas en la entrevista del AREA 5</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content align-self-start d-lg-none">
                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row justify-content-around">
                        <?php foreach ($niveles as $n) : ?>
                            <?php if ($n->nombre != 'Validacion') : ?>
                                <div class="col-6"><span class="dot dot-lg" data-bg="#6847E6"></span><small><?php echo $n->nombre; ?></small></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="row bg-primary justify-content-center">
                        <h5 class="text-white lead">Competencia 1</h5>
                    </div>
                    <div class="row">

                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Pregunta</th>
                                        <th class="text-center">Nivel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($respuestas as $r) : ?>
                                        <?php if($r->nombre!='Validacion'):?>
                                        <tr>
                                            <td><small><?php echo $r->pregunta;?></small></td>
                                            <td class="text-center small font-weight-bold"><?php echo $r->valor; ?></td>
                                        </tr>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <table class="table table-sm table-bordered mb-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">Validación</th>
                                        <th class="text-center">Nivel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($respuestas as $r) : ?>
                                        <?php if($r->nombre=='Validacion'):?>
                                        <tr>
                                            <td><small><?php echo $r->pregunta;?></small></td>
                                            <td class="text-center small font-weight-bold"><?php echo $r->valor; ?></td>
                                        </tr>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="row bg-primary justify-content-center">
                        <h5 class="text-white lead">Competencia 2</h5>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Pregunta</th>
                                        <th class="text-center">Nivel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($respuestas_2 as $r) : ?>
                                        <?php if($r->nombre!='Validacion'):?>
                                        <tr>
                                            <td><small><?php echo $r->pregunta;?></small></td>
                                            <td class="text-center small font-weight-bold"><?php echo $r->valor; ?></td>
                                        </tr>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                            <table class="table table-sm table-bordered mb-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">Validación</th>
                                        <th class="text-center">Nivel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($respuestas_2 as $r) : ?>
                                        <?php if($r->nombre=='Validacion'):?>
                                        <tr>
                                            <td><small><?php echo $r->pregunta;?></small></td>
                                            <td class="text-center small font-weight-bold"><?php echo $r->valor; ?></td>
                                        </tr>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row bg-primary justify-content-center">
                        <h5 class="text-white lead">Competencia 3</h5>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Pregunta</th>
                                        <th class="text-center">Nivel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($respuestas_3 as $r) : ?>
                                        <?php if($r->nombre!='Validacion'):?>
                                        <tr>
                                            <td><small><?php echo $r->pregunta;?></small></td>
                                            <td class="text-center small font-weight-bold"><?php echo $r->valor; ?></td>
                                        </tr>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                            <table class="table table-sm table-bordered mb-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">Validación</th>
                                        <th class="text-center">Nivel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($respuestas_3 as $r) : ?>
                                        <?php if($r->nombre=='Validacion'):?>
                                        <tr>
                                            <td><small><?php echo $r->pregunta;?></small></td>
                                            <td class="text-center small font-weight-bold"><?php echo $r->valor; ?></td>
                                        </tr>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row bg-primary justify-content-center">
                        <h5 class="text-white lead">Competencia 4</h5>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Pregunta</th>
                                        <th class="text-center">Nivel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($respuestas_4 as $r) : ?>
                                        <?php if($r->nombre!='Validacion'):?>
                                        <tr>
                                            <td><small><?php echo $r->pregunta;?></small></td>
                                            <td class="text-center small font-weight-bold"><?php echo $r->valor; ?></td>
                                        </tr>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                            <table class="table table-sm table-bordered mb-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">Validación</th>
                                        <th class="text-center">Nivel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($respuestas_2 as $r) : ?>
                                        <?php if($r->nombre=='Validacion'):?>
                                        <tr>
                                            <td><small><?php echo $r->pregunta;?></small></td>
                                            <td class="text-center small font-weight-bold"><?php echo $r->valor; ?></td>
                                        </tr>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- .nk-block -->
            </div>
            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                <div class="card-inner-group" data-simplebar>
                    <div class="card-inner">
                        <div class="user-card">
                            <div class="user-avatar bg-primary">
                                <span><?php echo $empleado->empleado_id; ?></span>
                            </div>
                            <div class="user-info">
                                <span class="lead-text"><small><?php echo $empleado->global_id; ?></small></span>
                                <span class="sub-text"><?php echo ($empleado->email != null) ? $empleado->email : 'Sin Información'; ?></span>
                            </div>
                            <div class="user-action">

                            </div>
                        </div><!-- .user-card -->
                    </div><!-- .card-inner -->

                    <div class="card-inner p-0">
                        <ul class="link-list-menu">
                            <li><a href="<?php echo base_url('empleados/details/' . $empleado->global_id); ?>"><em class="icon ni ni-user-fill-c"></em><span>Información Personal</span></a></li>
                            <li><a href="<?php echo base_url('empleados/competencia/' . $empleado->global_id); ?>"><em class="icon ni ni-bell-fill"></em><span>Competencias</span></a></li>
                            <li><a class="active" href="<?php echo base_url('empleados/preguntas/' . $empleado->global_id); ?>"><em class="icon ni ni-activity-round-fill"></em><span>Preguntas</span></a></li>
                        </ul>
                    </div><!-- .card-inner -->

                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-channel px-1 py-1">
                            <a href="<?php echo base_url('empleados/descargapreguntas/'.$empleado->global_id);?>" class="btn btn-sm btn-primary">Exportar en PDF</a>                   
                        </div>
                    </div><!-- .nk-tb-item -->
                </div><!-- .card-inner-group -->
            </div><!-- card-aside -->
        </div><!-- .card-aside-wrap -->
    </div><!-- .card -->
</div><!-- .nk-block -->