<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/statics/css/chat.css">
    <script src="https://kit.fontawesome.com/4a8e5f3b5a.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--CSS-->
</head>
<!--parte en la que sube los datos-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
var usuarioLogueado='<?php echo $usuarioLogueado ?? ''; ?>';
var comentariosChat=<?php echo $comentarios ?? ''; ?>;
var respuestasChat=<?php echo $respuestas ?? ''; ?>;
</script>
<script src="/statics/javascript/respuestas.js"></script>
<!--parte en la que sube los datos-->
<body>
    @include('navbarAdmin',['usuarioLogueado' => $usuarioLogueado])
    <div class="mx-auto col-12">
        <div class="container divConttainer">
            <h1 class="h_tittle">Chat</h1>
        </div>
        <form action="/admin/chat" method="POST">
          @csrf
        <div class="publication row" >
          <div class="container publication_data col-12" id="chat" >
          </div>
        </div>
        </form>
        <!--
        <div class="publication row">
            <div class="container col-12">
                <div class="row">
                    <h2 class="publication_name col-11">Titulo</h1>
                </div>
                <p class="publication_text row">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia nesciunt iste adipisci eveniet voluptatum? Quasi voluptas similique id cum, neque omnis blanditiis corporis maxime consequuntur provident vel assumenda, consequatur iste?</p>
                <b class="publication_author row">Autor: Ana</b>
            </div>
            <div class="publication_comments container col-12">
                <div class="publication_comments_create row">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Agregue un comentario" aria-label="Recipient's username" aria-describedby="basic-addon2" id='comentario_publicacion_${datosTemas[i].id_post}'>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">Comentar</button>
                        </div>
                    </div>
                </div>
                <div class="publication_comments__text row">
                    <div class="container comments__comment col-12">
                        <div class="comments__data row">
                            <b class="comment__author col-12">Sebastián Mora Carmona (Admin)</b>
                            <p class="col-12">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa veritatis voluptate dignissimos. Quisquam eos nulla deserunt, voluptatibus aspernatur consectetur exercitationem vitae mollitia atque ad perspiciatis, id quo. Laudantium, quaerat nesciunt!
                            </p>
                        </div>
                    </div>
                    <div class="container comments__comment col-12">
                        <div class="comments__data row">
                            <b class="comment__author col-12">Sebastián Mora Carmona (Admin)</b>
                            <p class="col-12">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa veritatis voluptate dignissimos. Quisquam eos nulla deserunt, voluptatibus aspernatur consectetur exercitationem vitae mollitia atque ad perspiciatis, id quo. Laudantium, quaerat nesciunt!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <input value="${datosTemas[i].id_post}" type="hidden" readonly="readonly" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" id='id_publicacion_${datosTemas[i].id_post}'>
            </div>
        </div>
      -->
    </div>
</body>

</html>
