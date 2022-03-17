<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tickete;

class ticketeController extends Controller
{
  public function reservarTickete($id_carrito,$id_vuelo,$creador,$tipo_documento,$documento,$nombre,$apellido,$fecha_de_nacimiento,$genero,$telefono,$correo_electronico,$nombre_de_contacto,$telefono_de_contacto,$tiene_promocion,$precio,$tipo_clase,$numero_silla,$fecha_creacion)
  {
    $nuevoTickete= new tickete(array(
      'id_carrito'=>$id_carrito,
      'id_vuelo'=>$id_vuelo,
      'creador'=>$creador,
      'tipo_id'=>$tipo_documento,
      'documento'=>$documento,
      'nombre'=>$nombre,
      'apellido'=>$apellido,
      'fecha_de_nacimiento'=>$fecha_de_nacimiento,
      'genero'=>$genero,
      'telefono'=>$telefono,
      'correo_electronico'=>$correo_electronico,
      'nombre_de_contacto'=>$nombre_de_contacto,
      'telefono_de_contacto'=>$telefono_de_contacto,
      'tiene_promocion'=>$tiene_promocion,
      'precio'=>$precio,
      'tipo_clase'=>$tipo_clase,
      'numero_silla'=>$numero_silla,
      'fecha_creacion'=>$fecha_creacion
    ));

    $nuevoTickete->save();
  }
}
