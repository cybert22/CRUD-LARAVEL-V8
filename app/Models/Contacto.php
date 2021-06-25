<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    // llenando los campos de la tabla contacto
    
    protected $fillable = ['nombre','apellido','celular','correo','direccion','comentario'];
}