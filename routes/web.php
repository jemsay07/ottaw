<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrizeListController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\FrontPagesController;
use App\Http\Controllers\SpecialPrizeController;
use App\Http\Controllers\ConsolationPrizeController;
use App\Http\Controllers\resetPasswords;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::prefix('prize_list')->group(function () {
    // Route::resource('prize_list', PrizeListController::class);
// });

/**Front Pages*/
Route::get('/', [FrontPagesController::class, 'index'])->name('home');
Route::get('/{id}/result-detail', [FrontPagesController::class, 'result_details'])->name('request');
Route::get('/about', [FrontPagesController::class, 'pages_about'])->name('about');
Route::get('/contact-us', [FrontPagesController::class, 'pages_contact'])->name('contact-us');
Route::get('/fetchData', [FrontPagesController::class, 'fetchData'])->name('fetching');

/**Price List*/
Route::prefix('prize_list')->group(function () {
    Route::get('/', [PrizeListController::class, 'index'])->name('admin.prize.index');
    Route::get('/create', [PrizeListController::class, 'create'])->name('admin.prize.create');
    Route::post('/store', [PrizeListController::class, 'store']);
    Route::get('/{id}/edit', [PrizeListController::class, 'edit'])->name('admin.prize.edit');
    Route::put('/{id}/update', [PrizeListController::class, 'update']);
    Route::put('/trash', [PrizeListController::class, 'trash']);
    // Route::delete('/delete', [PrizeListController::class, 'destroy']);
});

/**Special List*/
Route::prefix('special_prizes')->group(function () {
    Route::post('/store', [SpecialPrizeController::class, 'store']);
});

/**Consolation List*/
Route::prefix('consolation_prizes')->group(function () {
    Route::post('/store', [ConsolationPrizeController::class, 'store']);
});

/**Reset*/
Route::prefix('reset')->group(function () {
    Route::get('/', [resetPasswords::class, 'index'])->name('admin.reset.index');
    Route::put('/update', [resetPasswords::class, 'update']);
});
