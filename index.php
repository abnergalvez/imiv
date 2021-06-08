<?php
header('Access-Control-Allow-Origin: *');
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.82.0">
        <title>Calculo IMIV</title>
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>
    <body class="bg-light">
    
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Calculo IMIV</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                  Suspendisse accumsan nec nunc et semper. Maecenas pellentesque maximus dolor 
                  vitae posuere. Vivamus turpis lectus, molestie vel erat vitae, semper rutrum libero. 
                </p>
            </div>
            <div class="">
                <h6>Conceptos</h6>
                    PM-L = Punta Mañana Laboral <br>
                    PMd-L = Punta Medio dia Laboral <br>
                    PT-L = Punta Tarde Laboral <br>
                    PMd-F = Punta Medio Dia fin de semana <br>
                    PT-F = Punta Tarde fin de semana <br>
            </div>

        <div class="row g-5">
            <div class="col-md-7 col-lg-12">
        <h4 class="mb-3"> Datos a ingresar</h4>
        <form class="needs-validation" action="calculos.php" method="post">
          <div class="row g-3">
                <div class="col-md-4">
                    <label for="tipo" class="form-label"><strong>Tipo Proyecto</strong></label>
                    <select class="form-select" id="tipo" name="tipo" required>
                        <option value="">Escoja una opcion...</option>
                        <option value="casas">Casas</option>
                        <option value="departamentos">Departamentos</option>
                        <option value="c_acogida">Casas de Acogida</option>
                        <option value="cientifico">Cientifico</option>
                        <option value="comercio">Comercial</option>
                        <option value="culto_y_cultura">Culto y Cultura</option>
                        <option value="deporte">Deporte</option>
                        <option value="educacion">Educacion</option>
                        <option value="esparcimiento">Esparcimiento</option>
                        <option value="hospedaje">Hospedaje</option>
                        <option value="infraestructura">Infraestructura</option>
                        <option value="salud">Salud</option>
                        <option value="servicios">Servicios</option>
                        <option value="social">Social</option>
                    </select>
                </div>
                <div id="sub_proyecto" class="col-md-6" style="display:none;">
                  <?php
                  include('formularios/subproyectos/comercio.php');
                  ?>
          
               </div>    
          </div>

          <div id="formulario" class="row">
          
          </div>

          <hr class="my-4">
          <button type="subit" class="w-100 btn btn-primary btn-lg" >Calcular</button>
        </form>
      </div>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
      <script src="app.js"></script>
    </body>
</html>
