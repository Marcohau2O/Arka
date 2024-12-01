<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\UserController;

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
Route::get('/Compras', [VentasController::class, 'Ventas'])->name('Compras');

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

//Reservacion del User
Route::get('/Reservacion', function () {
    return view('reservar');
});

//Admin dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/administracionUser', [UserController::class, 'administracionUser'])->name('admin.administracionUser');

Route::get('/admin/administracionVent', [VentasController::class, 'administracionVent'])->name('admin.administracionVent');
Route::put('/ventas/{id}/update-status', [VentasController::class, 'updateStatus'])->name('ventas.updateStatus');
Route::put('/ventas/{id}/update-status-paypal', [VentasController::class, 'updateStatusPaypal'])->name('ventas.updateStatusPaypal');

//Vista de admin Para los Crud de Productos Esteticos
Route::resource('admin.productosEs', ProductoController::class);
Route::get('admin/productosEs', [ProductoController::class, 'indexAlternative'])->name('productosEs.alternative');
Route::get('admin/createProdEs', [ProductoController::class, 'create'])->name('admin.createProdEs');
Route::post('admin/store', [ProductoController::class, 'store'])->name('admin.storeProdEs');
Route::get('admin/edit/{id}', [ProductoController::class, 'edit'])->name('admin.editProdEs');
Route::put('admin/edit/{id}', [ProductoController::class, 'update'])->name('admin.updateProdEs');
Route::delete('admin/destroy/{id}', [ProductoController::class, 'destroy'])->name('admin.destroyProdEs');

// Vista de admin Para los Crud de Productos Medicinales
//Route::resource('admin.productosMe', ProductController::class);
Route::get('admin/productosMe', [ProductController::class, 'indexAlternative'])->name('productosMe.alternative');
Route::get('admin/createProdMe', [ProductController::class, 'create'])->name('admin.createProdMe');
Route::post('admin/stores', [ProductController::class, 'stores'])->name('admin.storesProdMe');
Route::get('admin/edits/{id}', [ProductController::class, 'edits'])->name('admin.editsProdMe');
Route::put('admin/edits/{id}', [ProductController::class, 'updates'])->name('admin.updatesProdMe');
Route::delete('admin/destroys/{id}', [ProductController::class, 'destroys'])->name('admin.destroysProdMe');

//carrito de Compra 
Route::post('cart/add', [CartController::class, 'add'])->name('add');
Route::post('cart/adds', [CartController::class, 'adds'])->name('adds');
Route::get('cart/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('cart/clear', [CartController::class, 'clear'])->name('clear');
Route::post('cart/removeitem', [CartController::class, 'removeItem'])->name('removeitem');

//Pasarela de Pago
Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
Route::post('/payment/storePaypalTransaction', [PaymentController::class, 'storePaypalTransaction'])->name('storePaypalTransaction');
Route::get('/payment/confirmation', [PaymentController::class, 'confirmation'])->name('payment.confirmation');
Route::get('/payment/paypalconfirmation', [PaymentController::class, 'confirmation2'])->name('payment.paypalconfirmation');
Route::view('/Pasarela-Pago', 'Pasarela')->name('Pasarela');


require __DIR__.'/auth.php';
