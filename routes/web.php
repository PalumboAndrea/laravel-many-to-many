<?php

use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\PostController as PostController;
use App\Http\Controllers\Guest\HomeController as HomeController;
use App\Http\Controllers\Admin\TypeController as TypeController;
use App\Http\Controllers\Admin\TechnologyController as TechnologyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('guests.index');

Route::prefix('guest')->group(function(){
    Route::resource('/', HomeController::class);
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/posts', PostController::class);
        Route::delete('/posts/{post}/clear-post',  [PostController::class, 'clearType'])->name('posts.clearType');
        Route::delete('/posts/{post}/technologies/{technology}',  [PostController::class, 'clearTechnology'])->name('posts.clearTechnology');
        Route::resource('/types', TypeController::class);
        Route::resource('/technologies', TechnologyController::class);
    });

require __DIR__.'/auth.php';
