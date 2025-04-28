<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ---------------------------- user public routes ---------------------------

Route::get('/', [HomeController::class,'user'])->name('user');

Route::get('/logout', [HomeController::class,'logout'])->name('logout');





// -------------------------- Admin Routes ------------------------------------

Route::middleware(['auth', AdminMiddleware::class . ':admin'])
->group(function () {
    Route::get('/admin', [AdminController::class,'admin'])->name('admin');

    Route::get('/admin/AddTeamMember', [AdminController::class,'AddTeamMember'])->name('AddTeamMember');
    Route::post('/admin/AddTeamMember/InsertTeamMember', [AdminController::class,'InsertTeamMember'])->name('InsertTeamMember');

    




});








Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


