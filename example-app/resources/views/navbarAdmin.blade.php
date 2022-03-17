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

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item active">
                <!--#--------------------------------------------------------------------------------->
                <!--Se coloco un form en cada boton para redireccionarlo a URLS difererentes-->
                <form  action="/homeAdminLogueado" method="post">
                  @csrf
                  <!--#--------------------------------------------------------------------------------->
                  <!--Se debe volver a enviar la veriable que se recibio de usuario para poder mandarla a las otras paginas-->
                  <?php
                  echo "<input id='nombre' name='nombre' type='hidden' value=$usuarioLogueado>";#a pesar de ser admin se siguue trabajando con una varible llamada usuarioLogueado
                   ?>
                  <!--#--------------------------------------------------------------------------------->
                <button class="btn btn-link" name='submit' value='Aerolinea'>Principal</button>
                </form>
                <!--#--------------------------------------------------------------------------------->
                <!--POR SI SE NECESITA...SE DEJA ESTABLECIDO COMO ESTABA ANTES
                  <li class="nav-item active">
                      <a class="nav-link" href="/admin">Principal <span class="sr-only">(current)</span></a>
                  </li>
                -->
              </li>
              <li class="nav-item active">
                  <!--#--------------------------------------------------------------------------------->
                  <!--Se coloco un form en cada boton para redireccionarlo a URLS difererentes-->
                  <form  action="/admin/crear" method="post">
                    @csrf
                    <!--#--------------------------------------------------------------------------------->
                    <!--Se debe volver a enviar la veriable que se recibio de usuario para poder mandarla a las otras paginas-->
                    <?php
                    echo "<input id='nombre' name='nombre' type='hidden' value=$usuarioLogueado>";#a pesar de ser admin se siguue trabajando con una varible llamada usuarioLogueado
                     ?>
                    <!--#--------------------------------------------------------------------------------->
                  <button class="btn btn-link" name='submit' value='Crear_Vuelo'>Crear Vuelo</button>
                  </form>
                  <!--POR SI SE NECESITA...SE DEJA ESTABLECIDO COMO ESTABA ANTES
                    <a class="nav-link" href="/admin/crear">Crear Vuelo</a>
                  -->
              </li>
              <li class="nav-item active">
                  <!--#--------------------------------------------------------------------------------->
                  <!--Se coloco un form en cada boton para redireccionarlo a URLS difererentes-->
                  <form  action="/admin/chat" method="post">
                    @csrf
                    <!--#--------------------------------------------------------------------------------->
                    <!--Se debe volver a enviar la veriable que se recibio de usuario para poder mandarla a las otras paginas-->
                    <?php
                    echo "<input id='nombre' name='nombre' type='hidden' value=$usuarioLogueado>";#a pesar de ser admin se siguue trabajando con una varible llamada usuarioLogueado
                     ?>
                    <!--#--------------------------------------------------------------------------------->
                  <button class="btn btn-link" name='submit' value='Chat'>Chat</button>
                  </form>
                  <!--POR SI SE NECESITA...SE DEJA ESTABLECIDO COMO ESTABA ANTES
                    <a class="nav-link" href="">Chat</a>
                    -->
              </li>
            </ul>
            <?php
            echo "<a href='/'><button type='button' class='close' aria-label='Close'><span aria-hidden='true'>&times;</span></button></a>"
             ?>
            <span class="navbar-text">
                <?php echo $usuarioLogueado ?? ''?> (ADMIN)
            </span>
            @csrf
            <a href="/admin" class="iconUser"><i class="fas fa-user fa-2x"></i></a>

        </div>
    </nav>
    <!--JS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
