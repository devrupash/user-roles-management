<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';

Route::get('/roles', [RoleController::class, 'index'])->middleware('auth');
Route::get('/admin-only', [RoleController::class, 'onlyForAdmin'])->middleware(['can:admin']);
Route::get('/editor-only', [RoleController::class, 'onlyForEditor'])->middleware(['can:editor']);
Route::get('/author-only', [RoleController::class, 'onlyForAuthor'])->middleware(['can:author']);
Route::get('/secret', [RoleController::class, 'secretMessage'])->middleware('can:secret');
Route::get('/blog-dashboard', [RoleController::class, 'blogDashboard'])->middleware('auth');
Route::get('/update-role', [RoleController::class, 'updateRole'])->middleware(['auth']);