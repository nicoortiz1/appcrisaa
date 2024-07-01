<?php
namespace App\Http\Controllers\Api;

use App\Models\ReporteServicio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ControlAves;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteServicioController extends Controller
{
    public function index()
    {
        $reportes = ReporteServicio::with([
            'cliente',
            'inspeccionInstalaciones',
            'ctrlQuimico',
            //'dispoMoniInsectos',
            'controlAves',
           // 'controlRoedores',
            'user'
        ])->get();

        return response()->json($reportes);
    }

    public function show($id)
    {
        $reporte = ReporteServicio::with([
            'cliente',
            'inspeccionInstalaciones',
            'ctrlQuimico',
            //'dispoMoniInsectos',
            'controlAves',
            //'controlRoedores',
            'user'
        ])->findOrFail($id);

        return response()->json($reporte);
    }

    public function store(Request $request)
    {
        try {
            // Debugging: Log the request data
            Log::info('Request data:', $request->all());

            // Generar automáticamente el número de reporte
            $ultimoReporte = ReporteServicio::orderBy('id', 'desc')->first();
            $nuevoNumeroReporte = $ultimoReporte ? 'R-' . str_pad($ultimoReporte->id + 1, 8, '0', STR_PAD_LEFT) : 'REP-00000001';

            // Validar los datos de la solicitud
            $validatedData = $request->validate([
                'cliente_id' => 'required|exists:clients,id',
                'fecha' => 'required|date',
                // El campo 'numero_reporte' ya no es necesario en la solicitud
                //'numero_reporte' => 'required|string|max:50',
                //'inspeccion_instalaciones_id' => 'nullable|exists:inspeccion_instalaciones,id',
                //'ctrl_quimicos_id' => 'nullable|exists:ctrl_quimicos,id',
                //'dispo_moni_insectos_id' => 'nullable|exists:dispo_moni_insectos,id',
                'control_aves' => 'nullable|array',
                'control_aves.ubicacion' => 'nullable|string|max:255',
                'control_aves.mecanismos_utilizados_id' => 'nullable|exists:mecanismos_utilizados,id',
                'control_aves.cap_avistadas_id' => 'nullable|exists:capturas_identificadas,id',
                'control_aves.observaciones' => 'nullable|string|max:2000',
                //'control_roedores_id' => 'nullable|exists:control_roedores,id',
                'users_id' => 'required|exists:users,id',
                'observaciones' => 'nullable|string|max:65535',
            ]);

            // Incluir el número de reporte generado en los datos validados
            $validatedData['numero_reporte'] = $nuevoNumeroReporte;

            // Crear una entrada en la tabla control_aves si se proporcionaron datos
            $controlAves = null;
            if (isset($validatedData['control_aves'])) {
                $controlAves = ControlAves::create($validatedData['control_aves']);
            }

            // Crear una entrada en la tabla reportes_servicio
            $reporteServicio = ReporteServicio::create(array_merge(
                $validatedData,
                ['control_aves_id' => $controlAves ? $controlAves->id : null]
            ));

            // Devolver una respuesta JSON con el reporte creado y un mensaje de éxito
            return response()->json([
                'message' => 'Reporte creado satisfactoriamente.',
                'reporte' => $reporteServicio
            ], 201);
        } catch (\Exception $e) {
            // Debugging: Log any exceptions
            Log::error('Exception occurred: ' . $e->getMessage());
            
            // Devolver una respuesta de error
            return response()->json(['error' => 'Error occurred while storing data.'], 500);
        }
    }


    public function update(Request $request, $id)
    {
        $reporte = ReporteServicio::findOrFail($id);

        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            // Agrega aquí las validaciones para los otros campos
        ]);

        $reporte->update($validatedData);

        return response()->json($reporte);
    }

    public function destroy($id)
    {
        $reporte = ReporteServicio::findOrFail($id);
        $reporte->delete();

        return response()->json(null, 204);
    }
}
