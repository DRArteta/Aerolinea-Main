<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carrito Compras</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/4a8e5f3b5a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/statics/css/addCarritoCompraA.css" /><!--esta generando problemas con el bootstrap-->
    </head>
    <!--parte en la que sube los datos-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    var lugar_de_salida='<?php echo $lugar_de_salida; ?>';
    var lugar_de_llegada='<?php echo $lugar_de_llegada; ?>';
    var fecha_de_salida='<?php echo $fecha_de_salida; ?>';
    var fecha_de_llegada='<?php echo $fecha_de_llegada; ?>';
    var hora_de_salida='<?php echo $hora_de_salida; ?>';
    var hora_de_llegada='<?php echo $hora_de_llegada; ?>';
    var precio='<?php echo $precio; ?>';
    var precioP='<?php echo $precioP; ?>';
    var promocion='<?php echo $promocion; ?>';
    </script>
    <script src="/statics/javascript/comprarticket.js"></script>
    <!--parte en la que sube los datos-->
    <script src="/statics/javascript/ValidaAnadirC.js"></script>
    <body>
    @include('navbarUser')
        <div class="container">
            <div>
                <h2 class="viajeros">¿Quiénes Viajan?</h2>
                <br>
            </div>
            <div class="row g-5 justify-content-center"> <!--REVISAR ESTA PARTE-->

                    <form class="col-md-5 col-md-4" method="POST" > <!--REVISAR ESTA PARTE-->

                      @csrf
                        <div class="row justify-content-center form-group" id="documento-group">
                            <div class="row  justify-content-center">
                                <label for="" class="label" > <i class="fas fa-address-card"></i> Documento</label>
                            </div>
                            <div class="col-md-4">
                                <select name="tipo_id" class="form-select" aria-label="Default select example">
                                    <option value="1">TI</option>
                                    <option value="2">CC</option>
                                    <option value="3">CE</option>
                                </select>
                            </div>
                            <div class="col-md-7">
                                <input name="document" id="document" type="numeric" class="form-control" placeholder="Numero Documento" required onfocusout="Validar()">
                            </div>
                        </div>

                        <div class="row justify-content-center form-group" id="name-group">
                            <div class="col-md-10">
                                <label for="" class="label"><i class="fas fa-user"></i> Nombre</label>
                                <input name="name" id="name" type="text" class="form-control" placeholder="Nombre Completo" required>
                            </div>
                        </div>

                        <div class="row justify-content-center form-group" id="lastname-group">
                            <div class="col-md-10">
                                <label for="" class="label"><i class="fas fa-user"></i> Apellido</label>
                                <input name="lastname" id="lastname" type="text" class="form-control" placeholder="Apellido Completo" required>
                            </div>
                        </div>

                        <div class=" row justify-content-center form-group" id="date-group">
                            <div class="col-md-10">
                                <label for="" class="label"><i class="fas fa-calendar-alt"></i> Fecha de Nacimiento</label>
                                <input name="date" id="date" type="date" class="form-control" placeholder="dd/mm/aa" required>
                            </div>
                        </div>

                        <div class="row justify-content-center form-group" id="gender-group">
                            <div class="col-md-10">
                                <label for="" class="label"><i class="fas fa-question-circle"></i> Genero</label>
                                <select name="genero" class="form-select" aria-label="Default select example">
                                    <option value="1">Hombre</option>
                                    <option value="2">Mujer</option>
                                    <option value="3">Otro</option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-center form-group" id="telefono-group">
                            <div class="col-md-10">
                                <label for="" class="label"><i class="fas fa-phone-alt"></i> Telefono</label>
                                <input name="tel" id="tel" type="number" class="form-control"  placeholder="Numero telefonico" required onfocusout="Validar()">
                            </div>
                        </div>

                        <div class="row justify-content-center form-group" id="email-group">
                            <div class="col-md-10">
                                <label for="" class="label"><i class="fas fa-envelope"></i> Correo Electronico</label>
                                <input name="correo" id="correo" type="email" class="form-control" placeholder="Correo Electronico" required>
                            </div>
                        </div>

                        <div class="row justify-content-center form-group" id="nameC-group">
                            <div class="col-md-10">
                                <label for="" class="label"><i class="fas fa-user-friends"></i> Nombre de un Contacto</label>
                                <input name="name_contacto" id="name-contacto" type="text" class="form-control" placeholder="Nombre Completo" required>
                            </div>
                        </div>

                        <div class="row justify-content-center form-group" id="telefonoC-group">
                            <div class="col-md-10">
                                <label for="" class="label"><i class="fas fa-phone-alt"></i> Telefono del Contacto</label>
                                <input name="tel_contacto" id="tel-contacto" type="number" class="form-control" placeholder="Telefono contacto" required onfocusout="Validar()">
                            </div>
                        </div>

                        <div class="clasePasaje">
                            <div class="row justify-content-center checkbox">
                                <div class="row ">
                                    <p class="text-center">¿ Tipo de Pasaje ?</p>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-5 form-check-inline">
                                        <input type="radio" name="Clase" value="option1" id="primeraClase">
                                        <label class="form-check-label" for="">Primera Clase</label>
                                    </div>
                                    <div class="col-sm-5 form-check-inline">
                                        <input type="radio" name="Clase" value="option2" id="Claseeconomica">
                                        <label class="form-check-label" for="">Clase Economica</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row botones"><!--no se pueden sacar los botones del form...porque deja de funcionar...-->
                            <div class="d-grid gap-3  text-center"> <!-- d-sm-block-->
                                <button  type="submit" class="btn btn-primary" name="botonaceptar" value="aceptar">Aceptar</button> <!--REVISAR ESTA PARTE porque se pueden seleccionar los 2-->
                                
                            </div>
                        </div>

                    </form>

                <div class="col-md-6 col-md-6 order-sm-last" id="info_vuelo"> <!--REVISAR ESTA PARTE-->
                  <!-- se rellena con el js... comprar tickete.js-->

                </div>

            </div>

        </div>

    <!--JS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
