<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\saldo_usuario;

class saldo_usuario_controller extends Controller
{
  public function guardarTarjeta($login,$id_tarjeta)
  {
    $nuevaTarjeta= new saldo_usuario(array(
      'login'=>$login,
      'id_tarjeta'=>$id_tarjeta
    ));

    $nuevaTarjeta->save();
  }
}
