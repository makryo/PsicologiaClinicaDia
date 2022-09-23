<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paciente extends Model
{
    protected $fillable = [
        'medico_id',
        'nombres',
        'apellidos',
        'telefono',
        'mensajeria',
        'edad'
    ];
}
