<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carritodecompra;

class carritodecompraController extends Controller
{
  public function crearCarrito($creador,$estado_carrito,$limite_de_pago)
  {
    $nuevoCarrito= new carritodecompra(array(
      'Login_Usuario'=>$creador,
      'estado'=>$estado_carrito,
      'limite_de_pago'=>$limite_de_pago
    ));

    $nuevoCarrito->save();
  }
}
