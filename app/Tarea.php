<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
   protected $fillable = ['tarea', 'descripcion', 'autor','estado', 'usuario','fechavencimiento'];
}
