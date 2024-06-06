<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlAves extends Model
{
    use HasFactory;

    protected $table = 'control_aves';

    protected $fillable = [
        'ubicacion',
        'mecanismos_utilizados_id',
        'cap_identificadas_id',
        'observaciones'
    ];

    public function mecanismosUtilizados()
    {
        return $this->belongsTo(MecanismosUtilizados::class, 'mecanismos_utilizados_id');
    }

    public function capturasIdentificadas()
    {
        return $this->belongsTo(CapturasIdentificadas::class, 'cap_identificadas_id');
    }
}
