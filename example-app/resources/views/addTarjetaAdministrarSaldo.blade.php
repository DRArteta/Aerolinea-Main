<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tarjeta y Saldo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/4a8e5f3b5a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/statics/css/addTarjetaAdministrarSaldo.css">
    </head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    var usuarioLogueado='<?php echo $usuarioLogueado; ?>';
    var tarjetas=<?php echo json_encode($tarjetas); ?>;
    var valor_carrito=<?php echo $valor_carrito; ?>;
    </script>
    <script src="/statics/javascript/tarjetas.js"></script>
    <!--parte en la que sube los datos-->
    <body>
    @include('navbarUser',['usuarioLogueado' => $usuarioLogueado])
    <hr>

    <div class="col-12">
        <p><b>Financiero</b> <i class="fas fa-coins"></i></p>
    </div>
    <hr>
<!-- parte ana-->
        <hr>
        <div class="container">
            <!-- Primera Fila-->
            <div class="row">
                <p><b>Mis Tarjetas de Débito</b></p>
            </div>
            <form action="/eliminarTarjeta" method="POST">
              @csrf
              <!--Se debe volver a enviar la veriable que se recibio de usuario para poder mandarla a las otras paginas-->
              <?php
                echo "<input id='usuarioLogueado' name='usuarioLogueado' type='hidden' value=$usuarioLogueado>";
              ?>
              <div class="row primeraFila justify-content-center" id="info_tarjetas_primeraFila">
              </div>
            </form>
            <form action="/pagoRealizado" method="POST">
              @csrf
              <?php
                echo "<input id='nombre' name='nombre' type='hidden' value=$usuarioLogueado>";
              ?>
              <div class="row segundaFila justify-content-center" id="info_tarjetas_segundaFila">
              </div>
            </form>

            <br>
