<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MAddTarjeta;

class CAddTarjeta extends Controller
{
    public function Registrar($tipoTarjeta, $saldo,$numero_tarjeta,$banco)
    {
      $nuevaTarjeta= new MaddTarjeta(array(
        'saldo'=>$saldo,
        'tipo'=>$tipoTarjeta,
        'numero'=>$numero_tarjeta,
        'banco'=>$banco,
      ));

      $nuevaTarjeta->save();
      
    }
}
