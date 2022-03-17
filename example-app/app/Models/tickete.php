<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tickete extends Model
{
  public $timestamps = false;
  protected $fillable = [
    'id_carrito',
    'id_vuelo',
    'creador',
    'tipo_id',
    'documento',
    'nombre',
    'apellido',
    'fecha_de_nacimiento',
    'genero',
    'telefono',
    'correo_electronico',
    'nombre_de_contacto',
    'telefono_de_contacto',
    'tiene_promocion',
    'precio',
    'tipo_clase',
    'numero_silla',
    'fecha_creacion'
];
}
