
$(function () {
    var csrfVar = $('meta[name="csrf-token"]').attr('content');
    var today = new Date();
    var today = today.getFullYear()+'-'+( today.getMonth() + 1 )+ '-' +today.getDate();
    var divfligths = document.getElementById("fligths");
    var notienePasajeros=true;
    for (var i = 0; i < vuelos.length; i++) {

        divfligths.innerHTML = divfligths.innerHTML + `

        <div class="row promotion text-center">
            <div class="row">
                <div class="col-4">
                    <div class="row">
                        <p>SALE DE <b class="detinyCity">${vuelos[i].lugar_de_salida} </b><i class="fas fa-globe-americas"></i></p>
                    </div>
                    <div class="row">
                        <p>LLEGA A <b class="arriveCity">${vuelos[i].lugar_de_llegada}</b><i class="fas fa-globe-americas"></i></p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <p>FECHA DE SALIDA</p>
                    </div>
                    <div class="row">
                        <b class="date">${vuelos[i].fecha_de_salida} <i class="fas fa-calendar-day"></i></b>
                    </div>
                </div>
                <div class="col-4">
                    <p>PRECIO: <b class="newPrice">${vuelos[i].precio} </b><i class="fas fa-dollar-sign"></i></p>
                </div>
            </div>

        </div>

      `;
      for (var j = 0; j < ticketes.length; j++){
        if(vuelos[i].id==ticketes[j].id_vuelo){
          notienePasajeros=false;
        }
      }
      if(today<=vuelos[i].fecha_de_salida && notienePasajeros){
        divfligths.innerHTML = divfligths.innerHTML + `
        <form action="/admin/crear" method="POST">
            <input type="hidden" name="_token" value="${csrfVar}" />
            <input type="text" style="display:none" name="idVuelo" class="contact-form__input form-control" value=${vuelos[i].id}>
            <input id='nombre' name='nombre' type='hidden' value=${usuario}>
            <div class="row">
                <div class="col text-center buyButton">
                    <button type="submit" class="btn btn-success" name="submit" value="editarVuelo"><i class="fas fa-shopping-basket"></i>EDITAR</button>
                </div>
                <div class="col text-center buyButton">
                    <button type="submit" class="btn btn-danger" name="submit" value="eliminar"><i class="fas fa-trash-alt"></i>ELIMINAR</button>
                </div>
            </div>
        </form>
        `;
      }
      notienePasajeros=true;
    }
});
