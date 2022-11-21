<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'precio',
        'cantidad',
        'status',
        'id_pedido',
        'id_combo',
    ];
    public function pedidos(){
        return $this -> belongsTo(Pedido::class,'id_pedido');
    }
    public function combos(){
        return $this -> belongsTo(Combo::class,'id_combo');
    }
}
