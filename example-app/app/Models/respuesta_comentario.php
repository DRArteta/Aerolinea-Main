<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class respuesta_comentario extends Model
{
  public $timestamps = false;
  protected $fillable = [
  'Login_Usuario',
  'id_comentario',
  'respuesta'
];
}
