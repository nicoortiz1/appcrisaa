<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\RemitoController;
use App\Http\Controllers\Api\Admin\EmpresaController;
use App\Http\Controllers\Api\Admin\ClienteController;


Route::prefix('v1')->group(function (){
    ///Publicas
    Route::get('/public/{slug}', [frontController::class, 'categorias']);
    //::auth
    Route::post('/auth/register', [AuthController::class, 'register']); 
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/auth/validate-token', [AuthController::class, 'validateToken']);
 
    ///Privadas
    Route::group(['middleware'=>'auth:sanctum'],function () {
        //::auth
        Route::post('/auth/logout',[AuthController::class, 'logout']);

        //::rol admin 
        Route::apiResource('/admin/user', UserController::class);
        Route::apiResource('/admin/remito', RemitoController::class);
        Route::apiResource('/admin/empresa', EmpresaController::class);
        
        Route::post('/admin/clientescrear', [\App\Http\Controllers\Api\Admin\ClienteController::class, 'store']);

        
    });


});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

