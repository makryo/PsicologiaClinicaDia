<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaEvolutiva extends Model
{
    use HasFactory;
    protected $fillable = [
        'paciente_id',
        'user_id',
        'observacion'
    ];

    public function User(){
    	return $this->belongsTo('App\Models\User');
    }

    public function paciente(){
    	return $this->belongsTo('App\Models\paciente');
    }
}
