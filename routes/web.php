<?php

use Illuminate\Support\Facades\Route;

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



\Illuminate\Support\Facades\Auth::routes();
Route::middleware('auth')->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //Route::resource('nutriente',App\Http\Controllers\NutrienteController::class);
    Route::get('/nutrientes',[App\Http\Controllers\NutrienteController::class,'index'])->name('nutriente.index');
    Route::get('/ingrediente',[App\Http\Controllers\IngredienteController::class,'index'])->name('ingrediente.index');
    Route::get('/ingrediente/{nome}',[App\Http\Controllers\IngredienteController::class,'show'])->name('ingrediente.show');
});

Route::get('/', function () {
    return redirect()->route('home');
});
Route::fallback(function () {
    return view('nao-encontrado');
})->middleware('auth');