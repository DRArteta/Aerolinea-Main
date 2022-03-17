$(function() {
  var valor_carrito=0;
  var divpublicaciones = document.getElementById("info_ticketes");
  for (const property in vuelos) {
    //console.log(`${property}: ${vuelos[property]}`);
    for (var value of vuelos[property]) {
      //console.log(value.tipo_id);
      if(usuario==value.creador){
        divpublicaciones.innerHTML =`
        <div class="row pagarCarrito text-center">
                <p>tipo de id: ${value.tipo_id}</p>
                <p>id: ${value.documento}</p>
                <p>nombre: ${value.nombre}</p>
                <p>apellido: ${value.apellido}</p>
                <p>numero silla:${value.numero_silla} </p>
                <p>precio: ${value.precio}</p>
                <p>fecha de creacion: ${value.fecha_creacion}</p>
                <p>${property}</p>

            <div class="col-4">
            <div class="d-grid gap-2 d-md-block">
                    <a href='/editarTicket/${usuario}/${value.id}'>
                      <button  type="button"class="btn btn-primary" name="editar" value="editar">Editar</button>
                    </a>
                    <a href='/cancelarTicket/${usuario}/${value.id}'>
                      <button  type="button"class="btn btn-primary" name="cancelar" value="cancelar">Cancelar</button>
                    </a>
                </div>
            </div>
        </div>`+divpublicaciones.innerHTML;
        valor_carrito=valor_carrito+value.precio;
      }
    }
  }
/*
  divpublicaciones.innerHTML=divpublicaciones.innerHTML+`<div class='d-grid d-sm-flex justify-content-sm-end'>
      <a href='/pagoRealizado/${usuario}'><button  type='submit' class='btn btn-danger btn-lg' name='submit' value='pagar' >Pagar</button></a>
      </div>`;
*/
document.getElementById("valor_carrito").value=valor_carrito;

});
