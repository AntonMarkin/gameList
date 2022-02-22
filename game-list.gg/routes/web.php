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
Route::get('/', [ GameController::class, 'GetList' ]);
Route::get('/info/{id}', [ GameController::class, 'GetInfo' ]);
Route::get('/new', [ GameController::class, 'NewRec' ]);
Route::post('/new/check', [ GameController::class, 'Check' ]);

