<?php session_start(); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Resultado - Calculo IMIV</title>
    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Calculo IMIV - Casas - Resultado</h2>
    </div>

<div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        FLUJOS DE ENTRADA
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">

      <ul>
    <?php foreach ($_SESSION['superficies'] as $key => $value) { ?> 
        
          <li>  <?php  echo $_SESSION['cantidades'][$key]; ?> 
                Construcciones de <?php  echo $value; ?> MT<sup>2</sup></li> 
            <?php } ?> </ul>
    <div class="row g-5">

        <table class="table table-hover table-sm">
          <thead>
            <tr> 
              <th scope="col">Periodos</th>
              <th scope="col">Totales </th>
              <th scope="col">Autos </th>
              <th scope="col">T. Publico </th>
              <th scope="col">Peatones </th>
              <th scope="col">Ciclos </th>
            </tr>
          </thead>
          <tbody>
            <?php
             $periodos = array("PM-L", "PMd-L", "PT-L", "PMd-F","PT-F"); 
             foreach ($_SESSION['resultado_entradas'] as $key => $value) { 
            ?>
            <tr>
              <td><?php  echo $periodos[$key]; ?></td>
              <td><?php  echo $value["viajes_h_por_vivienda"];  ?></td>
              <td><?php  echo $value["transporte_privado"];         ?></td>
              <td><?php  echo $value["transporte_publico"];         ?></td>
              <td><?php  echo $value["peatones_viajes"];         ?></td>
              <td><?php  echo $value["ciclos_viajes"];         ?></td>
            </tr>
            <?php
             }
            ?>
            
          </tbody>
        </table>
    </div>

      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
      FLUJOS DE SALIDA
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      <ul>
    <?php foreach ($_SESSION['superficies'] as $key => $value) { ?> 
        
          <li>  <?php  echo $_SESSION['cantidades'][$key]; ?> 
          Construcciones de <?php  echo $value; ?> MT<sup>2</sup></li> 
            <?php } ?> </ul>
    <div class="row g-5">

        <table class="table table-hover table-sm">
          <thead>
            <tr> 
              <th scope="col">Periodos</th>
              <th scope="col">Totales </th>
              <th scope="col">Autos </th>
              <th scope="col">T. Publico </th>
              <th scope="col">Peatones </th>
              <th scope="col">Ciclos </th>
            </tr>
          </thead>
          <tbody>
            <?php
             $periodos = array("PM-L", "PMd-L", "PT-L", "PMd-F","PT-F"); 
             foreach ($_SESSION['resultado_salidas'] as $key => $value) { 
            ?>
            <tr>
              <td><?php  echo $periodos[$key]; ?></td>
              <td><?php  echo $value["viajes_h_por_vivienda"];  ?></td>
              <td><?php  echo $value["transporte_privado"];         ?></td>
              <td><?php  echo $value["transporte_publico"];         ?></td>
              <td><?php  echo $value["peatones_viajes"];         ?></td>
              <td><?php  echo $value["ciclos_viajes"];         ?></td>
            </tr>
            <?php
             }
            ?>
            
          </tbody>
        </table>
    </div>


      </div>
    </div>
  </div>
</div>

    
    <br>         
    <strong>SUMATORIA ENTRADAS Y SALIDAS (TOTAL)</strong> 
    <ul>
    <?php foreach ($_SESSION['superficies'] as $key => $value) { ?> 
        
          <li>  <?php  echo $_SESSION['cantidades'][$key]; ?> 
          Construcciones de <?php  echo $value; ?> MT<sup>2</sup></li> 
            <?php } ?> </ul>
    <div class="row g-5">

        <table class="table table-hover table-sm">
          <thead>
            <tr> 
              <th scope="col">Periodos</th>
              <th scope="col">Totales </th>
              <th scope="col">Autos </th>
              <th scope="col">T. Publico </th>
              <th scope="col">Peatones </th>
              <th scope="col">Ciclos </th>
            </tr>
          </thead>
          <tbody>
            <?php
             $periodos = array("PM-L", "PMd-L", "PT-L", "PMd-F","PT-F"); 
             foreach ($_SESSION['sumatoria'] as $key => $value) { 
            ?>
            <tr>
              <td><?php  echo $periodos[$key]; ?></td>
              <td><?php  echo $value["viajes_h_por_vivienda"];  ?></td>
              <td><?php  echo $value["transporte_privado"];         ?></td>
              <td><?php  echo $value["transporte_publico"];         ?></td>
              <td><?php  echo $value["peatones_viajes"];         ?></td>
              <td><?php  echo $value["ciclos_viajes"];         ?></td>
            </tr>
            <?php
             }
            ?>
            
          </tbody>
        </table>

          <a href="../index.php" class="w-20 btn btn-secondary btn-lg" >Volver</a>
    </div>


  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2021 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
      <script src="app.js"></script>
      <script crossorigin src="https://unpkg.com/react@17/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.production.min.js"></script>
  </body>
</html>
<?php
session_destroy();
?>