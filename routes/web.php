<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FabricaController;
use App\Http\Controllers\NutrienteController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    /*
        Rotas para a página perfil 
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Route::resource('nutriente',NutrienteController::class);
    /*
        Rotas para a página nutriente 
     */
    Route::get('/nutrientes',[NutrienteController::class,'index'])->name('nutriente.index');
    Route::get('/nutrientes/exportsxlsx',[NutrienteController::class,'exportsxlsx'])->name('nutriente.exportsxlsx');
    Route::get('/nutrientes/exportspdf',[NutrienteController::class,'exportspdf'])->name('nutriente.exportspdf');

    /*
        Rotas para a página ingrediente 
     */
    Route::get('/ingredientes',[IngredienteController::class,'index'])->name('ingrediente.index');
    Route::get('/ingredientes/exportsxlsx',[IngredienteController::class,'exportsxlsx'])->name('ingrediente.exportsxlsx');
    Route::get('/ingredientes/exportspdf',[IngredienteController::class,'exportspdf'])->name('ingrediente.exportspdf');
    Route::get('/ingredientes/exibir/{nome}',[IngredienteController::class,'show'])->name('ingrediente.show');

    /*
        Rotas para a página fábrica 
    */
    Route::get('/fabricas',[FabricaController::class,'index'])->name('fabrica.index');
    Route::get('/fabricas/exibir/{especie}',[FabricaController::class,'show'])->name('fabrica.show');
    Route::get('/fabricas/exibir/{especie}/racoes',[FabricaController::class,'racoes'])->name('fabrica.racoes');
    Route::get('/fabricas/exportxlsx/',[FabricaController::class,'exportsxlsx'])->name('fabrica.exportsxlsx');
    Route::get('/fabricas/exportspdf/',[FabricaController::class,'exportspdf'])->name('fabrica.exportspdf');

});
Route::fallback(function () {
    return view('nao-encontrado');
})->middleware('auth');
require __DIR__.'/auth.php';