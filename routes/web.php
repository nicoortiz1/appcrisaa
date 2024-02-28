<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//$role= Role::create(['name'=>'admin']);
//$role= Role::create(['name'=>'client']);


Route::get('/{any}', function () {
    return view('app'); // 'app' es el nombre de tu vista de Blade que renderiza tu aplicación React
})->where('any', '.*');
