<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;


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

Route::get('/', function () {
    //return view('welcome');
	return redirect('/login');	
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard',[CandidateController::class, 'index'])->name('dashboard');

    Route::get('/candidate',[CandidateController::class, 'add']);
    Route::post('/candidate',[CandidateController::class, 'create']);

    Route::get('/convert',[CandidateController::class, 'convertcurrency'])->name('convert');
    Route::post('/convert',[CandidateController::class, 'convertcurrency'])->name('convert');



    //Route::post('/convert', [CandidateController::class, 'convertcurrency']);	
    //Route::get('/convert', [CandidateController::class, 'convertcurrency']);
	
    Route::get('/candidate/{candidate}', [CandidateController::class, 'edit']);
    Route::post('/candidate/{candidate}', [CandidateController::class, 'update']);
});