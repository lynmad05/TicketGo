<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

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
// Página principal
Route::view('/', 'welcome')->name('welcome');

// Página de "Sobre Nosotros"
Route::view('/nosotros', 'nosotros')->name('nosotros');
Route::view('/principallog', 'usuario.principallog')->name('pagina.principallog');

Route::get('/duki', function () {
    return view('usuario.duki');
})->name('evento.duki');

Route::get('/compraduki', function () {
    return view('usuario.compraduki');
})->name('usuario.compraduki');

Route::get('/elegirduki', function () {
    return view('usuario.elegirduki');
})->name('elegirduki');

Route::get('/pagoduki', function () {
    return view('usuario.pagoduki');
})->name('pagoduki');

Route::get('/identificadorduki', function () {
    return view('usuario.identificadorduki');
})->name('usuario.identificadorduki');  

require __DIR__.'/auth.php';
