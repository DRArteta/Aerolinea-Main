
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Foro</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/4a8e5f3b5a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/statics/css/navbar.css">
    </head>

    <body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item active">
                  <!--#--------------------------------------------------------------------------------->
                  <!--Se coloco un form en cada boton para redireccionarlo a URLS difererentes-->
                  <form  action="/homeUsuarioLogueado" method="post">
                    @csrf
                    <!--#--------------------------------------------------------------------------------->
                    <!--Se debe volver a enviar la veriable que se recibio de usuario para poder mandarla a las otras paginas-->
                    <?php
                    echo "<input id='nombre' name='nombre' type='hidden' value=$usuarioLogueado>";
                     ?>
                    <!--#--------------------------------------------------------------------------------->
                  <button class="btn btn-link" name='submit' value='Aerolinea'>Aerolinea</button>
                  </form>
                  <!--#--------------------------------------------------------------------------------->
                </li>
                <li class="nav-item active">
                  <form  action="/home/buscar" method="post">
                    @csrf
                    <?php
                    echo "<input id='nombre' name='nombre' type='hidden' value=$usuarioLogueado>";
                     ?>
                  <button   class="btn btn-link" name='submit' value='Buscar_Vuelos'>Buscar Vuelos</button>
                  <!--<a class='nav-link' href='/home/$usuarioLogueado/buscar'>Buscar Vuelos <span class='sr-only'>(current)</span></a>-->
                  </form>
                </li>
                <li class="nav-item active">
                  <form  action="/noticias" method="post">
                    @csrf
                    <?php
                    echo "<input id='nombre' name='nombre' type='hidden' value=$usuarioLogueado>";
                     ?>
                  <button  class="btn btn-link" name='submit' value='Noticias'>Noticias</button>
                  <!--<a class='nav-link' href='/home/$usuarioLogueado'>Noticias <span class='sr-only'>(current)</span></a>-->
                  </form>
                </li>
                <li class="nav-item active">
                  <form  action="/checkIn" method="post">
                    @csrf
                    <?php
                    echo "<input id='nombre' name='nombre' type='hidden' value=$usuarioLogueado>";
                     ?>
                  <button  class="btn btn-link" name='submit' value='Check_In'>Check-In</button>
                <!--<a class='nav-link' href='/home/$usuarioLogueado'>Check-In <span class='sr-only'>(current)</span></a>-->
                </form>
                </li>
                <li class="nav-item active">
                  <form  action="/misViajes" method="post">
                    @csrf
                    <?php
                    echo "<input id='nombre' name='nombre' type='hidden' value=$usuarioLogueado>";
                     ?>
                  <button  class="btn btn-link" name='submit' value='Mis_Viajes'>Mis Viajes</button>
                <!--  <a class='nav-link' href='/home/$usuarioLogueado'>Mis Viajes <span class='sr-only'>(current)</span></a>-->
                </form>
                </li>
                <li class="nav-item active">
                  <form  action="/home/chat" method="post">
                    @csrf
                    <?php
                    echo "<input id='nombre' name='nombre' type='hidden' value=$usuarioLogueado>";
                     ?>
                  <button  class="btn btn-link" name='submit' value='Chat'>Chat</button>
                <!--  <a class='nav-link' href='/home/$usuarioLogueado'>Chat <span class='sr-only'>(current)</span></a>-->
                </form>
                </li>
                <li class="nav-item active">
                  <form  action="/tarjetas" method="post">
                    @csrf
                    <?php
                    echo "<input id='nombre' name='nombre' type='hidden' value=$usuarioLogueado>";
                     ?>
                  <button  class="btn btn-link" name='submit' value='Tarjeta'>Tarjeta</button>
                <!--  <a class='nav-link' href='/home/$usuarioLogueado'>Chat <span class='sr-only'>(current)</span></a>-->
                </form>
                </li>
            </ul>
            <form  action="/pagarCarrito" method="post">
              @csrf
            <button class="btn btn-lg" name='submit' value='carritoDeCompra'><i class="fas fa-shopping-cart"></i></button>
            <?php
            echo "<input id='usuarioLogueado' name='usuarioLogueado' type='hidden' value=$usuarioLogueado>";
             ?>
            <!--<a href='/pagarCarrito' class='iconCart'><i class='fas fa-cart-plus fa-2x'></i></a>-->
            </form>
            <form  action="/" method="post">
              @csrf
            <button  class="btn btn-lg"  name='submit' value='salir'><i class="fas fa-times"></i></button>
            <!--<a href='/'><button type='button' class='close' aria-label='Close'><span aria-hidden='true'>&times;</span></button></a>-->
            </form>
            <span class="navbar-text">
                <?php echo $usuarioLogueado ?? ''?>
            </span>
            <form  action="/home/profile" method="post">
              @csrf
              <?php
              echo "<input id='usuarioLogueado' name='usuarioLogueado' type='hidden' value=$usuarioLogueado>";
               ?>
            <button  class="btn btn-lg"  name='submit' value='perfil' href><i class="fas fa-user"></i></button>
            <!--<a href="/home" class="iconUser"><i class="fas fa-user fa-2x"></i></a>-->
            </form>

        </div>
      </form>
    </nav>
    <!--JS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
