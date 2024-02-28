<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\RemitoController;
use App\Http\Controllers\Api\Admin\EmpresaController;

Route::prefix('v1')->group(function (){
    ///Publicas
    Route::get('/public/{slug}', [frontController::class, 'categorias']);
    //::auth
    Route::post('/auth/register', [AuthController::class, 'register']); 
    Route::post('/auth/login', [AuthController::class, 'login']); 


    ///Privadas
    Route::group(['middleware'=>'auth:sanctum'],function () {
        //::auth
        Route::post('/auth/logout',[AuthController::class, 'logout']);
        
        //::rol cliente
       Route::apiResource('/client/empresa', ClienteControllers::class);

        //::rol admin 
        Route::apiResource('/admin/user', UserController::class);
        Route::apiResource('/admin/remito', RemitoController::class);
        Route::apiResource('/admin/empresa', EmpresaController::class); //revisar que pasa con estesie s que se uso o no
        

    });


});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

