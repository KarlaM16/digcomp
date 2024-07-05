<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reporte de preguntas por empleado</title>
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
  </style>
  
  <body>
    <div class="row" style="margin-bottom:0;">
      <div class="column">
        <table class="table">
          <tr>
            <td class="text-center"><h5 class="h5 align-center">Reporte de Preguntas de  <?=$empleado->global_id;?></h5></td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row mt-1">
      <div class="column">
        <div class="">
                    <div class="">
                        <?php $count=1; foreach ($niveles as $n) : ?>
                            <?php  if ($n->nombre != 'Validacion') : ?>
                                <div class="col-6"><?php echo $count.' ';?><span class="" style="background-color:blue"></span><small><?php echo $n->nombre; ?></small></div>
                            <?php endif; ?>
                        <?php $count++; endforeach; ?>
                    </div>
                    <div class="r">
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
      
    </div>
    
   
    

  </body>
</html>
