<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_rol',
        'descripcion_rol',
        'status',
    ];
    public function user(){
        return $this -> hasMany(User::class,'id');
    }
}
