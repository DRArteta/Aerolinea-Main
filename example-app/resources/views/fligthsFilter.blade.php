<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Foro</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/4a8e5f3b5a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/statics/css/promotionsList.css" />
    </head>
    <!--parte en la que sube los datos-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    var usuarioLogueado='<?php echo $usuarioLogueado ?? ''; ?>';
    var Origen='<?php echo $Origen; ?>';
    var date='<?php echo $date; ?>';
    var Destino='<?php echo $Destino; ?>';
    var numer='<?php echo $numer; ?>';
    var vuelos=<?php echo $vuelos; ?>;
    </script>
    <script src="/statics/javascript/buscarVuelos.js"></script>
    <!--parte en la que sube los datos-->
    <body>
    <hr />
    <h3>Vuelos  <i class="fas fa-plane-departure"></i></h3>
    <div class="container">

        <div class="row promotion text-center" id="info_vuelo">
          <!-- se llena con el javascript buscarVuelos.js-->
        </div>



    </div>
    <!--JS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
