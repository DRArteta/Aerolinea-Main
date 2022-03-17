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
