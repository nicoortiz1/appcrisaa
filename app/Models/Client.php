<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    
    protected $fillable = [
        'empresa',
        'per_contacto',
        'email',
        'cuil',
        'dni',
        'telefono',
        'direccion',
        'provincia',
        'descripcion',
        'publicado',
        'orden',
    ];
}
