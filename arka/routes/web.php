<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductoController;

/*Route::get('/inicio', function () {
    return view('inicio');
});*/

Route::get('/', function () {
    return view('inicio');
})->middleware(['auth', 'verified'])->name('inicio');

Route::middleware('auth')->group(function () {
    Route::get('/Perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/Perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/Perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/contactanos', 'contactanos')->name('contactanos');
Route::view('/nosotros', 'nosotros')->name('nosotros');

Route::get('/serviciosE', function () {
    return view('serviciosE');
});

Route::get('/serviciosM', function () {
    return view('serviciosM');
});
Route::resource('productosM', ProductController::class);
Route::get('/productosM', [ProductController::class, 'index'])->name('productosM');
Route::resource('/productosE', ProductoController::class);
Route::get('/productosE', [ProductoController::class, 'index'])->name('productosE');
Route::get('/Reservacion', function () {
    return view('reservar');
});
require __DIR__.'/auth.php';
