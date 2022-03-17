$(function() {
    var divpublicacionesPrimeraFila = document.getElementById("info_tarjetas_primeraFila");
    var divpublicacionesSegundaFila = document.getElementById("info_tarjetas_segundaFila");
    /* asi se lee un jhonson para futuras ocaciones
    for (const property in tarjetas) {
      for (var value of tarjetas[property]) {
        console.log(value.id);
      }
    }
    */

    for (const property in tarjetas) {
      for (var value of tarjetas[property]) {
        if(value.tipo!='none' && value.numero!=0){
          divpublicacionesPrimeraFila.innerHTML =`
            <div class="col-md-3 col-sm-8">
                <div class="row text-center">
                  <p class="seccionTitulo"> Banco: ${value.banco} </p>
                  <p>Numero Tarjeta: ${value.numero}</p>
                  <p>Saldo: ${value.saldo}</p>
                  <p>id: ${value.id}</p>
                </div>
                <div class="row text-center">
                    <span class="fas fa-credit-card fa-7x"></span>
                </div>
                <div class="row basura">
                  <button name='submit' value=${value.id} class="btn btn-outline-danger"><span class="fas fa-trash-alt"></span></button>
                </div>
            </div>
      `+divpublicacionesPrimeraFila.innerHTML
        }
      }
    }

    divpublicacionesPrimeraFila.innerHTML=divpublicacionesPrimeraFila.innerHTML+`
        <div class="col-md-3 col-sm-8">
            <div class="row text-center">
                <p class="text-center seccionBotones"> <button type="button" class="btn btn-outline-primary btn-block" data-bs-toggle="modal" data-bs-target="#exampleModalTwo"><span class="fas fa-credit-card"></span> Añadir Tarjeta</button></p>
            </div>
            <div class="row">
                <p class="text-center"><button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#pagar">Pagar</button></p>
            </div>
        </div>`
        for (const property in tarjetas) {
          for (var value of tarjetas[property]) {
            if(value.tipo=='none' && value.numero==0){
              divpublicacionesSegundaFila.innerHTML=divpublicacionesSegundaFila.innerHTML+`
                        <div class="row">
                            <p><b>Mi Saldo</b></p>
                        </div>
                        <div class="row justify-content-sm-center">
                            <div class="col-md-9 text-center">
                                <p class="justify-content-center"><b class="wallet">${value.saldo} COP</b> <i class="fas fa-coins fa-5x"></i></p>

                            </div>`

            }
          }
        }
        if (value!=null){
          divpublicacionesSegundaFila.innerHTML=divpublicacionesSegundaFila.innerHTML+`
                      <div class="col-md-3 col-sm-8">
                          <div class="row text-center">
                              <p class="text-center seccionBotones"> <button type="button" class="btn btn-outline-primary btn-block" data-bs-toggle="modal" data-bs-target="#modalExample"><span class="fas fa-hand-holding-usd"></span> Añadir Saldo</button></p>
                          </div>
                          <div class="row">
                              <p class="text-center"><button name='submit' value=${value.numero} class="btn btn-primary btn-block">Pagar</button></p>
                          </div>
                      </div>
                  </div>
              </div>
              <br>
          <p>Valor carrito:</p>
          <input name="valor_carrito" id="submit" value="${valor_carrito}" readonly="readonly">`
        }else{
          divpublicacionesSegundaFila.innerHTML=divpublicacionesSegundaFila.innerHTML+`
          <p>Valor carrito:</p>
          <input name="valor_carrito" id="submit" value="${valor_carrito}" readonly="readonly">`
        }

    });
