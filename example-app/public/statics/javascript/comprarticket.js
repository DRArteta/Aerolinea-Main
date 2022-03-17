$(function() {
  var divpublicaciones = document.getElementById("info_vuelo");
  divpublicaciones.innerHTML =`
  <div class="datosGeneral"> <!--REVISAR ESTA PARTE-->
      <div class="row text-center">
          <p>SALE DE: ${lugar_de_salida} <i class="fas fa-globe-americas"></i></p>
      </div>
      <div class="row text-center">
          <p>HORA DE SALIDA: ${hora_de_salida} <i class="fas fa-globe-americas"></i></p>
      </div>
      <div class="row text-center">
          <p>LLEGA A:  ${lugar_de_llegada} <i class="fas fa-globe-americas"></i></p>
      </div>
      <div class="row text-center">
          <p>HORA DE LLEGADA:  ${hora_de_llegada} <i class="fas fa-globe-americas"></i></p>
      </div>
      <div class="row">
          <div class=" row text-center">
              <p>ANTES PRECIO TURISTA: <b class="antes">${precio} </b></p>
              <p>ANTES PRECIO PRIMERA CLASE: <b class="antes">${precioP} </b></p>
          </div>
          <div class=" row text-center">
            <p>AHORA PRECIO TURISTA: <b class="ahora">${precio-(precio*(promocion/100))}</b></p>
            <p>AHORA PRIMERA CLASE: <b class="ahora">${precioP-(precioP*(promocion/100))}</b></p>
          </div>
          <div class="row text-center">
              <p class="align-self-center"><b class="fechaSalida"> FECHA DE SALIDA: ${fecha_de_salida} </b></p>

          </div>
      </div>
  </div>`
});
