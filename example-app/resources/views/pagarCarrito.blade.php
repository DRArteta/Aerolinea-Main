<!DOCTYPE html>
<html lang="en" >

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagar Carrito Compras</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/4a8e5f3b5a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/statics/css/pagarCarritoCompras.css">
    </head >
    <!--parte en la que sube los datos-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    var vuelos=<?php echo json_encode($vuelos); ?>;
    var usuario='<?php echo $usuario; ?>';
    </script>
    <script src="/statics/javascript/pagarCarrito.js" ></script>
    <!--parte en la que sube los datos-->
    <body>
    @include('navbarUser',['usuarioLogueado' => $usuario])
        <hr>
        <br>
        <h3> Carrito de Compras  <i class="fas fa-plane-departure"></i></h3>
        <div class="container" id="info_ticketes">
            <br><br>
        </div>
          <form  action="/pagarCarrito" class="col-md-5 col-md-4" method="POST" >
            @csrf
            <p>Valor carrito:</p>
            <?php
            echo "<input id='usuarioLogueado' name='usuarioLogueado' type='hidden' value=$usuario>";
             ?>
            <input name="valor_carrito" id="valor_carrito" value="0" readonly="readonly">
            <button  type='submit' class='btn btn-danger btn-lg' name='submit' value='pagar' >Pagar</button>
          </form>
    <!--JS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
