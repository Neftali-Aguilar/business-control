<?php

use App\Http\Controllers\Frontend\GeneralController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ReportController;
use App\Http\Controllers\Frontend\SellsController;
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
Route::controller(SellsController::class)->group(function () {
    Route::get('/sells', 'index')->name('sells.index');
    Route::get('/sells/{sell}', 'show')->name('sells.show');
    Route::post('/sells', 'store')->name('sells.store');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/create', 'create')->name('products.create');
    Route::post('/products', 'store')->name('products.store');
    Route::get('/products/{product}', 'show')->name('products.show');
    Route::put('/products/{product}', 'update')->name('products.update');
});
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');


/*Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
