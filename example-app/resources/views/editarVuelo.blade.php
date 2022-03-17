<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/4a8e5f3b5a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/statics/css/createFligth.css" />
    </head>
    <body>
    @include('navbarAdmin',['usuarioLogueado' => $usuarioLogueado])
        <form class="createFligth container"method="POST">
        @csrf
        <!--Se debe colocar en todas los form que necesiten recuperar el nombre del usuario logueado despues...es una especie de dar y recibir.. yo doy el nombre del usuario y lo recibo-->
        <?php
        echo "<input id='nombre' name='nombre' type='hidden' value=$usuarioLogueado>";#a pesar de ser admin se siguue trabajando con una varible llamada usuarioLogueado
         ?>
         <!--#------------------------------------------------------------------------------------------------->
            <div class="row justify-content-md-center">
                <div class="col-4">
                    <div class="form-group" id="source-group">
                        <label for="" class="label">Sale de</label>
                        <select class="form-select" name="Partida" aria-label="Default select example">
                            <option selected value="<?php echo $vuelo[0]->lugar_de_salida?>">valor guardado: <?php echo $vuelo[0]->lugar_de_salida?></option>
                            <option value="1">pereira</option>
                            <option value="2">bogotá</option>
                            <option value="3">medellin</option>
                            <option value="4">cali</option>
                            <option value="5">cartagena</option>
                            <option value="6">madrid</option>
                            <option value="7">londres</option>
                            <option value="8">new york</option>
                            <option value="9">buenos aires</option>
                        </select>
                    </div>
                    <div class="form-group" id="date-group">
                        <label for="" class="label">Fecha de Salida</label>
                        <input name="date" id="date" type="date" class="form-control" value="<?php echo $vuelo[0]->fecha_de_salida?>">
                    </div>
                    <div class="form-group" id="departureHour-group">
                        <label for="" class="label">Hora de Salida</label>
                        <input name="departureH" id="departureH" type="time" class="form-control" value="<?php echo $vuelo[0]->hora_de_salida?>">
                    </div>
                    <div class="form-group" id="precio-group">
                        <label for="" class="label">Precio Tripulante Económico</label>
                        <input name="precio" id="precio" type="number" class="form-control" placeholder="Precio Tripulante Económico" value="<?php echo $vuelo[0]->precio?>">
                    </div>
                    <div class="form-group" id="precioPremium-group">
                        <label for="" class="label">Precio Tripulante Premium</label>
                        <input name="precioP" id="precioP" type="number" class="form-control" placeholder="Precio Tripulante Premium" value="<?php echo $vuelo[0]->precioP?>">
                    </div>
                    <div class="form-group" id="promotion-group">
                        <label for="" class="label">Porcentaje Promoción</label>
                        <input name="promotion" id="promotion" type="number" class="form-control"  value="<?php echo $vuelo[0]->promocion?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group" id="destiny-group">
                        <label for="" class="label">Llega a</label>
                        <select class="form-select" name="Llegada" aria-label="Default select example" value="<?php echo $vuelo[0]->lugar_de_llegada?>">
                            <option selected  value="<?php echo $vuelo[0]->lugar_de_llegada?>">valor guardado: <?php echo $vuelo[0]->lugar_de_llegada?></option>
                            <option value="1">pereira</option>
                            <option value="2">bogotá</option>
                            <option value="3">medellin</option>
                            <option value="4">cali</option>
                            <option value="5">cartagena</option>
                            <option value="6">madrid</option>
                            <option value="7">londres</option>
                            <option value="8">new york</option>
                            <option value="9">buenos aires</option>
                        </select>
                    </div>
                    <div class="form-group" id="arrivalDate-group">
                        <label for="" class="label">Fecha de Llegada</label>
                        <input name="arrivalDate" id="arrivalDate" type="date" class="form-control" value="<?php echo $vuelo[0]->fecha_de_llegada?>">
                    </div>
                    <div class="form-group" id="arrivalHour-group">
                        <label for="" class="label">Hora de Llegada</label>
                        <input name="arrivalH" id="arrivalH" type="time" class="form-control" value="<?php echo $vuelo[0]->hora_de_llegada?>">
                    </div>
                    <div class="form-group" id="passenger-group">
                        <label for="" class="label">Número de Pasajeros Económico</label>
                        <input name="pasajeros" id="pasajeros" type="number" class="form-control" placeholder="Número de Pasajeros Económico" value="<?php echo $vuelo[0]->num_pasajeros_turista?>">
                    </div>
                    <div class="form-group" id="pasajerosPremium-group">
                        <label for="" class="label">Número de Pasajeros Premium</label>
                        <input name="pasajerosPremium" id="pasajerosPremium" type="number" class="form-control" placeholder="Número de Pasajeros Premium" value="<?php echo $vuelo[0]->num_pasajeros_pre?>">
                    </div>
                    <div class="form-group" id="destiny-group">
                        <label for="" class="label">Tipo</label>
                        <select class="form-select" name="Tipo" aria-label="Default select example" >
                            <option selected  value="<?php echo $vuelo[0]->tipo?>">valor guardado: <?php echo $vuelo[0]->tipo?></option>
                            <option value="1">Local</option>
                            <option value="2">Internacional</option>
                        </select>
                    </div>
                </div>

                <div class="col-4 buttonCreate">
                    <button  type="submit"class="btn btn-success" name="submit" value="create">EDITAR <i class="fas fa-plus-square fa-1x"></i></button>
                </div>
            </div>
        </form>
    </div>
    <!--JS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
