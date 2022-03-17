<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MAddTarjeta extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'tarjetas';
    public $fillable = [
    'saldo',
    'tipo',
    'numero',
    'banco',
  ];
}
