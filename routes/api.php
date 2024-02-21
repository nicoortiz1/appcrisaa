<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthControllers;
use App\Http\Controllers\Api\Admin\UserControllers;
use App\Http\Controllers\Api\Admin\RemitoControllers;
use App\Http\Controllers\Api\Admin\EmpresaControllers;

Route::prefix('v1')->group(function (){
    ///Publicas
    Route::get('/public/{slug}',[frontControllers::class, 'categorias']);
    //::auth
    //Route::get('/auth/register',[AuthControllers::class, 'register']);
    //Route::get('/auth/login',[AuthControllers::class, 'login']);


    ///Privadas
    Route::group(['middleware'=>'auth:sanctum'],function () {
        //::auth
        Route::post('/auth/logout',[AuthControllers::class, 'logout']);
        
        //::rol cliente
       // Route::apiResource('/client/empresa', ClienteControllers::class);

        //::rol admin 
        Route::apiResource('/admin/user', UserControllers::class);
        Route::apiResource('/admin/remito', RemitoControllers::class);
        Route::apiResource('/admin/empresa', EmpresaControllers::class);

    });


});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

