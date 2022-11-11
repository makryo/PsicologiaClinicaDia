<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entrevista extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'user_id',
        'tiempo_libre',
        'hace_solo',
        'no_gusta',
        'deportes',
        'programas',
        'felicidad',
        'entristece',
        'enojo',
        'aspec_vida',
        'habitos'
    ];
    public function User(){
    	return $this->belongsTo('App\Models\User');
    }

    public function paciente(){
    	return $this->belongsTo('App\Models\paciente');
    }
}
