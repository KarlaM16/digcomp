<div class="nk-block">
    <div class="row g-gs">
        <div class="col-md-3 col-xxl-6">
            <div class="card card-bordered h-100">
                <div class="card-inner mb-n2">
                    <div class="card-title-group">
                        <div class="card-title card-title-sm">
                            <h6 class="title">Encuesta</h6>
                            <p>Metricas sobre la encuesta.</p>
                        </div>

                    </div>
                </div>
                <div class="nk-tb-list is-loose traffic-channel-table">
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-channel px-1 py-1">
                            <span class="tb-lead">Empleados Encuestados</span>
                        </div>
                        <div class="nk-tb-col nk-tb-sessions">
                            <span class="tb-sub tb-amount"><span><?php echo $employees; ?></span></span>
                        </div>


                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-channel px-1 py-1">
                            <span class="tb-lead">Femenino</span>
                        </div>
                        <div class="nk-tb-col nk-tb-sessions">
                            <span class="tb-sub tb-amount"><span><?php echo $female; ?></span></span>
                        </div>

                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-channel px-1 py-1">
                            <span class="tb-lead">Masculino</span>
                        </div>
                        <div class="nk-tb-col nk-tb-sessions">
                            <span class="tb-sub tb-amount"><span><?php echo $male; ?></span></span>
                        </div>

                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-channel px-1 py-1">
                            <span class="tb-lead">Entrevistados Interesados</span>
                        </div>
                        <div class="nk-tb-col nk-tb-sessions">
                            <span class="tb-sub tb-amount"><span><?php echo $interesados; ?></span></span>
                        </div>

                    </div><!-- .nk-tb-item -->
                </div><!-- .nk-tb-list -->
            </div><!-- .card -->
        </div>
        <div class="col-md-6 col-xxl-4">
            <div class="card card-bordered card-full">
                <div class="card-inner d-flex flex-column h-100">
                    <div class="card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Edades de los encuestados</h6>
                            <p>Se muestran el analisis de edad para los encuestados.</p>
                        </div>
                    </div>
                    <div class="progress-list gy-3">
                        <?php foreach ($edades as $e) : ?>
                            <?php $porcentaje = (($e->cantidad / $employees) * 100); ?>
                            <div class="progress-wrap">
                                <div class="progress-text">
                                    <div class="progress-label"><?= $e->edad; ?></div>
                                    <div class="progress-amount"><?php echo number_format($porcentaje, 2, '.', ',') . '%'; ?></div>
                                </div>
                                <div class="progress progress-md">
                                    <div class="progress-bar" data-progress="<?php echo $e->cantidad; ?>" style="width: <?php echo number_format($porcentaje, 2, '.', ',') . '%'; ?>;"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-bordered h-100 p-3">
                <div class="row g-4">
                    <div class="col-sm-12 col-xxl-12">

                        <h6 class="text-center">Formaciones de los empleados</h6>
                        <?php foreach ($formacion as $f) : ?>
                            <div class="nk-order-ovwg-data buy mt-1 p-0">
                                <div class="amount px-2"><?php echo $f->cantidad; ?></div>
                                <div class="info"> <strong class="ucap"><?php echo $f->formacion; ?></strong></div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="row g-gs">
        <div class="col-md-4 col-xxl-3">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-3">
                        <div class="card-title">
                            <h6 class="title">Empresas</h6>
                            <p>Empleados Entrevistados <em class="icon ni ni-info" data-toggle="tooltip" data-placement="right" title="" data-original-title="Referral Informations"></em></p>
                        </div>

                    </div>
                    <?php foreach ($empresas as $e) : ?>
                        <?php if ($e->nombre != 'N/A') : ?>
                            <div class="user-activity-group g-4">

                                <div class="user-activity">
                                    <em class="icon ni ni-users"></em>
                                    <div class="info">
                                        <?php $count = 0;
                                        foreach ($usuarios as $u) {
                                            if ($u->empresa_id == $e->id) {
                                                $count++;
                                            }
                                        } ?>
                                        <span class="amount"><?php echo $count; ?></span>
                                        <span class="title"><?php echo $e->nombre; ?></span>
                                    </div>
                                    <div class="gfx" data-color="#9cabff" style="color: rgb(156, 171, 255);">
                                        <svg enable-background="new 0 0 48 17.5" version="1.1" viewBox="0 0 48 17.5" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="currentColor" d="m1.2 17.4h-0.3c-0.5-0.1-0.8-0.7-0.7-1.2 2-7.2 5-12.2 8.8-14.7 1.5-1 3-1.5 4.5-1.4 4.9 0.3 7.2 4.9 9 8.5 0.3 0.4 0.5 0.8 0.7 1.2 1 1.8 2.7 3.9 4.5 4.3 0.9 0.2 1.7-0.1 2.6-0.8 1.8-1.4 3-3.7 4.1-5.9 0.5-1 1-1.9 1.5-2.9 1-1.5 2.8-3.5 4.9-3.8 1.1-0.1 2.2 0.3 3.1 1 1.3 1.1 1.9 2.6 2.4 4.1 0.4 1 0.7 1.9 1.2 2.6 0.3 0.4 0.2 1.1-0.2 1.4s-1.1 0.2-1.4-0.2c-0.7-0.9-1.1-2-1.5-3-0.5-1.3-1-2.5-1.9-3.3-0.5-0.4-1-0.6-1.5-0.5-1.3 0.2-2.7 1.6-3.5 2.8-0.5 0.8-1 1.8-1.4 2.7-1.2 2.4-2.4 4.9-4.6 6.5-1.3 1.1-2.8 1.5-4.2 1.2-3.1-0.6-5.1-3.9-5.9-5.3-0.2-0.4-0.4-0.8-0.6-1.3-1.7-3.4-3.5-7.2-7.3-7.4-1.1-0.1-2.1 0.3-3.3 1-3.5 2.4-6.2 7-8 13.7-0.2 0.4-0.6 0.7-1 0.7z"></path>
                                        </svg>
                                    </div>

                                </div>

                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <small class="text-justify px-3 mt-3">
                    Los cálculos realizados en este dashboard
                    son proporcionados por estas dos empresas,
                    en la cual se identifican las posibles
                    ventajas y desventajas en cada competencias de forma global.
                </small>

            </div><!-- .card -->
        </div>
        <div class="col-md-4 col-xxl-3">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title card-title-sm">
                            <h6 class="title">AREA 5</h6>
                        </div>
                    </div>
                    <div class="traffic-channel">
                        <div class="traffic-channel-doughnut-ck">
                            <canvas class="analytics-doughnutc1" id="TrafficChannelDoughnutDatac1"></canvas>
                        </div>
                        <div class="traffic-channel-group g-2">
                            <?php foreach ($competencias as $c) : ?>
                                <div class="">
                                    <div class="title"><span class="dot dot-lg sq" data-bg="<?php
                                                                                            if ($c->codigo == 'C1') : ?>
                                    #798bff
                                    <?php elseif ($c->codigo == 'C2') : ?>
                                        #b8acff
                                    <?php elseif ($c->codigo == 'C3') : ?>
                                        #ffa9ce
                                    <?php elseif ($c->codigo == 'C4') : ?>
                                        #f9db7b
                                     <?php endif; ?>   
                                    "></span><span class="small"><?php echo $c->codigo . ' - ' . $c->competencia; ?></span>

                                        <?php foreach ($niveles as $n) : ?>
                                            <?php if ($n->competencia == $c->id) : ?>
                                                <small class="amount"><?php echo number_format($n->ponderado * .25, 2); ?>%</small>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <p>Nivel : <span class="badge badge-primary"><?php $nivel = 0;
                                                                            foreach ($niveles as $n) {
                                                                                $nivel += $n->nivel;
                                                                            }
                                                                            echo number_format($nivel / 4, 2, '.', ','); ?></span></p>

                            <div class="nk-tb-col nk-tb-channel px-1 py-1">
                                <a href="<?php echo base_url('dashboard/areadescarga/') ?>" class="btn btn-sm btn-primary">Exportar en PDF</a>                   
                            </div>                                                    

                        </div><!-- .traffic-channel-group -->
                    </div><!-- .traffic-channel -->
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <?php foreach ($competencias as $c) : ?>
            <div class="col-md-4 col-xxl-3">
                <div class="card card-bordered h-100">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <div class="card-title card-title-sm">
                                <h6 class="title"><?php echo $c->codigo . ' - ' . $c->competencia; ?></h6>
                            </div>
                        </div>
                        <div class="traffic-channel">
                            <div class="traffic-channel-doughnut-ck">
                                <canvas class="analytics-doughnutcomp<?php echo $c->id ?>" id="TrafficChannelDoughnutDatacomp<?php echo $c->id ?>"></canvas>
                            </div>
                            <div class="traffic-channel-group g-2">
                                <div class="traffic-channel-data">
                                    <div class="title"><span class="dot dot-lg sq" data-bg="#84DB7B"></span><span>Capacitado</span></div>

                                    <?php foreach ($niveles as $n) : ?>
                                        <?php if ($n->competencia == $c->id) : ?>
                                            <div class="small">
                                                <?php echo number_format($n->ponderado); ?>
                                                <small><?php echo number_format($n->ponderado * .25, 2); ?>%</small>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <div class="traffic-channel-data">
                                    <div class="title"><span class="dot dot-lg sq" data-bg="#D86B52"></span><span>Sin Capacitar</span></div>
                                    <?php foreach ($niveles as $n) : ?>
                                        <?php if ($n->competencia == $c->id) : ?>
                                            <div class="small"><?php echo number_format(100 - $n->ponderado); ?> <small><?php echo number_format(25 - ($n->ponderado * .25), 2, '.', ','); ?>%</small></div>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <p>Nivel : <span class="badge badge-primary">
                                        <?php foreach ($niveles as $n) : ?>
                                            <?php if ($n->competencia == $c->id) : ?>
                                                <?php echo number_format($n->nivel, 2, '.', ','); ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </span></p>

                            </div>
                        </div><!-- .traffic-channel -->
                    </div>
                    <p class="text-right px-4"><a href="<?php echo base_url('competencias/details/' . $c->id); ?>"><strong><em class="ni ni-arrow-right"></em></strong></a></p>

                </div><!-- .card -->
            </div>
        <?php endforeach; ?>



    </div>
</div>
<p class="small">Nota: Los valores utilizados como maximos en cada nivel es 4, de acuerdo a el marco <strong>DIGCOMP V. 2.1</strong></p>
<input type="hidden" id="base" value="<?php echo base_url(); ?>">