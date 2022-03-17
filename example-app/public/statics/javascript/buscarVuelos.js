$(function() {
if (usuarioLogueado==''){
  usuarioLogueado='visitante'
}
var today = new Date();
var today = today.getFullYear()+'-'+( today.getMonth() + 1 )+ '-' +today.getDate();
var divpublicaciones = document.getElementById("info_vuelo");
for (var i = 0; i < vuelos.length; i++){
  if((vuelos[i].lugar_de_salida==Origen || vuelos[i].fecha_de_salida==date ||
  vuelos[i].lugar_de_llegada==Destino)&&today<=vuelos[i].fecha_de_salida){
    if ((vuelos[i].num_pasajeros_turista+vuelos[i].num_pasajeros_pre)>=numer){
      divpublicaciones.innerHTML =`<div class="row promotion text-center">
          <div class="col-4">
              <div class="row">
                  <p>SALE DE <b class="detinyCity">${vuelos[i].lugar_de_salida} </b><i class="fas fa-globe-americas"></i></p>
              </div>
              <div class="row">
                  <p>LLEGA A <b class="arriveCity">${vuelos[i].lugar_de_llegada} </b><i class="fas fa-globe-americas"></i></p>
              </div>
          </div>
          <div class="col-4">
              <div class="row">
                  <p>FECHA DE SALIDA</p>
              </div>
              <div class="row">
                  <b class="date">${vuelos[i].fecha_de_salida} <i class="fas fa-calendar-day"></i></b>
              </div>

              <div class="row buyButton">
              <a href='/añadirCarrito/${usuarioLogueado}/${vuelos[i].id}/${numer}/${numer}'>
                <button  type="submit"class="btn btn-success" name="submit" value="comprar"><i class="fas fa-shopping-basket"></i>COMPRAR TICKET</button>
              </a>
              </div>
          </div>
          <div class="col-4">
              <p>Hora de Salida: <b class="beforePrice">xxxx </b></p>
              <p>Precio: <b class="newPrice">${vuelos[i].precio} </b><i class="fas fa-dollar-sign"></i></p>
          </div>
      </div>`+divpublicaciones.innerHTML
    }
  }
}
});
