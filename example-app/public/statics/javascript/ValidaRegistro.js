function Validar() {
    var today = new Date();
    var numbers = /^[0-9]+$/;
    var reWhiteSpace = /\s/;
    var nameuser = /^[a-z0-9_\.]+$/;
    var lowerCaseLetters = /[a-z]/g;
    var upperCaseLetters = /[A-Z]/g;
    var edad = new Date (document.getElementById("date").value);

    //Comprobar que la salida ni sea en una fecha pasada a la actual-------------------
    if (!((document.getElementById("id").value).match(numbers)) & document.getElementById("id").value < 0){
        alert('No es un numero ');
        document.getElementById("id").value = '';
    }
    //Comprobar que la llegada ni sea en una fecha pasada a la actual-------------------
    if (2021-(edad.getFullYear()) < 18){
        alert('Fecha no aceptada');
        document.getElementById("date").value = '';
    }

    if (reWhiteSpace.test(document.getElementById("user").value)){
        alert('Tiene espacios');
        document.getElementById("user").value = '';
    }

    if (!(nameuser.test(document.getElementById("user").value))){
        alert('Tiene que tener minusculas, mayusculas, puntos o _');
        document.getElementById("user").value = '';
    }

    
  }
function ValidarContra(){
    var numbers = /^[0-9]+$/;
    var reWhiteSpace = new RegExp(/^\s+$/);
    var lowerCaseLetters = /[a-z]/g;
    var upperCaseLetters = /[A-Z]/g;
    
    if (!((document.getElementById("password").value).match(numbers)) ){
        alert('No tiene numeros');
        document.getElementById("password").value = '';
    }

    if (!((document.getElementById("password").value).match(lowerCaseLetters)) ){
        alert('No tiene letra pequeña');
        document.getElementById("password").value = '';
    }

    if (!((document.getElementById("password").value).match(upperCaseLetters)) ){
        alert('No tiene letra mayuscula');
        document.getElementById("password").value = '';
    }

    if (!((document.getElementById("password").length >= 8 ))){
        alert('No tiene letra mayuscula');
        document.getElementById("password").value = '';
    }

}