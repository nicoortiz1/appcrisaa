<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtrlQuimico extends Model
{
    use HasFactory;

    protected $table = 'ctrl_quimicos';

    protected $fillable = [
        'sector',
        'plaga_id',
        'mecanismos_utilizados_id',

    ];

    public function mecanismosUtilizados()
    {
        return $this->belongsTo(MecanismosUtilizados::class, 'mecanismos_utilizados_id');
    }
    public function plagas()
    {
        return $this->belongsTo(Plagas::class, 'plaga_id');
    }
}
