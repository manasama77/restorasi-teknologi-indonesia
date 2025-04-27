<?php

use App\Livewire\Admin;
use App\Livewire\AdminCreate;
use App\Livewire\AdminEdit;
use App\Livewire\AdminReset;
use App\Livewire\Berkas;
use App\Livewire\BerkasCreate;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('berkas', Berkas::class)->name('berkas');
    Route::get('berkas/create', BerkasCreate::class)->name('berkas.create');

    Route::get('admin', Admin::class)->name('admin');
    Route::get('admin/create', AdminCreate::class)->name('admin.create');
    Route::get('admin/edit/{user}', AdminEdit::class)->name('admin.edit');
    Route::get('admin/reset/{user}', AdminReset::class)->name('admin.reset');

    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
