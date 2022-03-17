<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saldo_usuario extends Model
{
  public $timestamps = false;
  protected $fillable = [
    'login',
    'id_tarjeta'
  ];
}