<!-- parte mora-->
        <!--Segunda Fila-->
        <!--
        <div class="row segundaFila justify-content-center">
            <div class="row">
                <p><b>Mis Tarjetas de Débito</b></p>
            </div>
            <div class="row justify-content-sm-center">
                <div class="col-md-3 col-sm-8">
                    <div class="row text-center">
                        <p class="seccionTitulo">MASTERCARD 1254</p>
                    </div>
                    <div class="row text-center">
                        <span class="fas fa-credit-card fa-7x"></span>
                    </div>
                    <div class="row basura">
                        <button type="button" class="btn btn-outline-danger"><span class="fas fa-trash-alt"></span></button>
                    </div>
                </div>
                <div class="col-md-3 col-sm-8">
                    <div class="row text-center">
                        <p class="seccionTitulo">MASTERCARD 5401</p>
                    </div>
                    <div class="row text-center">
                        <span class="fas fa-credit-card fa-7x"></span>
                    </div>
                    <div class="row basura">
                        <button type="button" class="btn btn-outline-danger">
                            <sapn class="fas fa-trash-alt"></span>
                        </button>
                    </div>
                </div>
                <div class="col-md-3 col-sm-8">
                    <div class="row text-center">
                        <p></p>
                    </div>
                    <div class="row text-center">
                    -->
                        <!--<span class="fas fa-credit-card fa7x"></span>-->
                    <!--
                    </div>
                    <div class="row basura">
                    -->
                        <!--<button type="button" class="btn btn-outline-danger"><span class="fas fa-trash-alt"></span></button>-->
                  <!--
                    </div>
                </div>
                <div class="col-md-3 col-sm-8">
                    <div class="row text-center">
                        <p class="text-center seccionBotones"> <button type="button" class="btn btn-outline-primary btn-block" data-bs-toggle="modal" data-bs-target="#exampleModalTwo"><span class="fas fa-credit-card"></span> Añadir Tarjeta</button></p>
                    </div>
                    <div class="row">
                        <p class="text-center"><button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#pagar">Pagar</button></p>
                    </div>
                </div>
            </div>
        </div>
      -->
        <!-- Tercera Fila-->
        <!--
        <div class="row terceraFila justify-content-center">
            <div class="row">
                <p><b>Mi Saldo</b></p>
            </div>
            <div class="row justify-content-sm-center">
                <div class="col-md-9 text-center">
                    <p class="justify-content-center"><b class="wallet">540.058 COP</b> <i class="fas fa-coins fa-5x"></i></p>
                </div>
                <div class="col-md-3 col-sm-8">
                    <div class="row text-center">
                        <p class="text-center seccionBotones"> <button type="button" class="btn btn-outline-primary btn-block" data-bs-toggle="modal" data-bs-target="#modalExample"><span class="fas fa-hand-holding-usd"></span> Añadir Saldo</button></p>
                    </div>
                    <div class="row">
                        <p class="text-center"><button type="button" class="btn btn-primary btn-block">Pagar</button></p>
                    </div>
                </div>
            </div>
        </div>
        <br>
      -->
    </div>
    <!-- Button trigger modal -->

    <!-- Modal -->

    <div class="modal fade" id="exampleModalTwo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Selecciona tu tarjeta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/tarjetas/addtarjeta" class="col-12" method="POST">
                        @csrf
                        <!--Se debe volver a enviar la veriable que se recibio de usuario para poder mandarla a las otras paginas-->
                        <?php
                        echo "<input id='nombre' name='nombre' type='hidden' value=$usuarioLogueado>";
                         ?>
                        <div class="row">
                            <div class="form-group col-6" id="typeCard-group">
                                <label for="" class="label">Tipo de Saldo</label>
                                <select name="cardType" class="form-select" aria-label="Default select example">
                                    <option value="1">Débito</option>
                                  <!--  <option value="2">Crédito</option> -->
                                </select>
                            </div>
                            <div class="form-group col-6" id="number-group">
                                <label for="" class="label">Número de Tarjeta</label>
                                <input min="1" name="numberCard" id="numberCard" type="number" class="form-control" placeholder="Número de Tarjeta">

                            </div>
                            <div class="form-group col-6" id="bank-group">
                                <label for="" class="label">Banco</label>
                                <input name="bank" id="bank" type="text" class="form-control" placeholder="Seleccione su banco">

                            </div>

                            <div class="form-group col-6" id="amount-group">
                                <label for="" class="label">Saldo</label>
                                <input min="1" name="amount" id="amount" type="number" class="form-control" placeholder="Ingresa el saldo">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button name='submit' value='create' class="btn btn-primary">Añadir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
     <!-- Modal -->
    <div class="modal fade" id="modalExample" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Selecciona tu Saldo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/anadirSaldo"  class="col-12" method="POST">
                        @csrf
                        <!--Se debe volver a enviar la veriable que se recibio de usuario para poder mandarla a las otras paginas-->
                        <?php
                        echo "<input id='nombre' name='nombre' type='hidden' value=$usuarioLogueado>";
                         ?>
                        <div class="row">
                            <div class="form-group col-6" id="number-group">
                                <label for="" class="label">Saldo</label>
                                <input min="1" name="amount" id="amount" type="number" class="form-control" placeholder="Selecciona tu Saldo">

                            </div>
                            <!--
                            <div class="form-group col-6" id="bank-group">
                                <label for="" class="label">Banco</label>
                                <input name="bank" id="bank" type="text" class="form-control" placeholder="Seleccione su banco">

                            </div>
                          -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button  name='submit' value='anadir' class="btn btn-primary">Añadir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="pagar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Selecciona la Tarjeta para Pagar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/pagoRealizado" class="col-12" method="POST">
                        @csrf
                        <!--Se debe volver a enviar la veriable que se recibio de usuario para poder mandarla a las otras paginas-->
                        <?php
                        echo "<input id='nombre' name='nombre' type='hidden' value=$usuarioLogueado>";
                         ?>
                        <div class="row">
                        <div class="form-group col-6" id="typeCard-group">
                                <label for="" class="label">Tipo de Saldo</label>
                                <select name="cardType" class="form-select" aria-label="Default select example">
                                    <option value="1">Débito</option>
                                  <!--  <option value="2">Crédito</option>-->
                                </select>
                            </div>
                            <div class="form-group col-6" id="num_tarjeta">
                                <label for="" class="label">Num. Tarjeta</label>
                                <input name="numtarjeta" id="numtarjeta" type="text" class="form-control" placeholder="Digite los 4 últimos dígitos de su tarjeta">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button name='submit' value='tarjeta' class="btn btn-primary">Pagar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->



    <!--JS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
