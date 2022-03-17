<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CreateF;
use Illuminate\Http\Request;

class CreateFC extends Controller
{
    public function Registrar($sale,$date,$precio,$precioP,$llega,$pasajeros,$pasajerosPremium,$promotion,$horasalida,$horallegada,$fechallegada,$Tipo)
    {
      $nuevoVuelo= new CreateF(array(
        'id_admin'=>NULL,
        'lugar_de_salida'=>$sale,
        'lugar_de_llegada'=>$llega,
        'fecha_de_salida'=>$date,
        'fecha_de_llegada'=>$fechallegada,
        'hora_de_salida'=>$horasalida,
        'hora_de_llegada'=>$horallegada,
        'precio'=>$precio,
        'precioP'=>$precioP,
        'num_pasajeros_turista'=>$pasajeros,
        'num_pasajeros_pre'=> $pasajerosPremium,
        'promocion'=>$promotion,
        'tipo'=>$Tipo,
      ));

      $nuevoVuelo->save();
      
    }
}
