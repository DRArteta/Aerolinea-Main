<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Administrador</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/4a8e5f3b5a.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/statics/css/adminHome.css" />
    </head>
<body>

    @include('navbarAdmin',['usuarioLogueado' => $usuarioLogueado])
    <!--#----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!--Se crea un form para poder mandar los datos necesarios... como por ejemplo nombre de usuario... sin utilizar la URL-->
    <form  action="/admin/crear" method="post">
      @csrf
      <!--Se debe volver a enviar la variable que se recibio de usuario para poder mandarla a las otras paginas-->
      <?php
      echo "<input id='nombre' name='nombre' type='hidden' value=$usuarioLogueado>";#a pesar de ser admin se siguue trabajando con una varible llamada usuarioLogueado
       ?>
      <div class='buttonCreate text-center'>
        <button  type='submit' class='btn btn-warning btn-lg' name='submit' value='Crear_Vuelo'>Crear Vuelo<i class='far fa-plus-square'></i></button>
      </div>
    </form>
    <!--#----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    @include('fligthsAdmin',['usuarioLogueado' => $usuarioLogueado,'vuelos' => $vuelos])    
</body>
</html>
