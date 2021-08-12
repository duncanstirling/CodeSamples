<?php

use App\Http\Controllers\API\StudentController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::delete('delete-student/{id}', [StudentController::class, 'destroy']);

Route::put('update-student/{id}', [StudentController::class, 'update']);

Route::get('/edit-student/{id}', [StudentController::class, 'edit']);

Route::get('/students', [StudentController::class, 'index']);

Route::post('/add-student', [App\Http\Controllers\API\StudentController::class, 'store'])->name('add-student');
Route::get('/add-student', [App\Http\Controllers\API\StudentController::class, 'store'])->name('add-student');
//Route::get('/student', [App\Http\Controllers\API\StudentController::class, 'store'])->name('add-student');
//Route::get('/student', [App\Http\Controllers\API\StudentController::class, 'store'])->name('add-student');


Route::middleware('auth:api')->get('/user', function (Request $request) {
	
    return $request->user();
});


//Route::post('add-student', [StudentController::class. 'store']);
//Route::get('add-student', [StudentController::class. 'store']);

//<noscript><pre>ReflectionException: Function () does not exist in RouteSignatureParameters.php on line 27

