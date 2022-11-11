<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receta extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'user_id',
        'medici_one',
        'indica_one',
        'medici_two',
        'indica_two',
        'medici_three',
        'indica_three',
        'medici_four',
        'indica_four',
        'medici_five',
        'indica_five'
    ];

    public function User(){
    	return $this->belongsTo('App\Models\User');
    }

    public function paciente(){
    	return $this->belongsTo('App\Models\paciente');
    }
}
