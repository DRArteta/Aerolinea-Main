function Validar() {
    var today = new Date();
    var numbers = /^[0-9]+$/;

    //Comprobar que la salida ni sea en una fecha pasada a la actual-------------------
    if (!((document.getElementById("document").value).match(numbers)) || document.getElementById("document").value < 0){
        alert('No es un numero ');
        document.getElementById("document").value = '';
    }

    if (!((document.getElementById("tel").value).match(numbers)) & document.getElementById("tel").value < 0){
        alert('No es un numero ');
        document.getElementById("tel").value = '';
    }

    if (!((document.getElementById("tel-contacto").value).match(numbers)) & document.getElementById("tel-contacto").value < 0){
        alert('No es un numero ');
        document.getElementById("tel-contacto").value = '';
    }

    /*
    //Comprobar que la llegada ni sea en una fecha pasada a la actual-------------------
    if ((GFLlegada.getTime()) < (GFSalida.getTime())){
        alert('Fecha no aceptada');
        document.getElementById("arrivalDate").value = '';
    }

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
    }*/
  }