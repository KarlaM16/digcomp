<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-aside-wrap">
            <div class="card-inner card-inner-lg">
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
                                <tbody> <!--llenamos la tabla-->
                                    <?php foreach ($preguntas as $p) : ?> <!--recorremos el array de preguntas-->
                                        <?php $verify = str_split($p->codigo, 1) ?>
                                        <?php if ($verify[0] == 'P') : ?><!--p servira para el codigo de la pregunta-->
                                            <tr>
                                                <td class=""><?php echo $p->codigo; ?></td>
                                                <td  class=""><?php echo $p->descripcion;; ?></td>
                                                <td  class="">
                                                    <ul> <!--para el nivel-->
                                                        <?php if ($verify[2] == 1) : ?> 
                                                            <?php $count=1; foreach ($evaluacion[0] as $e) : ?> <!-- con el metodo de evaluacion del controlador-->
                                                                <li>N-<?php echo $count++;?><span class="badge badge-primary"><?php echo $e; ?></span></li><!--imprime cuantos han dicho ese nivel-->
                                                            <?php endforeach; ?>
                                                        <?php elseif ($verify[2] == 2) : ?>
                                                            <?php $count_2=1; foreach ($evaluacion[1] as $e) : ?>
                                                                <li>N-<?php echo $count_2++;?><span class="badge badge-primary"><?php echo $e; ?></span></li>
                                                            <?php endforeach; ?>
                                                        
                                                        <?php elseif ($verify[2] == 3) : ?>
                                                            <?php $count_3=1; foreach ($evaluacion[2] as $e) : ?>
                                                                <li>N-<?php echo $count_3++;?><span class="badge badge-primary"><?php echo $e; ?></span></li>
                                                            <?php endforeach; ?>
                                                        
                                                        <?php elseif ($verify[2] == 4) : ?>
                                                            <?php $count_4=1; foreach ($evaluacion[3] as $e) : ?>
                                                                <li>N-<?php echo $count_4++;?><span class="badge badge-primary"><?php echo $e; ?></span></li>
                                                            <?php endforeach; ?>
                                                        
                                                        <?php elseif ($verify[2] == 5) : ?>
                                                            <?php $count_5=1; foreach ($evaluacion[4] as $e) : ?>
                                                                <li>N-<?php echo $count_5++;?><span class="badge badge-primary"><?php echo $e; ?></span></li>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </td>
                                            </tr>
                                        <?php endif; ?>

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
            </div>

        </div><!-- .card-aside-wrap -->
    </div><!-- .card -->
</div><!-- .nk-block -->