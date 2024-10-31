<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/', 'index')->name('admin.index');
        Route::prefix('/users')->group(function () {
            Route::get('/', 'usersIndex')->name('users.index');
            Route::get('/create', 'usersCreate')->name('users.create');
            Route::post('/store', 'usersStore')->name('users.store');
            Route::get('/{user}/edit', 'usersEdit')->name('users.edit');
            Route::put('/{user}', 'usersUpdate')->name('users.update');
            Route::delete('/{user}', 'usersDestroy')->name('users.delete');
            
            Route::prefix('/roles')->group(function () {
                Route::get('/', 'rolesIndex')->name('roles.index');
                Route::get('/create', 'rolesCreate')->name('roles.create');
                Route::post('/', 'rolesStore')->name('roles.store');
                Route::get('/{role}/edit', 'rolesEdit')->name('roles.edit');
                Route::put('/{role}', 'rolesUpdate')->name('roles.update');
                Route::delete('/{role}', 'rolesDestroy')->name('roles.delete');
            });
        });

    });
});

require __DIR__.'/auth.php';
