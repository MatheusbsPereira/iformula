<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Route::resource('nutriente',App\Http\Controllers\NutrienteController::class);
    Route::get('/nutrientes',[App\Http\Controllers\NutrienteController::class,'index'])->name('nutriente.index');
    Route::get('/ingredientes',[App\Http\Controllers\IngredienteController::class,'index'])->name('ingrediente.index');
    Route::get('/ingredientes/{nome}',[App\Http\Controllers\IngredienteController::class,'show'])->name('ingrediente.show');
    Route::get('/animais',[App\Http\Controllers\AnimalController::class,'index'])->name('animal.index');
    Route::get('/animais/{nome}',[App\Http\Controllers\AnimalController::class,'show'])->name('animal.show');
    Route::get('/racoes',[App\Http\Controllers\RacaoController::class,'index'])->name('racao.index');
});
Route::fallback(function () {
    return view('nao-encontrado');
})->middleware('auth');
require __DIR__.'/auth.php';