<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspeccionInstalaciones extends Model
{
    use HasFactory;

    protected $table = 'inspeccion_instalaciones';

    protected $fillable = [
        'sector',
        'plaga_id',
        'causa',
        'accion',
        'cierre',
    ];
    public function plagas()
    {
        return $this->belongsTo(Plagas::class, 'plaga_id');
    }
}
