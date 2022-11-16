<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'imagen',
        'status',
        'id_categories',
    ];
    public function categories(){
        return $this -> belongsTo(Category::class,'id_categories');
    }
}
