<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteServicio extends Model
{
    use HasFactory;

    protected $table = 'reportes_servicio';

    protected $fillable = [
        'cliente_id',
        'fecha',
        'numero_reporte',
        'inspeccion_instalaciones_id',
        'ctrl_quimico_id',
      //'dispo_moni_insectos_id',
        'control_aves_id',
      //'control_roedores_id',
        'users_id',
        'observaciones',
    ];

    public function cliente()
    {
        return $this->belongsTo(Client::class, 'cliente_id');
    }
    
    public function inspeccionInstalaciones()
    {
        return $this->belongsTo(InspeccionInstalaciones::class, 'inspeccion_instalaciones_id');
    }

    public function ctrlQuimico()
    {
        return $this->belongsTo(CtrlQuimico::class, 'ctrl_quimico_id');
    }

    public function controlAves()
    {
        return $this->belongsTo(ControlAves::class, 'control_aves_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

}
