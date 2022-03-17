$(function() {
  var valor_carrito=0;
  var divpublicaciones = document.getElementById("info_checkin");
  for (const property in vuelos) {
    //console.log(`${property}: ${vuelos[property].tipo_id}`);
      if(usuarioLogueado==vuelos[property].creador && vuelos[property].confirmacion!=1){
        divpublicaciones.innerHTML =`
        <div class="row pagarCarrito text-center">
                <p>tipo de id: ${vuelos[property].tipo_id}</p>
                <p>id: ${vuelos[property].documento}</p>
                <p>nombre: ${vuelos[property].nombre}</p>
                <p>apellido: ${vuelos[property].apellido}</p>
                <p>numero silla:${vuelos[property].numero_silla} </p>
                <p>precio: ${vuelos[property].precio}</p>
                <p>fecha de creacion: ${vuelos[property].fecha_creacion}</p>
                <p>${property}</p>

            <div class="col-4">
            <div class="d-grid gap-2 d-md-block">
                    <button  class="btn btn-primary" name="checkIn" value="${vuelos[property].id}">Check In</button>
                    <button  class="btn btn-primary" name="cancelar" value="${vuelos[property].id}">Cancelar</button>
                </div>
            </div>
        </div>`+divpublicaciones.innerHTML;
      }

  }

});
