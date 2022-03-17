<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateF extends Model
{
    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'vuelos';
    public $fillable = [
    'id_admin',
    'lugar_de_salida',
    'lugar_de_llegada',
    'fecha_de_salida',
    'fecha_de_llegada',
    'hora_de_salida',
    'hora_de_llegada',
    'precio',
    'precioP',
    'num_pasajeros_turista',
    'num_pasajeros_pre',
    'promocion',
    'tipo'
  ];
  
}
