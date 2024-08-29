<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/admin/admin-categories','App\Http\Controllers\Admin\CategoryController');
    Route::resource('/admin/admin-posts','App\Http\Controllers\Admin\PostController');
    Route::resource('admin-users','App\Http\Controllers\Admin\UserController');
    Route::resource('admin-events','App\Http\Controllers\Admin\EventController');
});

Route::middleware(['auth', 'role:agent'])->group(function(){
    Route::get('/agent/console', [AgentController::class, 'console'])->name('agent.console');
    Route::resource('/agent-posts','App\Http\Controllers\Agent\PostController');
    Route::resource('/agent-articles','App\Http\Controllers\Agent\ArticleController');
});


require __DIR__.'/auth.php';
