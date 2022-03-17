<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carritodecompra extends Model
{
  public $timestamps = false;
  protected $fillable = [
  'Login_Usuario',
  'estado',
  'limite_de_pago'
];
}
