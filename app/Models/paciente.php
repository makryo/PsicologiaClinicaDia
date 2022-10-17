<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paciente extends Model
{
    protected $fillable = [
        'user_id',
        'nombres',
        'apellidos',
        'telefono',
        'mensajeria',
        'edad'
    ];

    public function User(){
    	return $this->belongsTo('App\Models\User');
    }
    
    public function citas(){
    	return $this->hasMany('App\Models\citas');
    }
}
