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
                            <div class="">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#9cabff"></span><span class="small">Problemas Técnicos.</span> <small class="amount"><?php echo number_format($competencias->competencia_1 * .25, 2, '.', ','); ?> %</small></div>
                            </div>
                            <div class="">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#b8acff"></span><span class="small">Identificación de Necesidades y Respuestas Tecnólogicas.</span><small class="amount"><?php echo number_format($competencias->competencia_2 * .25, 2, '.', ','); ?> %</small></div>
                            </div>
                            <div class="">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#ffa9ce"></span><span class="small">Uso Creativo de Tecnología Digital.</span><small class="amount"><?php echo number_format($competencias->competencia_3 * .25, 2, '.', ','); ?> %</small></div>
                            </div>
                            <div class="">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#f9db7b"></span><span class="small">Lagunas en Competencias Digitales.</span><small><?php echo number_format($competencias->competencia_4 * .25, 2, '.', ','); ?> %</small></div>
                            </div>
                            <p>Nivel : <span class="badge badge-primary"><?php $nivel=0; foreach($niveles as $n){$nivel+=$n;} echo number_format($nivel/4,2,'.',',');?></span></p>

                        </div><!-- .traffic-channel-group -->
                    </div><!-- .traffic-channel -->
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-md-4 col-xxl-3">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title card-title-sm">
                            <h6 class="title">Problemas Tecnicos</h6>
                        </div>
                    </div>
                    <div class="traffic-channel">
                        <div class="traffic-channel-doughnut-ck">
                            <canvas class="analytics-doughnutcomp1" id="TrafficChannelDoughnutDatacomp1"></canvas>
                        </div>
                        <div class="traffic-channel-group g-2">
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#84DB7B"></span><span></span></div>
                                <div class="amount"><?php echo number_format($competencias->competencia_1); ?> <small><?php echo number_format(($competencias->competencia_1 * .25), 2, '.', ','); ?>%</small></div>
                            </div>
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#D86B52"></span><span></span></div>
                                <div class="amount"><?php echo number_format(100 - $competencias->competencia_1); ?> <small><?php echo number_format(25 - ($competencias->competencia_1 * .25), 2, '.', ','); ?>%</small></div>
                            </div>
                            <p>Nivel : <span class="badge badge-primary"><?php echo number_format($niveles->nivel_1, 2, '.', ','); ?></span></p>
                            
                        </div><!-- .traffic-channel-group -->
                        
                    </div><!-- .traffic-channel -->
                    
                </div>
                <p class="text-right px-4"><a href="<?php echo base_url('dashboard/competencias/1');?>">Más Información <em class="ni ni-arrow-right"></em></a></p>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-md-4 col-xxl-3">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title card-title-sm">
                            <h6 class="title">Identificación de necesidades y respuestas tecnologicas</h6>
                        </div>
                    </div>
                    <div class="traffic-channel">
                        <div class="traffic-channel-doughnut-ck">
                            <canvas class="analytics-doughnutcomp2" id="TrafficChannelDoughnutDatacomp2"></canvas>
                        </div>
                        <div class="traffic-channel-group g-2">
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#84DB7B"></span><span></span></div>
                                <div class="amount"><?php echo number_format($competencias->competencia_2); ?> <small><?php echo number_format(($competencias->competencia_2 * .25), 2, '.', ','); ?>%</small></div>
                            </div>
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#D86B52"></span><span></span></div>
                                <div class="amount"><?php echo number_format(100 - $competencias->competencia_2); ?> <small><?php echo number_format(25 - ($competencias->competencia_2 * .25), 2, '.', ','); ?>%</small></div>
                            </div>
                            <p>Nivel : <span class="badge badge-primary"><?php echo number_format($niveles->nivel_2, 2, '.', ','); ?></span></p>
                        </div><!-- .traffic-channel-group -->
                    </div><!-- .traffic-channel -->
                </div>
                <p class="text-right px-4"><a href="<?php echo base_url('dashboard/competencias/2');?>">Más Información <em class="ni ni-arrow-right"></em></a></p>

            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-md-4 col-xxl-3">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title card-title-sm">
                            <h6 class="title">Uso creativo de la tecnología digital.</h6>
                        </div>
                    </div>
                    <div class="traffic-channel">
                        <div class="traffic-channel-doughnut-ck">
                            <canvas class="analytics-doughnutcomp3" id="TrafficChannelDoughnutDatacomp3"></canvas>
                        </div>
                        <div class="traffic-channel-group g-2">
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#84DB7B"></span><span></span></div>
                                <div class="amount"><?php echo number_format($competencias->competencia_3); ?> <small><?php echo number_format(($competencias->competencia_3 * .25), 2, '.', ','); ?>%</small></div>
                            </div>
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#D86B52"></span><span></span></div>
                                <div class="amount"><?php echo number_format(100 - $competencias->competencia_3); ?><small><?php echo number_format(25 - ($competencias->competencia_3 * .25), 2, '.', ','); ?>%</small></div>
                            </div>
                            <p>Nivel : <span class="badge badge-primary"><?php echo number_format($niveles->nivel_3, 2, '.', ','); ?></span></p>
                        </div><!-- .traffic-channel-group -->
                    </div><!-- .traffic-channel -->
                </div>
                <p class="text-right px-4"><a href="<?php echo base_url('dashboard/competencias/3');?>">Más Información <em class="ni ni-arrow-right"></em></a></p>

            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-md-4 col-xxl-3">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title card-title-sm">
                            <h6 class="title">Lagunas en competencias digitales.</h6>
                        </div>
                    </div>
                    <div class="traffic-channel">
                        <div class="traffic-channel-doughnut-ck">
                            <canvas class="analytics-doughnutcomp4" id="TrafficChannelDoughnutDatacomp4"></canvas>
                        </div>
                        <div class="traffic-channel-group g-2">
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#84DB7B"></span><span></span></div>
                                <div class="amount"><?php echo number_format($competencias->competencia_4); ?><small><?php echo number_format(($competencias->competencia_4 * .25), 2, '.', ','); ?>%</small></div>
                            </div>
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#D86B52"></span><span></span></div>
                                <div class="amount"><?php echo number_format(100 - $competencias->competencia_4); ?> <small><?php echo number_format(25 - ($competencias->competencia_4 * .25), 2, '.', ','); ?>%</small></div>
                            </div>
                            <p>Nivel : <span class="badge badge-primary"><?php echo number_format($niveles->nivel_4, 2, '.', ','); ?></span></p>
                        </div><!-- .traffic-channel-group -->
                    </div><!-- .traffic-channel -->
                </div>
                <p class="text-right px-4"><a href="<?php echo base_url('dashboard/competencias/4');?>">Más Información <em class="ni ni-arrow-right"></em></a></p>

            </div><!-- .card -->
        </div><!-- .col -->
    </div>
</div>
<p class="small">Nota: Los valores utilizados como maximos en cada nivel es 4, de acuerdo a el marco <strong>DIGCOMP V. 2.1</strong></p>
<input type="hidden" id="base" value="<?php echo base_url(); ?>">