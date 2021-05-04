
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
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Calculo IMIV</h2>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse accumsan nec nunc et semper. Maecenas pellentesque maximus dolor vitae posuere. Vivamus turpis lectus, molestie vel erat vitae, semper rutrum libero. </p>
    </div>

    <div class="row g-5">
      <div class="col-md-7 col-lg-12">
        <h4 class="mb-3"> Resultados</h4>
        Segun: <br>
        <ul>
        <li>Tipo Contruccion/Vivienda: <strong><?php echo $_GET["tipo"]; ?></strong></li>
        <li>Superficie: <strong><?php echo $_GET["superficie"]; ?>M <sup>2  </sup> </strong> </li>
        <li>Cantidad: <strong><?php echo $_GET["cantidad"]; ?> </li>
      </ul>
        <hr>
        <h6>Transporte Privado Vehiculos/Hora</h6>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Viajes Generados Entrada (periodo1)</th>
              <th scope="col">Viajes Generados Salida (periodo1)</th>
              <th scope="col">Viajes Generados Entrada (periodo2)</th>
              <th scope="col">Viajes Generados Salida (periodo2)</th>
              <th scope="col">Viajes Generados n° (tipo) Entrada (periodo1)</th>
              <th scope="col">Viajes Generados n° (tipo) Salida (periodo1)</th>
              <th scope="col">Viajes Generados n° (tipo) Entrada (periodo2)</th>
              <th scope="col">Viajes Generados n° (tipo) Salida (periodo2)</th>
              <th scope="col">Vehiculos/Hora periodo1 Entrada</th>
              <th scope="col">Vehiculos/Hora periodo1 Salida</th>
              <th scope="col">Vehiculos/Hora periodo2 Entrada</th>
              <th scope="col">Vehiculos/Hora periodo2 Salida</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              
              <td>1</td>
              <td>0,3</td>
              <td>0,3</td>
              <td>0,3</td>
              <td>0,3</td>
              <td>0,3</td>
              <td>0,3</td>
              <td>0,3</td>
              <td>0,3</td>
              <td>0,3</td>
              <td>0,3</td>
            </tr>

          </tbody>
        </table>

        <h6>Transporte Publico Viajes/Hora</h6>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td colspan="2">Larry the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>

        <h6>Peatones Viajes/Hora</h6>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td colspan="2">Larry the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
          <a href="index.html" class="w-20 btn btn-secondary btn-lg" >Volver</a>
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

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
      <script src="app.js"></script>
      <script crossorigin src="https://unpkg.com/react@17/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.production.min.js"></script>
  </body>
</html>
