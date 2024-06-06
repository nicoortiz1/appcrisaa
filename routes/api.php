<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ReporteServicioController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\RemitoController;
use App\Http\Controllers\Api\Admin\EmpresaController;
use App\Http\Controllers\Api\Admin\Clients;

Route::prefix('v1')->group(function () {
    // Rutas públicas
    Route::get('/public/{slug}', [FrontController::class, 'categorias']);

    // Rutas de autenticación
    Route::post('/auth/register', [AuthController::class, 'register']); 
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/auth/validate-token', [AuthController::class, 'validateToken']);

    // Rutas privadas (requieren autenticación)
    Route::middleware(['auth:sanctum'])->group(function () {
        // Rutas de autenticación
        Route::post('/auth/logout', [AuthController::class, 'logout']);

        // Rutas para administrar usuarios, remitos, empresas y clientes
        Route::apiResource('/admin/user', UserController::class);
        Route::apiResource('/admin/remito', RemitoController::class);
        Route::apiResource('/admin/empresa', EmpresaController::class);
        Route::apiResource('/admin/clients', Clients::class);

        Route::get('/clients', 'App\Http\Controllers\Api\Admin\Clients@index');
        
        //Rutas para la administracion del reporte
        Route::get('/reportes-servicio', [ReporteServicioController::class, 'index']);
        Route::get('/reportes-servicio/{id}', [ReporteServicioController::class, 'show']);
        Route::post('/reportes-servicio', [ReporteServicioController::class, 'store']);
        Route::put('/reportes-servicio/{id}', [ReporteServicioController::class, 'update']);
        Route::delete('/reportes-servicio/{id}', [ReporteServicioController::class, 'destroy']);

    });
});

// Ruta para obtener el usuario autenticado
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

