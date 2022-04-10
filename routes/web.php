<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return "im here!";
});

Route::controller(ProductController::class)
    ->prefix('product')->group(function () {
        Route::get('/', function () {
            redirect('/index');
        });

        Route::get('/index', 'index')->name('product.index');
        Route::get('/create', 'create')->name('product.create');
        Route::post('/store', 'store')->name('product.store');
        Route::get('/{id}', 'show')->name('product.show');
    });
Route::get('/info', function () {
    echo phpinfo();
});
