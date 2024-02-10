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
                            <h6 class="title">ÁREA 5</h6>
                        </div>
                    </div>
                    <div class="traffic-channel">
                        <div class="traffic-channel-doughnut-ck">
                            <canvas class="analytics-doughnut" id="TrafficChannelDoughnutData"></canvas>
                        </div>
                        <div class="traffic-channel-group g-2">
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#9cabff"></span><span>Problemas Técnicos.</span></div>
                                <div class="amount">4,305 <small>58.63%</small></div>
                            </div>
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#b8acff"></span><span>Identificación de Necesidades y Respuestas Tecnólogicas.</span></div>
                                <div class="amount">859 <small>23.94%</small></div>
                            </div>
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#ffa9ce"></span><span>Uso Creativo de Tecnología Digital.</span></div>
                                <div class="amount">482 <small>12.94%</small></div>
                            </div>
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#f9db7b"></span><span>Lagunas en Competencias Digitales.</span></div>
                                <div class="amount">138 <small>4.49%</small></div>
                            </div>
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
                            <h6 class="title">Competencia 1</h6>
                        </div>
                    </div>
                    <div class="traffic-channel">
                        <div class="traffic-channel-doughnut-ck">
                            <canvas class="analytics-doughnutc1" id="TrafficChannelDoughnutDatac1"></canvas>
                        </div>
                        <div class="traffic-channel-group g-2">
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#9cabff"></span><span>No se como Hacerlo</span></div>
                                <div class="amount"> <small><?php echo $competencia_1->promedio_1;?> %</small></div>
                            </div>
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#b8acff"></span><span>Puedo hacerlo con ayuda.</span></div>
                                <div class="amount"><small><?php echo $competencia_1->promedio_2;?> %</small></div>
                            </div>
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#ffa9ce"></span><span>Puedo Hacerlo por mi cuenta.</span></div>
                                <div class="amount"><small><?php echo $competencia_1->promedio_3;?> %</small></div>
                            </div>
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#f9db7b"></span><span>Puedo hacerlo y ayudo a otros.</span></div>
                                <div class="amount"><small><?php echo $competencia_1->promedio_4;?> %</small></div>
                            </div>
                        </div><!-- .traffic-channel-group -->
                    </div><!-- .traffic-channel -->
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
    </div>
</div>
<input type="hidden" id="base" value="<?php echo base_url();?>">