<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comentario;

class controlador_comentario extends Controller
{
  public function crearComentario($Login_Usuario,$titulo,$texto)
  {
    $nuevoComentario= new comentario(array(
      'Login_Usuario'=>$Login_Usuario,
      'titulo'=>$titulo,
      'texto'=>$texto
    ));

    $nuevoComentario->save();
  }
}
