<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_usuario',
        'fecha',
        'costo_envio',
        'monto',
        'status',
        'id_tipopago',
        'direccion_envio',
    ];
    public function tipopagos(){
        return $this -> belongsTo(Tipopago::class,'id_tipopago');
    }
    public function detallepedido(){
        return $this -> hasMany(DetallePedido::class,'id');
    }
}
