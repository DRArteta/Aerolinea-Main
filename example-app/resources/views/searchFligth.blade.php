<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Foro</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/4a8e5f3b5a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/statics/css/searchUser.css" />
    </head>
    <body>
        <form action="/home/buscar" class="row searchUser"method="POST">
          @csrf
          <?php
          echo "<input id='usuarioLogueado' name='usuarioLogueado' type='hidden' value=$usuarioLogueado>";
           ?>
            <div class="col-8">
                <div class="row">
                    <div class="form-group col-6" id="origen-group">
                        <label for="" class="label">Origen</label>
                        <select name="Origen" class="form-select" aria-label="Default select example">
                            <option value="1">pereira</option>
                            <option value="2">bogotá</option>
                            <option value="3">cali</option>
                            <option value="4">medellin</option>
                            <option value="5">cartagena</option>
                            <option value="6">madrid</option>
                            <option value="7">londres</option>
                            <option value="8">new york</option>
                            <option value="9">buenos aires</option>
                        </select>
                    </div>
                    <div class="form-group col-6" id="date-group">
                        <label for="" class="label">Fecha de Salida</label>
                        <input name="date" id="date" type="date" class="form-control">
                    </div>
                    <div class="form-group col-6" id="destiny-group">
                        <label for="" class="label">Destino</label>
                        <select name="Destino" class="form-select" aria-label="Default select example">
                            <option value="1">pereira</option>
                            <option value="2">bogotá</option>
                            <option value="3">cali</option>
                            <option value="4">medellin</option>
                            <option value="5">cartagena</option>
                            <option value="6">madrid</option>
                            <option value="7">londres</option>
                            <option value="8">new york</option>
                            <option value="9">buenos aires</option>
                        </select>
                    </div>
                    <div class="form-group col-6" id="pasajeros-group">
                        <label for="" class="label">Número de Pasajeros</label>
                        <input name="numer" id="number" type="number" class="form-control" placeholder="Pasajeros">
                    </div>
                </div>
            </div>

            <div class='col-4  buttonSearch'>
              <button  type='submit' class='btn btn-ligth' name='submit' value='Buscar' style='background-color: #e3f2fd;'><i class='fas fa-search'></i> Buscar</button>
            </div>

            <!--
            <div class="col-4  buttonSearch">
                <button  type="submit"class="btn btn-ligth" name="submit" value="Buscar" style="background-color: #e3f2fd;"><i class="fas fa-search"></i> Buscar</button> fas fas-sign-in-alt: esto nos saca esa cosita rara al lado de ingresar
            </div>
          -->
        </form>
    <!--JS BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
