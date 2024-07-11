<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reporte por competencia</title>
  </head>
  <style media="screen">
  @page {margin: 1px 1px 1px 1px !important;padding: 1px 1px 1px 1px !important;}
    body{margin: 0;padding:0;font-family: sans-serif;font-size: 9pt;}
    .row{display: table;width: 100%;table-layout: fixed;border-spacing: 10px;}.column{display: table-cell;}
    .table{
      width: 100%;
    }
    .table-bordered{
      border-collapse: collapse;
      margin: 0 auto;
      border: .5px solid black;

    }
    .text-center{
      text-align: center;
    }
    .h5{
      font-size: 12pt;
      font-weight: bolder;
      font-family: sans-serif;
    }
    .align-center{
      align-items: center;
    }
    .center-object{
      margin: 0 auto;
    }
    .div-80{
      width: 80%;
    }
    .p{
      margin: 0;
      padding: 0;
    }
    .mt-0{
      margin-top: -10px;
    }
    .mt-1{
      margin-top: -15px;
    }
    .td{
      margin-right: 10px;
      margin-left: 10px;
    }
    .border{
      border: 1px solid black;
      border-spacing: 0;
      margin:0;
      padding: 0;

    }
    .div-60{
      width: 100%;
    }
    .table-bordered{
      border-collapse:collapse;
      border:.5px solid black;
    }
    .pull-right{
      float: right;
    }
    .table-bordered >td{
      border:.5px solid black;
    }
    .font-weight-bold{
      font-weight: bolder;
    }

    .table-observaciones{
      border-bottom: .5px solid black;
    }
    .marginx-4{
      margin-left: 20px;
    }
  </style>
  
  <body>
    <div class="row" style="margin-bottom:0;">
      <div class="column">
        <table class="table">
          <tr>
            <td class="text-center"><h3 class="h5 align-center">Reporte de Actividades</h3></td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row mt-1">
    <div class="card card-bordered">
        <div class="row justify-content-center">
            <div class="card-inner card-inner-lg ">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h2 class="text-center">Competencia #<?php echo $numero; ?></h2><!--el numero representa al id, controlador-->
                            <div class="text-center">
                                <p>Estadística de las preguntas de la competencia # <?php echo $numero; ?></p>
                            </div>
                        </div>
                        <div class="nk-block-head-content align-self-start d-lg-none">
                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="div-80 row marginx-4">
                    <div class="column">
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
                                        <tr class="table-bordered">
                                            <td class=""><?php echo $p->codigo; ?></td>
                                            <td class=""><?php echo $p->pregunta; ?></td>
                                            <td class="">
                                                <?php $letter = str_split($p->codigo); ?>
                                                <?php if ($letter[0] == 'P') : ?>
                                                    <ul>
                                                        <?php foreach ($niveles as $n) : ?>
                                                            <?php if ($n->nombre != 'Validacion') : ?>
                                                                <li style="list-style: none;">
                                                                    <?php echo $n->valor.'  - '; ?>
                                                                    <?php $count = 0;
                                                                    foreach ($respuestas as $r) : ?>
                                                                        <?php if ($r->nivel_id == $n->id && $p->id == $r->pregunta_id) : ?>
                                                                            <?php $count++; ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach;
                                                                    echo  $count; ?>

                                                                </li>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php else : ?>
                                                    <ul>
                                                        <?php foreach ($niveles as $n) : ?>
                                                            <?php if ($n->nombre == 'Validacion') : ?>
                                                                <li style="list-style:none">
                                                                    <?php echo $n->valor.' - '; ?>
                                                                    <?php $count = 0;
                                                                    foreach ($respuestas as $r) : ?>
                                                                        <?php if ($r->nivel_id == $n->id && $p->id == $r->pregunta_id) : ?>
                                                                            <?php $count++; ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach;
                                                                    echo  $count; ?>

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
                                <span class="">N-1:No se como hacerlo. </span> |
                                <span class="">N-2:Puedo hacerlo con ayuda.</span> |
                                <span class="">N-3:Puedo hacerlo por mi cuenta.</span> |
                                <span class="">N-4:Puedo hacerlo, y ayudo a otros.</span>
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
    
   
    

  </body>
</html>
