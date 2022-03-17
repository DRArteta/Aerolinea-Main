<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tarjeta y Saldo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/4a8e5f3b5a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/statics/css/pagarCarritoCompras.css">
    </head>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    var usuarioLogueado='<?php echo $usuarioLogueado; ?>';
    var vuelos=<?php echo json_encode($vuelos); ?>;
    </script>
    <script src="/statics/javascript/checkIn.js"></script>
    <!--parte en la que sube los datos-->
    <body>
    @include('navbarUser',['usuarioLogueado' => $usuarioLogueado])
    <hr>

    <div class="col-12">
        <p><b>Check In</b> <i class="fas fa-coins"></i></p>
    </div>
    <hr>
<!-- parte ana-->
        <hr>
        <div class="container">
            <!-- Primera Fila-->
            <div class="row">
                <p><b>Mis ticketes</b></p>
            </div>
            <form action="/checkIn" method="POST">
              @csrf
              <!--Se debe volver a enviar la veriable que se recibio de usuario para poder mandarla a las otras paginas-->
              <?php
                echo "<input id='usuarioLogueado' name='usuarioLogueado' type='hidden' value=$usuarioLogueado>";
              ?>
              <div class="container" id="info_checkin">

              </div>
            </form>
    </div>

    <!--JS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
