function Prueba() {
    var today = new Date();
    var GFSalida = new Date (document.getElementById("date").value);
    var GFLlegada = new Date (document.getElementById("arrivalDate").value);

    //Comprobar que la salida ni sea en una fecha pasada a la actual-------------------
    if ((GFSalida.getTime()-300) < (today.getTime()-94486066)){
        alert('Fecha no aceptada');
        document.getElementById("date").value = '';
    }


    //Comprobar que la llegada ni sea en una fecha pasada a la actual-------------------
    if ((GFLlegada.getTime()) < (GFSalida.getTime())){
        alert('Fecha no aceptada');
        document.getElementById("arrivalDate").value = '';
    }


    /*
    alert(document.getElementById("departureH").value.replace(':', '') +'   '+ today.getHours()+today.getMinutes());
    //comprobar que la fecha de salida no sea menor de la llegada
    if ((TFSalida.getTime()) < (today.getTime())){
        alert('Hora no aceptada');
        document.getElementById("departureH").value = '';
    }
    */

    //validar precios negativos------------------------------------------------------
    if (document.getElementById("precio").value < 0){
        alert('Precio no aceptado');
        document.getElementById("precio").value = '';
    }

    if (document.getElementById("precioP").value < 0){
        alert('Precio no aceptado');
        document.getElementById("precioP").value = '';
    }

    if (document.getElementById("promotion").value < 0){
        alert('Porcentaje no aceptado');
        document.getElementById("promotion").value = '';
    }

    //Pasajeros negativos --------------------------------------------------------------
    if (document.getElementById("pasajeros").value < 0){
        alert('Numero no aceptado');
        document.getElementById("pasajeros").value = '';
    }

    if (document.getElementById("pasajerosPremium").value < 0){
        alert('Numero no aceptado');
        document.getElementById("pasajerosPremium").value = '';
    }
  }