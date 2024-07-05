<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Reporte de competencias por empleado</title>
</head>
<style media="screen">
  @page {
    margin: 1px 1px 1px 1px !important;
    padding: 1px 1px 1px 1px !important;
  }

  body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    font-size: 9pt;
  }

  .bold {
    font-weight: bold;
  }

  .row {
    display: table;
    width: 100%;
    table-layout: fixed;
    border-spacing: 10px;
  }

  .column {
    display: table-cell;
  }

  .table {
    width: 100%;
  }

  .table-bordered {
    border-collapse: collapse;
    margin: 0 auto;
    border: .5px solid black;

  }

  .border {
    border-radius: 5px;
    border-color: black;
    border-style: solid;
    border-width: 1;
  }

  .text-center {
    text-align: center;
  }

  .h5 {
    font-size: 12pt;
    font-weight: bolder;
    font-family: sans-serif;
  }

  .align-center {
    align-items: center;
  }

  .center-object {
    margin: 0 auto;
  }

  .div-80 {
    width: 80%;
  }

  .p {
    margin: 0;
    padding: 0;
  }

  .mt-0 {
    margin-top: -10px;
  }

  .mt-1 {
    margin-top: -15px;
  }

  .td {
    margin-right: 10px;
    margin-left: 10px;
  }

  .border {
    border: 1px solid black;
    border-spacing: 0;
    margin: 0;
    padding: 0;

  }

  .div-60 {
    width: 100%;
  }

  .table-bordered {
    border-collapse: collapse;
    border: .5px solid black;
  }

  .pull-right {
    float: right;
  }

  .table-bordered>td {
    border: .5px solid black;
  }

  .font-weight-bold {
    font-weight: bolder;
  }

  .table-observaciones {
    border-bottom: .5px solid black;
  }
</style>

<body>
  <div class="row" style="margin-bottom:0;">
    <div class="column">
      <table class="table">
        <tr>
          <td class="text-center">
            <h5 class="h5 align-center">Reporte de Actividades</h5>
          </td>
        </tr>
      </table>

    </div>
  </div>
  <div class="row">
    <div class="column">
      <div class="row">
        <h5 class="h5 text-center">Evaluación por competencia de <?= $empleado->global_id; ?>.</h5>
      </div>

    </div>
  </div>

  </div>
  <div class="row bolder">
    <div class="column"><span>Nombre</span></div>
    <div class="column"><span>Nivel</span></div>
    <div class="column"><span>% </span></div>
  </div><!-- .nk-tb-head -->

  <div class="row border">
    <?php foreach ($competencias as $c) : ?>
      <div class="row">
        <div class="column">
          <?php echo $c->competencia_nombre; ?>
        </div>
        <div class="column">
          <?php echo $c->total_nivel; ?>
        </div>
        <div class="column">
          <?php echo $c->total_ponderado; ?>%
        </div>

      </div><!-- .nk-tb-item -->
    <?php endforeach; ?>


  </div><!-- .nk-tb-list -->




</body>

</html>