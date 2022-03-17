$(function() {
  var divpublicaciones = document.getElementById("datos_tickete_usuario");
  for (var i = 0; i < tickete.length; i++){
        divpublicaciones.innerHTML =`
        <div class="row justify-content-center form-group xd">
            <div class="col-sm-4">
                <label class="col-form-label tblanco" for="PrimerNombre"><b>Primer Nombre :</b></label>
            </div>
            <div class="col-sm-4">
                <input class="form-control" readonly="readonly" id="PrimerNombre" type="text" name="PrimerNombre" value="${tickete[i].nombre}">
            </div>
        </div>
        <div class="row justify-content-center xd">
            <div class="col-sm-4">
                <label class="col-form-label tblanco" for="PrimerApellido"><b> Primer Apellido :</b></label>
            </div>
            <div class="col-sm-4">
                <input class="form-control" readonly="readonly" id="PrimerApellido" type="text" name="apellido" value="${tickete[i].apellido}">
            </div>
        </div>
        <div class="row justify-content-center xd">
            <div class="col-sm-4">
                <label class="col-form-label tblanco" for="correo"><b>Email :</b></label>
            </div>
            <div class="col-sm-4">
                <input class="form-control" readonly="readonly" id="correo" type="email" name="correo" value="${tickete[i].correo_electronico}">
            </div>
        </div>
        <div class="row justify-content-center xd">
            <div class="col-sm-4">
                <label class="col-form-label tblanco" for="numReserva"><b>Numero de reserva :</b></label>
            </div>
            <div class="col-sm-4">
                <input class="form-control" readonly="readonly" id="numReserva" type="numeric" name="reserva" value="${tickete[i].id}">
            </div>
        </div>
        `+divpublicaciones.innerHTML;
  }

  var divpublicacionesprimeraclase = document.getElementById("silla_primeraClase");
  var divpublicacionesturista = document.getElementById("silla_turista");
  var numLocalizacionSilla=0;
  var numSilla=1;
  for (var i = 0; i < vuelo.length; i++){
    for (var j = 0; j < vuelo[i].num_pasajeros_pre/6; j++){
      numLocalizacionSilla=numLocalizacionSilla+6;
          divpublicacionesprimeraclase.innerHTML =divpublicacionesprimeraclase.innerHTML+`
    <div class="row" >
        <div class="col-2">
        </div>
        <div class="col-1 mgin">
            <div class="">
                <input type="radio" name="asiento" id="asientoA${numSilla+1}" autocomplete="off" value="${numSilla+1}">
                <label class="xd btn btn-primary" for="asientoA${numSilla+1}">${numSilla+1}</label>
            </div>
        </div>
        <div class="col-1 mgin">
            <div class="">
                <input type="radio" name="asiento" id="asientoB${numSilla+2}" autocomplete="off" value="${numSilla+2}">
                <label class="xd btn btn-primary" for="asientoB${numSilla+2}">${numSilla+2}</label>
            </div>
        </div>
        <div class="col-1 mgin">
            <div class="">
                <input type="radio" name="asiento" id="asientoC${numSilla+3}" autocomplete="off" value="${numSilla+3}">
                <label class="xd btn btn-primary" for="asientoC${numSilla+3}">${numSilla+3}</label>
            </div>
        </div>
        <div class="col-1">
            <div class="num">
                <p> 0${j+1}</p>
            </div>
        </div>
        <div class="col-1 mgin">
            <div class="">
                <input type="radio" name="asiento" id="asientoD${numSilla+4}" autocomplete="off" value="${numSilla+4}">
                <label class="xd btn btn-primary" for="asientoD${numSilla+4}">${numSilla+4}</label>
            </div>
        </div>
        <div class="col-1 mgin">
            <div class="">
                <input type="radio" name="asiento" id="asientoE${numSilla+5}" autocomplete="off" value="${numSilla+5}">
                <label class="xd btn btn-primary" for="asientoE${numSilla+5}">${numSilla+5}</label>
            </div>
        </div>
        <div class="col-1 mgin">
            <div class="">
                <input type="radio" name="asiento" id="asientoF${numSilla+6}" autocomplete="off" value="${numSilla+6}">
                <label class="xd btn btn-primary" for="asientoF${numSilla+6}">${numSilla+6}</label>
            </div>
        </div>
        <div class="col-3">
        </div>

    </div>
    `;
    numSilla=numSilla+6;
  }
  for (var j = 0; j < (vuelo[i].num_pasajeros_turista/6); j++){
        divpublicacionesturista.innerHTML =divpublicacionesturista.innerHTML+`
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-1 mgin">
                <div class="">
                    <input type="radio" name="asiento"  id="asientoA${numSilla+1}" autocomplete="off" value="${numSilla+1}">
                    <label class="xd btn btn-success" for="asientoA${numSilla+1}">${numSilla+1}</label>
                </div>
            </div>
            <div class="col-1 mgin">
                <div class="">
                    <input type="radio" name="asiento"  id="asientoB${numSilla+2}" autocomplete="off" value="${numSilla+2}">
                    <label class="xd btn btn-success" for="asientoB${numSilla+2}">${numSilla+2}</label>
                </div>
            </div>
            <div class="col-1 mgin">
                <div class="">
                    <input type="radio" name="asiento"  id="asientoC${numSilla+3}" autocomplete="off" value="${numSilla+3}">
                    <label class="xd btn btn-success" for="asientoC${numSilla+3}">${numSilla+3}</label>
                </div>
            </div>
            <div class="col-1 mm">
                <div class="num">
                    <p>${Math.floor(vuelo[i].num_pasajeros_pre/6)+j+1}</p>
                </div>
            </div>
            <div class="col-1 mgin">
                <div class="">
                    <input type="radio" name="asiento"id="asientoD${numSilla+4}" autocomplete="off" value="${numSilla+4}">
                    <label class="xd btn btn-success" for="asientoD${numSilla+4}">${numSilla+4}</label>
                </div>
            </div>
            <div class="col-1 mgin">
                <div class="">
                    <input type="radio" name="asiento" id="asientoE${numSilla+5}" autocomplete="off" value="${numSilla+5}">
                    <label class="xd btn btn-success" for="asientoE${numSilla+5}">${numSilla+5}</label>
                </div>
            </div>
            <div class="col-1 mgin">
                <div class="">
                    <input type="radio" readonly="readonly" name="asiento" id="asientoF${numSilla+6}" autocomplete="off" value="${numSilla+6}">
                    <label class="xd btn btn-success" for="asientoF${numSilla+6}">${numSilla+6}</label>
                </div>
            </div>
            <div class="col-3">
            </div>
        </div>
  `;
  numSilla=numSilla+6;
}
  }




  for (var k = 0; k < (sillasReservadas.length); k++) {
      if (document.getElementById("asientoA"+sillasReservadas[k])!=null){
        document.getElementById("asientoA"+sillasReservadas[k]).disabled ="true";
      }
      if (document.getElementById("asientoB"+sillasReservadas[k])!=null){
        document.getElementById("asientoB"+sillasReservadas[k]).disabled ="true";
      }
      if (document.getElementById("asientoC"+sillasReservadas[k])!=null){
        document.getElementById("asientoC"+sillasReservadas[k]).disabled ="true";
      }
      if (document.getElementById("asientoD"+sillasReservadas[k])!=null){
        document.getElementById("asientoD"+sillasReservadas[k]).disabled ="true";
      }
      if (document.getElementById("asientoE"+sillasReservadas[k])!=null){
        document.getElementById("asientoE"+sillasReservadas[k]).disabled ="true";
      }
      if (document.getElementById("asientoF"+sillasReservadas[k])!=null){
        document.getElementById("asientoF"+sillasReservadas[k]).disabled ="true";
      }

  }



});
