<?php

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
use App\Http\Controllers\GameController;

Route::get('/', [ GameController::class, 'GetList' ])->name('list');

Route::get('/new', [ GameController::class, 'NewRecord' ])->name('new_record');
Route::post('/new', [ GameController::class, 'SaveNewRecord' ]);

Route::get('/info/{id}', [ GameController::class, 'GetInfo' ]);

Route::get('/edit/{id}',[GameController::class,'GetEditPackage']);
Route::post('/edit/{id}',[GameController::class,'EditRecord']);

