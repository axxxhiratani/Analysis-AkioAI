<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TendController;
use App\Http\Controllers\ResultController;

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
    return view('add_menu');
});

// tend入力ファイルを受け取る
Route::post('/store/tend', [TendController::class, 'store'])
->name('tend.store');

// tendの分析結果を見る
Route::get('/show/tend', [TendController::class, 'show'])
->name('tend.show');

// result入力ファイルを受け取る
Route::post('/store/result', [ResultController::class, 'store'])
->name('result.store');
