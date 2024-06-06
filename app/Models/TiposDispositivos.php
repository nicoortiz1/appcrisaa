<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposDispositivos extends Model
{
    use HasFactory;

    protected $table = 'mecanismos_utilizados';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
