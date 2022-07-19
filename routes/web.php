<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\SellController;
use App\Http\Controllers\Frontend\ReportController;
use App\Http\Controllers\Frontend\ProductController;

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
Route::controller(SellController::class)->group(function () {
    Route::get('/sells', 'index')->name('sells.index');
    Route::get('/sells/create', 'create')->name('sells.create');
    Route::post('/sells', 'store')->name('sells.store');
    Route::get('/sells/{product}', 'show')->name('sells.show');
    Route::put('/sells/{product}', 'update')->name('sells.update');
    Route::delete('/sells/{product}', 'delete')->name('sells.delete');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/create', 'create')->name('products.create');
    Route::post('/products', 'store')->name('products.store');
    Route::get('/products/{product}', 'show')->name('products.show');
    Route::put('/products/{product}', 'update')->name('products.update');
    Route::delete('/products/{product}', 'delete')->name('products.delete');
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
