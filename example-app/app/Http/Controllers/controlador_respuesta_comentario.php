<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\respuesta_comentario;

class controlador_respuesta_comentario extends Controller
{
  public function crearRespuesta($nombre,$id_comentario,$respuesta)
  {
    $nuevaRespuestaComentario= new respuesta_comentario(array(
      'Login_Usuario'=>$nombre,
      'id_comentario'=>$id_comentario,
      'respuesta'=>$respuesta
    ));

    $nuevaRespuestaComentario->save();
  }
}
