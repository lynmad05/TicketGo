<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\CompraDetalleController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DocumentoController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::view('/terminos-condiciones', 'terminos')->name('terminos');
Route::view('/', 'welcome')->name('welcome');
Route::view('/nosotros', 'nosotros')->name('nosotros');
Route::view('/principallog', 'usuario.principallog')->name('pagina.principallog');
// ...
Route::post('/guardar-detalle', [CompraDetalleController::class, 'guardarDetalle'])->name('guardar.detalle');
Route::get('/formato-entrega', [CompraDetalleController::class, 'mostrarVistaEntrega'])->name('elegirduki');
Route::post('/guardar-formato', [CompraDetalleController::class, 'guardarFormatoEntrega'])->name('guardar.formatoEntrega');
Route::get('/pago/confirmar', [CompraController::class, 'vistaPago'])->name('pago.confirmar');
Route::post('/pago', [CompraController::class, 'pagar'])->name('compra.pagar');
Route::get('/pagoduki', [CompraController::class, 'mostrarPagoFinal'])->name('pagoduki');
Route::delete('/detalle/{id}/eliminar', [CompraController::class, 'eliminarDetalle'])->name('detalle.eliminar');
Route::get('/identificador-duki/{compra_id}', [CompraController::class, 'mostrarIdentificador'])->name('usuario.identificadorduki');
Route::post('/documento/simular', [DocumentoController::class, 'simular'])->name('documento.simular');
Route::post('/confirmar-compra', [CompraController::class, 'confirmarCompra'])->name('voucher.generar');
Route::get('/voucher/{id}', [CompraController::class, 'mostrarVoucher'])->name('voucher.mostrar');
Route::get('/vaucher', [CompraController::class, 'vistaVaucher'])->name('vaucher');



Route::get('/pago/exito', function () {
    return view('pago.exito');
})->name('pago.exito');

Route::get('/duki', function () {
    return view('usuario.duki');
})->name('evento.duki');

Route::get('/compraduki', function () {
   return view('usuario.compraduki');
})->name('usuario.compraduki');

Route::get('/identificadorduki', function () {
    return view('usuario.identificadorduki');
})->name('usuario.identificadorduki');

Route::get('/vaucherduki', function () {
    return view('usuario.vaucherduki');
})->name('usuario.vaucherduki');

// ▪️ RUTAS DE ADMINISTRACIÓN (sin modificar las existentes)
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');

    Route::middleware(['auth', 'adminonly'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('proveedores', ProveedorController::class)->names('admin.proveedores');
        Route::resource('eventos', EventoController::class)->names('admin.eventos');
        Route::resource('promociones', PromocionController::class)->names('admin.promociones');
    });

    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// ▪️ RUTAS DE AUTENTICACIÓN DE LARAVEL
require __DIR__.'/auth.php';
