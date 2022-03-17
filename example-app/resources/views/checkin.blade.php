<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4a8e5f3b5a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/statics/css/checkin.css">
</head>
<!--parte en la que sube los datos-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  var usuarioLogueado='<?php echo $usuarioLogueado; ?>';
  var vuelo=<?php echo $vuelo; ?>;
  var tickete=<?php echo $tickete; ?>;
  var sillasReservadas=<?php echo json_encode($sillasReservadas); ?>;
</script>
<script src="/statics/javascript/cambioAsiento.js"></script>
<!--parte en la que sube los datos-->
<body>
  @include('navbarUser',['usuarioLogueado' => $usuarioLogueado])
    <!-- FORMULARIO -->
    <div class="titulo">
        <h1 class="titulo1"><b>Datos ticket</b></h1>
        <p class="text-center tnegro"><b>Recuerde hacer check in 24 antes de la salida del vuelo</b></p>
    </div>
    <form action="/cambiarSilla" method="POST">
      @csrf
      <?php
        echo "<input id='nombre' name='nombre' type='hidden' value=$usuarioLogueado>";
      ?>
      <div class="container" id='datos_tickete_usuario'>
          <!--
            <div class="row justify-content-center form-group xd">
                <div class="col-sm-4">
                    <label class="col-form-label tblanco" for="PrimerNombre"><b>Primer Nombre :</b></label>
                </div>
                <div class="col-sm-4">
                    <input class="form-control" id="PrimerNombre" type="text" name="nombre" required placeholder="primer nombre">
                </div>
            </div>
            <div class="row justify-content-center xd">
                <div class="col-sm-4">
                    <label class="col-form-label tblanco" for="PrimerApellido"><b> Primer Apellido :</b></label>
                </div>
                <div class="col-sm-4">
                    <input class="form-control" id="PrimerApellido" type="text" name="apellido" required placeholder="primer apellido">
                </div>
            </div>
            <div class="row justify-content-center xd">
                <div class="col-sm-4">
                    <label class="col-form-label tblanco" for="correo"><b>Email :</b></label>
                </div>
                <div class="col-sm-4">
                    <input class="form-control" id="correo" type="email" name="correo" required placeholder="correo">
                </div>
            </div>
            <div class="row justify-content-center xd">
                <div class="col-sm-4">
                    <label class="col-form-label tblanco" for="numReserva"><b>Numero de reserva :</b></label>
                </div>
                <div class="col-sm-4">
                    <input class="form-control" readonly="readonly" id="numReserva" type="numeric" name="reserva" value=>
                </div>
            </div>
            <div class="row justify-content-center csilla">
                <div class="col-auto">
                    <input class="" id="cambiarSila" type="checkbox" name="cambioSilla">
                </div>
                <div class="col-auto">
                    <label class="cambiarSilla" for="cambiarSilla"><b>Cambiar Silla</b></label>
                </div>
            </div>
          -->
        </div>
    <!-- AVION -->
    <div class="container fondoCielo">
        <div class="fondo">
            <div class="row justify-content-center csilla">
                <div class="col-auto">
                    <input type="radio" name="asiento" id="asiento" value="-1">
                    <label class="cambiarSilla" for="cambiarSilla"><b>No cambiar silla</b></label>
                </div>
            </div>
            <br>
            <div class="row justify-content-center text-center">
                <div class="h5">
                    <h5  class="silla"><b>Tipos de Sillas</b></h5>
                </div>
                <div class="col-6 col-md-3">
                    <p class="tnegro"><i class="primera fas fa-square"></i> <b>Primera Clase</b></p>
                </div>
                <div class="col-6 col-md-3">
                    <p class="tnegro"><i class="economica fas fa-square"></i> <b>Clase Economica</b></p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-2 col-lg-2">
                </div>
                <div class="col-8 col-lg-7">
                    <div><img src="/statics/img/punta1.png" class="img-fluid imgP" alt="puntaAvion"></div>
                </div>
                <div class="col-2  col-lg-3">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1">
                    <div class="img1">
                        <i class="fas fa-restroom"></i>
                    </div>
                </div>
                <div class="col-5">
                </div>
                <div class="col-1">
                    <div class="img2">
                        <i class="fas fa-gas-pump"></i>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1">
                    <div class="letra1">
                        <p><b>A</b></p>
                    </div>
                </div>
                <div class="col-1">
                    <div class="letra1">
                        <p><b>B</b></p>
                    </div>
                </div>
                <div class="col-1">
                    <div class="letra1">
                        <p><b>C</b></p>
                    </div>
                </div>
                <div class="col-1">
                </div>
                <div class="col-1">
                    <div class="letra2">
                        <p><b>D</b></p>
                    </div>
                </div>
                <div class="col-1">
                    <div class="letra2">
                        <p><b>E</b></p>
                    </div>
                </div>
                <div class="col-1">
                    <div class="letra2">
                        <p><b>F</b></p>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>
            <!--Sillas del 1 al 25 (Primera clase)-->
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="radio" name="asiento" id="asientoA1" autocomplete="off" value="1">
                        <label class="xd btn btn-primary" for="asientoA1">1</label>
                    </div>
                </div>
                <div class="col-2">
                </div>
                <div class="col-1 col-sm-2">
                    <div class="num1">
                        <p> 01</p>
                    </div>
                </div>
                <div class="col-6">
                </div>
            </div>
            <div id='silla_primeraClase'>
              <!--
            <div class="row" >

                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA2" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoA2"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB2" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoB2"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC2" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoC2"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1">
                    <div class="num">
                        <p> 02</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD2" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoD2"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE2" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoE2"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF2" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoF2"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>

            </div>
              -->
          </div>
            <!--
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA3" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoA3"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB3" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoB3"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC3" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoC3"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>03</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD3" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoD3"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE3" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoE3"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF3" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoF3"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA4" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoA4"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB4" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoB4"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC4" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoC4"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>04</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD4" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoD4"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE4" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoE4"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF4" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoF4"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA5" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoA5"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB5" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoB5"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC5" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoC5"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>05</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD5" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoD5"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE5" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoE5"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF5" autocomplete="off">
                        <label class="xd btn btn-primary" for="asientoF5"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>
          -->
            <!--AcaSillas del 1 al 25 (Primera clase)-->
            <div id='silla_turista'>
              <!--
              <div class="row">
                  <div class="col-2">
                  </div>
                  <div class="col-1 mgin">
                      <div class="">
                          <input type="checkbox" class="btn-check" id="asientoA6" autocomplete="off">
                          <label class="xd btn btn-success" for="asientoA6"><i class="fas fa-user"></i></label>
                      </div>
                  </div>
                  <div class="col-1 mgin">
                      <div class="">
                          <input type="checkbox" class="btn-check" id="asientoB6" autocomplete="off">
                          <label class="xd btn btn-success" for="asientoB6"><i class="fas fa-user"></i></label>
                      </div>
                  </div>
                  <div class="col-1 mgin">
                      <div class="">
                          <input type="checkbox" class="btn-check" id="asientoC6" autocomplete="off">
                          <label class="xd btn btn-success" for="asientoC6"><i class="fas fa-user"></i></label>
                      </div>
                  </div>
                  <div class="col-1 mm">
                      <div class="num">
                          <p>06</p>
                      </div>
                  </div>
                  <div class="col-1 mgin">
                      <div class="">
                          <input type="checkbox" class="btn-check" id="asientoD6" autocomplete="off">
                          <label class="xd btn btn-success" for="asientoD6"><i class="fas fa-user"></i></label>
                      </div>
                  </div>
                  <div class="col-1 mgin">
                      <div class="">
                          <input type="checkbox" class="btn-check" id="asientoE6" autocomplete="off">
                          <label class="xd btn btn-success" for="asientoE6"><i class="fas fa-user"></i></label>
                      </div>
                  </div>
                  <div class="col-1 mgin">
                      <div class="">
                          <input type="checkbox" class="btn-check" id="asientoF6" autocomplete="off">
                          <label class="xd btn btn-success" for="asientoF6"><i class="fas fa-user"></i></label>
                      </div>
                  </div>
                  <div class="col-3">
                  </div>
              </div>
            -->
            </div>
            <!--
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA7" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA7"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB7" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB7"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC7" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC7"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>07</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD7" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD7"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE7" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE7"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF7" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF7"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>
          -->
          <!--
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA8" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA8"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB8" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB8"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC8" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC8"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>08</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD8" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD8"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE8" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE8"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF8" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF8"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>
          -->
          <!--
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA9" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA9"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB9" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB9"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC9" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC9"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>09</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD9" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD9"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE9" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE9"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF9" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF9"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA10" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA10"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB10" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB10"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC10" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC10"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1">
                    <div class="num">
                        <p> 10</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD10" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD10"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE10" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE10"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF10" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF10"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA11" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA11"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB11" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB11"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC11" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC11"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>11</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD11" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD11"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE11" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE11"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF11" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF11"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA12" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA12"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB12" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB12"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC12" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC12"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>12</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD12" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD12"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE12" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE12"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF12" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF12"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA13" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA13"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB13" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB13"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC13" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC13"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>13</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD13" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD13"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE13" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE13"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF13" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF13"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA14" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA14"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB14" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB14"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC14" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC14"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>14</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD14" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD14"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE14" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE14"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF14" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF14"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA15" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA15"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB15" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB15"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC15" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC15"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>15</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD15" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD15"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE15" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE15"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF15" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF15"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA16" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA16"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB16" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB16"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC16" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC16"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>16</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD16" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD16"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE16" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE16"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF16" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF16"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA17" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA17"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB17" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB17"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC17" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC17"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>17</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD7" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD17"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE17" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE17"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF17" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF17"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA18" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA18"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB18" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB18"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC18" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC18"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>18</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD18" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD18"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE18" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE18"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF18" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF18"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA19" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA19"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB19" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB19"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC19" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC19"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>19</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD19" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD19"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE19" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE19"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF19" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF19"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA20" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA20"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB20" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB20"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC20" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC20"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>20</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD20" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD20"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE20" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE20"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF20" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF20"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA21" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA21"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB21" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB21"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC21" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC21"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>21</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD21" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD21"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE21" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE21"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF21" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF21"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA22" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA22"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB22" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB22"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC22" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC22"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>22</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD22" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD22"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE22" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE22"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF22" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF22"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA23" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA23"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB23" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB23"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC23" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC23"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>23</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD23" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD23"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE23" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE23"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF23" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF23"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA24" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA24"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB24" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB24"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC24" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC24"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>24</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD24" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD24"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE24" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE24"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF24" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF24"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA25" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA25"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB25" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB25"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC25" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC25"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>25</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoD25" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoD25"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE25" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE25"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF25" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF25"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoA26" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoA26"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoB26" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoB26"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoC26" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoC26"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mm">
                    <div class="num">
                        <p>26</p>
                    </div>
                </div>
                <div class="col-1 mgin">
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoE26" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoE26"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-1 mgin">
                    <div class="">
                        <input type="checkbox" class="btn-check" id="asientoF26" autocomplete="off">
                        <label class="xd btn btn-success" for="asientoF26"><i class="fas fa-user"></i></label>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>
          -->
            <br>
            <br>
            <div class="row justify-content-center text-center">
                <div class="col-6 col-md-3">
                    <button  type="submit" class="btn btn-primary" name="submit" value="aceptar">Aceptar</button>
                </div>
                <div class="col-6 col-md-3">
                    <button  type="submit" class="btn btn-primary" name="submit" value="cancelar">Cancelar</button>
                </div>
            </div>
            <br>
            <br>
          </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
