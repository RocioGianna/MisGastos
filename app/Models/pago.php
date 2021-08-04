<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    use HasFactory;


    protected $fillable = [
        'gasto',
        'descripcion',
        'precio',
        'fecha',
    ];
   
    public function user(){
        return $this->belongsTo('App\User');
    }
}
