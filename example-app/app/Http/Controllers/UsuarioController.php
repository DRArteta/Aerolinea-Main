<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuario;

class UsuarioController extends Controller
{
    public function Registrar($nombre,$lastnombre,$date,$id,$mail,$user,$password,$genero,$rol)
    {
      $nuevoUsuario= new usuario(array(
        'Login_Usuario'=>$user,
        'Contrasena'=>$password,
        'Documento'=>$id,
        'Nombres'=>$nombre,
        'Apellidos'=>$lastnombre,
        'Fecha_nacimiento'=>$date,
        'Genero'=>$genero,
        'Correo_electrónico'=>$mail,
        'rol'=>$rol,
        'id_carrito'=> NULL,
        'id_tarjeta'=>NULL
      ));

      $nuevoUsuario->save();
    }

}
