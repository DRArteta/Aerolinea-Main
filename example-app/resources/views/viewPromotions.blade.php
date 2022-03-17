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
    var usuarioLogueado='<?php echo $usuarioLogueado; ?>';
    var vuelos=<?php echo $vuelos; ?>;
    </script>
    <script src="/statics/javascript/promociones.js"></script>
    <!--parte en la que sube los datos-->
    <body>
    <hr />
    <div class="container">
        <h3>Promociones  <i class="fas fa-plane-departure"></i></h3>
        <div class="row promotion text-center" id="info_vuelo">
            <!--se llena con el js promociones-->
        </div>
        <!-- primer intento de hacer que el maldito boton llevara a comprar tickete >:v
        <div class="row promotion text-center">
            <div class="col-4">
                <div class="row">
                    <p>SALE DE <b class="detinyCity">BOGOTÁ </b><i class="fas fa-globe-americas"></i></p>
                </div>
                <div class="row">
                    <p>LLEGA A <b class="arriveCity">PEREIRA </b><i class="fas fa-globe-americas"></i></p>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <p>FECHA DE SALIDA</p>
                </div>
                <div class="row">
                    <b class="date">22/05/2020 <i class="fas fa-calendar-day"></i></b>
                </div>
                <div class="row buyButton">
                <button  type='submit'class='btn btn-success' name='submit' value='comprar'><i class='fas fa-shopping-basket'></i>COMPRAR</button>".
                </div>
            </div>
            <div class="col-4">
                <p>ANTES: <b class="beforePrice">222.500 </b><i class="fas fa-dollar-sign"></i></p>
                <p>AHORA: <b class="newPrice">200.500 </b><i class="fas fa-dollar-sign"></i></p>
            </div>
        </div>
      -->
    </div>
    <!--JS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
