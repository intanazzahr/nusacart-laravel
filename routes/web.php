<?php

use Illuminate\Support\Facades\Route;

// Rute Login (untuk mencegah error redirect auth)
Route::get('/login', function () {
    return "Silakan login terlebih dahulu.";
})->name('login');

// Route untuk login otomatis sebagai Admin (untuk keperluan testing/screenshot cepat)
Route::get('/login-admin', function () {
    $user = \App\Models\User::where('role', 'admin')->first();
    auth()->login($user);
    return redirect('/modul');
});

// Route untuk login otomatis sebagai Staff (untuk keperluan testing/screenshot cepat)
Route::get('/login-staff', function () {
    $user = \App\Models\User::where('role', 'staff')->first();
    auth()->login($user);
    return redirect('/modul');
});

Route::get('/', function () {
    return view('welcome');
});

// Route Modul yang dilindungi middleware auth
Route::middleware(['auth'])->group(function () {
    Route::get('/modul', function () {
        return view('modul.index');
    })->name('modul.index');

    Route::delete('/modul/{id}', function ($id) {
        // Logika hapus
    })->middleware('role:admin')->name('modul.destroy');
});
// Rute Logout untuk tombol keluar di navbar
Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');