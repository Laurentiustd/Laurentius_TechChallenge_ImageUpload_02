<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ImageController::class, 'show']);
Route::get('/input', [ImageController::class, 'create']);
Route::post('/storeImage', [ImageController::class, 'store']);
Route::get('/detail/{id}', [ImageController::class, 'detail']);
Route::delete('/delete/{id}', [ImageController::class, 'delete']);

