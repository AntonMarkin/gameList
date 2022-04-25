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
use App\Http\Controllers\GetPagesController;

Route::get('/', [ GetPagesController::class, 'GetListPage' ])->name('list');

Route::get('/new', [ GetPagesController::class, 'GetNewRecordPage' ])->name('new_record')->middleware('test.auth');
Route::post('/new', [ GameController::class, 'SaveNewRecord' ]);

Route::get('/info/{id}', [ GetPagesController::class, 'GetInfoPage' ])->name('game_info');

Route::get('/edit/{id}',[ GetPagesController::class,'GetEditPage' ])->name('edit_record')->middleware('test.auth');
Route::post('/edit/{id}',[ GameController::class,'EditRecord' ]);

Route::get('/logout',[ GameController::class,'Logout'])->middleware('test.auth');

Route::get('/auth', [ GetPagesController::class,'GetAuthorizationPage' ])->name('auth');
Route::post('/auth', [ GameController::class,'Authorizaton' ])->name('authorized');

Route::get('/reg', [ GetPagesController::class,'GetRegistrationPage' ])->name('register');
Route::post('/reg', [ GameController::class,'Registration' ]);
