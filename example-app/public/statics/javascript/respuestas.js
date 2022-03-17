$(function() {
  var divpublicacionespreguntas = document.getElementById("chat");
  var divpublicacionesrespuesta = document.getElementById("respuesta");
  for (var i = 0; i < comentariosChat.length; i++){

    divpublicacionespreguntas.innerHTML =divpublicacionespreguntas.innerHTML+`

        <div class="row">
            <h2 class="publication_name col-11">${comentariosChat[i].titulo}</h1>
        </div>
        <p class="publication_text row">${comentariosChat[i].texto}</p>
        <b class="publication_author row">Autor: ${comentariosChat[i].Login_Usuario}</b>

        <div class="publication_comments_create row">
            <div class="input-group mb-3">
                <input name='usuarioLogueado' type="hidden" value="${usuarioLogueado}" readonly="readonly" >
                <input name='id_comentario_${comentariosChat[i].id}'  value="${comentariosChat[i].id}" readonly="readonly" >
            </div>
            <input name='respuesta_${comentariosChat[i].id}' type="text" placeholder="Agregue un comentario" aria-label="Recipient's username" aria-describedby="basic-addon2" >
            <div class="input-group-append">
                <button name='submit' value='${comentariosChat[i].id}' class="btn btn-outline-secondary">Comentar</button>
            </div>
        </div>

    `;

    for (var j = 0; j < respuestasChat.length; j++){
      if(comentariosChat[i].id==respuestasChat[j].id_comentario){
        console.log(respuestasChat[i].respuesta);
        divpublicacionespreguntas.innerHTML =divpublicacionespreguntas.innerHTML+`

              <div class="publication_comments__text row">
                  <div class="container comments__comment col-12">
                      <div class="comments__data row">
                          <b class="comment__author col-12">${respuestasChat[j].Login_Usuario} (Admin)</b>
                          <p class="col-12">
                              ${respuestasChat[j].respuesta}
                          </p>
                      </div>
                  </div>
              </div>

          `;
      }
    }
  }



});
