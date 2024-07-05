<div class="nk-block ">
    <div class="card card-bordered">
        <div class="row justify-content-center">
            <div class="card-inner card-inner-lg ">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Competencia #<?php echo $numero; ?></h4><!--el numero representa al id, controlador-->
                            <div class="nk-block-des">
                                <p>Estadística de las preguntas de la competencia # <?php echo $numero; ?></p>
                            </div>
                        </div>
                        <div class="nk-block-head-content align-self-start d-lg-none">
                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row justify-content-between">
                        <div class="col-8">
                            <table class="table table-sm small table-bordered">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>Código</th>
                                        <th>Pregunta</th>
                                        <th>Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($preguntas as $p) : ?>
                                        <tr>
                                            <td class=""><?php echo $p->codigo; ?></td>
                                            <td class=""><?php echo $p->pregunta; ?></td>
                                            <td class="">
                                                <?php $letter = str_split($p->codigo); ?>
                                                <?php if ($letter[0] == 'P') : ?>
                                                    <ul>
                                                        <?php foreach ($niveles as $n) : ?>
                                                            <?php if ($n->nombre != 'Validacion') : ?>
                                                                <li>
                                                                    <?php echo $n->valor; ?>
                                                                    <?php $count = 0;
                                                                    foreach ($respuestas as $r) : ?>
                                                                        <?php if ($r->nivel_id == $n->id && $p->id == $r->pregunta_id) : ?>
                                                                            <?php $count++; ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach;
                                                                    echo '<span class="badge badge-primary">' . $count . '</span>'; ?>

                                                                </li>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php else : ?>
                                                    <ul>
                                                        <?php foreach ($niveles as $n) : ?>
                                                            <?php if ($n->nombre == 'Validacion') : ?>
                                                                <li>
                                                                    <?php echo $n->valor; ?>
                                                                    <?php $count = 0;
                                                                    foreach ($respuestas as $r) : ?>
                                                                        <?php if ($r->nivel_id == $n->id && $p->id == $r->pregunta_id) : ?>
                                                                            <?php $count++; ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach;
                                                                    echo '<span class="badge badge-primary">' . $count . '</span>'; ?>

                                                                </li>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>

                            <small><strong>P</strong> y <strong>V</strong> equivalen a <strong>pregunta</strong> y <strong>validación</strong>, el primer número es la referencia de la competencia y el segundo número hace referencia a la pregunta.</small>
                            <p>
                                <span class="badge badge-dot badge-dot-xs badge-primary">N-1:No se como hacerlo. </span> |
                                <span class="badge badge-dot badge-dot-xs badge-success">N-2:Puedo hacerlo con ayuda.</span> |
                                <span class="badge badge-dot badge-dot-xs badge-dark">N-3:Puedo hacerlo por mi cuenta.</span> |
                                <span class="badge badge-dot badge-dot-xs badge-gray">N-4:Puedo hacerlo, y ayudo a otros.</span>
                            </p>
                        </div>
                        <div class="col-4">

                        </div>
                    </div>
                </div><!-- .nk-block -->
                <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-channel px-1 py-1">
                            <a href="<?php echo base_url('competencias/detailsdescarga/'.$numero) ?>" class="btn btn-sm btn-primary">Exportar en PDF</a>                   
                        </div>
                </div><!-- .nk-tb-item -->
            </div>

        </div><!-- .card-aside-wrap -->
    </div><!-- .card -->
</div><!-- .nk-block -->