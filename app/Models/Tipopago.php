<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipopago extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipopago',
    ];
    public function pedido(){
        return $this -> hasMany(Pedido::class,'id');
    }
}
