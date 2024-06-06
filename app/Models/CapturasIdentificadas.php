<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapturasIdentificadas extends Model
{
    use HasFactory;

    protected $table = 'capturas_identificadas';

    protected $fillable = [
        'tipo',
        'cantidad',
    ];

}

