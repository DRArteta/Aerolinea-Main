<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    public $timestamps = false;
    protected $fillable = [
    'Login_Usuario',
    'Contrasena',
    'Documento',
    'Nombres',
    'Apellidos',
    'Fecha_nacimiento',
    'Genero',
    'Correo_electrónico',
    'rol',
    'id_carrito',
    'id_tarjeta'
  ];
}
