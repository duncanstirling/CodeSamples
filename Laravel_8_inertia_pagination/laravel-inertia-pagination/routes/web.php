<?php
  
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserDataController;
use Inertia\Inertia;
  
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
  
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
 
Route::get('list-users', [UserDataController::class, 'index']);
  
require __DIR__.'/auth.php';