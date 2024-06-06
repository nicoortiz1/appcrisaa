<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosQuimicos extends Model
{
    use HasFactory;

    protected $table = 'productos_quimicos';

    protected $fillable = [
        'nombre_comercial',
        'princ_activo',
        'dosis',
        'lote',
        'vcto',
        'forma_aplicacion',
    ];
}
