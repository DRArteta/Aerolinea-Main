<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/statics/css/profile.css">
    <script src="https://kit.fontawesome.com/4a8e5f3b5a.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--CSS-->
</head>

<body>
    @include('navbarUser',['usuarioLogueado' => $usuarioLogueado])
    <article>

        <div class="container">
            <div class="row contact">
                <div class="col-8">
                    <img src="/statics/img/ProfileImage.png" class="mx-auto d-block rounded contact-profile-image" alt="...">
                </div>
                <div class="col-4 contact-form">
                    <input type="text" class="contact-form__input form-control" value=<?php echo $Nombres ?> disabled>
                    <input type="date" class="contact-form__input form-control" value="<?php echo $Fecha_nacimiento ?>" disabled>
                    <input type="text" class="contact-form__input form-control" value="Dirección de facturación: none" disabled>
                    <input type="text" class="contact-form__input form-control" value="<?php echo $Correo_electronico ?>" disabled>
                    <input type="text" class="contact-form__input form-control" value="<?php echo $usuarioLogueado ?>" disabled>
                    <input type="password" class="contact-form__input form-control" id="password" value="<?php echo $Contrasena ?>" disabled>
                    <input type="text" class="contact-form__input form-control" value="Lugar de nacimiento: none" disabled>

                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-6 " id="tema-interes">
                    <button class="btn btn-success btn-lg" name="submit" value="registrar" data-bs-toggle="modal" data-bs-target="#modalExample"><i class="fas fa-edit"></i> Editar</button>
                </div>
            </div>

        </div>
        <div class="modal fade" id="modalExample" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Datos de Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/home/profile" class="col-12" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-6" id="typeCard-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input type="text" name="name" class="contact-form__input form-control" value=<?php echo $Nombres ?>>
                                </div>
                                <div class="form-group col-6" id="typeCard-group">
                                    <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                                    <input type="date" name="date" class="contact-form__input form-control" value="<?php echo $Fecha_nacimiento ?>">
                                </div>
                                <div class="form-group col-6" id="typeCard-group">
                                    <label for="exampleInputEmail1">Dirección de Facturación</label>
                                    <input type="text" class="contact-form__input form-control" value="none">
                                </div>
                                <div class="form-group col-6" id="typeCard-group">
                                    <label for="exampleInputEmail1">Correo Electrónico</label>
                                    <input type="text" name="mail" class="contact-form__input form-control" value="<?php echo $Correo_electronico ?>">
                                </div>
                                <div class="form-group col-6" id="typeCard-group" style="display:none">
                                    <label for="exampleInputEmail1">Usuario</label>
                                    <input type="text" name="username" class="contact-form__input form-control" value="<?php echo $usuarioLogueado ?>">
                                </div>
                                <div class="form-group col-6" id="typeCard-group">
                                    <label for="exampleInputEmail1">Contraseña</label>
                                    <input type="password" name="pass" class="contact-form__input form-control" id="password" value="<?php echo $Contrasena ?>">
                                </div>
                                <div class="form-group col-6" id="typeCard-group">
                                    <label for="exampleInputEmail1">Lugar de Nacimiento</label>
                                    <input type="text" name="nacimientoLugar" class="contact-form__input form-control" value="none">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary"  name="submit" value="editar">Editar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </article>
</body>

</html>
