



<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedorController;

   
Route::get('/', function () {
    return view('livewire.auth.login');
})->name('home');


Route::get('/criar', function () {
    return view('categorias.create');
})->name('categorias');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

   Route::resource('categorias',CategoriaController::class)->middleware('auth');
  Route::resource('clientes', ClienteController::class);
  Route::resource('fornecedores', App\Http\Controllers\FornecedorController::class);




require __DIR__.'/auth.php';
