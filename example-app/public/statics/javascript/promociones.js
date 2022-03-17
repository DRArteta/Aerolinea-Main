$(function() {
var today = new Date();
var today = today.getFullYear()+'-'+( today.getMonth() + 1 )+ '-' +today.getDate();
var divpublicaciones = document.getElementById("info_vuelo");
var numer=1;
for (var i = 0; i < vuelos.length; i++){
  if(vuelos[i].promocion>="1"&&today<=vuelos[i].fecha_de_salida){
    divpublicaciones.innerHTML =`<div class="col-4">
        <b class="detinyCity" name='id'>id= ${vuelos[i].id} </b>
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
          <a href='/añadirCarrito/${usuarioLogueado}/${vuelos[i].id}/${numer}/${numer}'>
            <button  type='submit'class='btn btn-success' name='submit' value='comprar'><i class='fas fa-shopping-basket'></i>COMPRAR</button>
          </a>
        </div>
        <div class="col-4">
            <p>ANTES: <b class="beforePrice">${vuelos[i].precio} </b><i class="fas fa-dollar-sign"></i></p>
            <p>AHORA: <b class="newPrice"> ${vuelos[i].precio-(vuelos[i].precio*(vuelos[i].promocion/100))}</b><i class="fas fa-dollar-sign"></i></p>
        </div>`+divpublicaciones.innerHTML
  }
}
});
/*
<div class="col-4">
    <b class="detinyCity" name='id'>id=1 </b>
    <div class="row">
        <p>SALE DE <b class="detinyCity">BOGOTÁ </b><i class="fas fa-globe-americas"></i></p>
    </div>
    <div class="row">
        <p>LLEGA A <b class="arriveCity">PEREIRA </b><i class="fas fa-globe-americas"></i></p>
    </div>
</div>
<div class="col-4">
    <div class="row">
        <p>FECHA DE SALIDA</p>
    </div>
    <div class="row">
        <b class="date">22/05/2020 <i class="fas fa-calendar-day"></i></b>
    </div>
    <div class="row buyButton">
        <button  type="submit"class="btn btn-success" name="submit" value="comprar"><i class="fas fa-shopping-basket"></i>COMPRAR</button>
    </div>
</div>
<div class="col-4">
    <p>ANTES: <b class="beforePrice">222.500 </b><i class="fas fa-dollar-sign"></i></p>
    <p>AHORA: <b class="newPrice">200.500 </b><i class="fas fa-dollar-sign"></i></p>
</div>
*/
