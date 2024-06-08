<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductoController;

/*Route::get('/inicio', function () {
    return view('inicio');
});*/
//Vista de User
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
//Vista de User Para los Productos de Medicinales
Route::resource('productosM', ProductController::class);
Route::get('/productosM', [ProductController::class, 'index'])->name('productosM');
//Vista de User Para los Productos Esteticos
Route::resource('/productosE', ProductoController::class);
Route::get('/productosE', [ProductoController::class, 'index'])->name('productosE');
Route::get('/Reservacion', function () {
    return view('reservar');
});

//Vista de admin Para los Crud de Productos Esteticos
Route::resource('admin.productosEs', ProductoController::class);
Route::get('admin/productosEs', [ProductoController::class, 'indexAlternative'])->name('productosEs.alternative');
// Vista de admin Para los Crud de Productos Medicinales
require __DIR__.'/auth.php';
