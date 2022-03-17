<!-- para ayuda: https://styde.net/copiar-plantillas-de-html-y-css-estaticas-a-laravel-6/-->


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--FRAMEWORK BOOTSTRAP Para el estilo de la pagina-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Los iconos tipo solid de fontawesome-->
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solic.css">-->
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!--Nuestro css-->
    <link rel="stylesheet" href="/statics/css/root.css" />
    <!--Nuestro javascript-->
    <script src="/statics/javascript/usuario.js"></script>
    <script src="/statics/javascript/ValidaRegistro.js"></script>
    <meta charset="utf-8">
    <title>ROOT</title>
  </head>
  <body>
    <div class="modal-dialog ">
      <div class="col-sm-12 main-section"><!--utilize tres cuartos de toda la pantalla-->
        <div class="modal-content"><!--crea una liniesita al rededor del div-->
          <div class="col-12 user-img text-center">
             <img src="/statics/img/user" alt="profile Pic" height="200" width="200">
          </div>
          <form class="col-12"method="POST">
            @csrf
            <div class="row">
              <div class="form-group col-6" id="name-group">
                <label for="" class="label">Nombre</label>
                <input name="name" id="name" type="text" class="form-control" placeholder="Nombre Completo" required>
              </div>
              <div class="form-group col-6" id="lastname-group">
                <label for="" class="label">Apellido</label>
                <input name="lastname" id="lastname" type="text" class="form-control" placeholder="Apellido Completo" required>
              </div>
              <div class="form-group col-6" id="lastname-group">
                <label for="" class="label">Sexo</label>
                <select name="genero" class="form-select" aria-label="Default select example">
                  <option value="1">Hombre</option>
                  <option value="2">Mujer</option>
                </select>
              </div>
              <div class="form-group col-6" id="date-group">
                <label for="" class="label">Fecha de Nacimiento</label>
                <input name="date" id="date" type="date" class="form-control" placeholder="Nombre Completo" required onfocusout="Validar()">
              </div>
              <div class="form-group col-6" id="id-group">
                <label for="" class="label">No. Identificación</label>
                <input name="id" id="id" type="number" class="form-control" placeholder="Número de Identificación" required onfocusout="Validar()">
              </div>
              <div class="form-group col-6" id="mail-group">
                <label for="" class="label">Correo Electrónico</label>
                <input name="mail" id="mail" type="email" class="form-control" placeholder="Correo Electrónico" required>
              </div>
              <div class="form-group col-6" id="user-group">
                <label for="" class="label">Usuario</label>
                <input name="user" id="user" type="text" class="form-control" placeholder="Usuario" required onfocusout="Validar()">
              </div>
              <div class="form-group col-6" id="password-group">
                <label for="" class="label">Contraseña</label>
                <input name="password" id="password" type="password" class="form-control" placeholder="Contraseña" required>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-8">
                <button  type="submit"class="btn btn-primary" name="submit" value="registrar"><i class="fas fa-external-link-alt"></i> Registrar</button><!--fas fas-sign-in-alt: esto nos saca esa cosita rara al lado de ingresar-->
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
