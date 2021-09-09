<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

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


Route::get('/', [TodosController::class, 'index']);
Route::get('/todo/create', [TodosController::class, 'add']);
Route::post('/todo/create', [TodosController::class, 'create']);
Route::get('/todo/update', [TodosController::class, 'edit']);
Route::post('/todo/update', [TodosController::class, 'update']);