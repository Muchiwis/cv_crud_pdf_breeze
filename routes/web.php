<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VentasController;
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
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->secure();
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->secure();
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->secure();

        // VENTAS
    Route::get('/ventas',[VentasController::class, 'index'])->middleware('can:ventas.home')->name('ventas.index')->secure();

    Route::get('/ventas/create/{id}', [VentasController::class, 'create'])->middleware('can:ventas.home.create')->name('ventas.create')->secure();

    Route::get('/ventas/delete/{id}', [VentasController::class, 'destroy'])->middleware('can:ventas.home.create')->name('ventas.delete')->secure();

    Route::get('/ventas/download/{id}', [VentasController::class, 'downloadPDF'])->middleware('can:ventas.home.create')->name('ventas.download')->secure();

    Route::get('/ventas/actualizar', [VentasController::class, 'actualizarPdf'])->middleware('can:ventas.home.create')->name('ventas.actualizar')->secure();

    Route::post('ventas/store', [VentasController::class, 'store'])->middleware('can:ventas.home.create')->name('ventas.store')->secure();

    Route::put('ventas/update/{id}', [VentasController::class, 'update'])->middleware('can:ventas.home.create')->name('ventas.update')->secure();
});

require __DIR__.'/auth.php';
