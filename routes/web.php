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
        Route::get('/{id}', 'show')->name('product.show');

        Route::get('/create', 'create')->name('product.create');
        Route::post('/store', 'store')->name('product.store');

        Route::get('/delete/{id}', 'delete')->name('product.delete');
        Route::post('/destroy', 'destroy')->name('product.destroy');

        Route::get('/edit/{id}', 'edit')->name('product.edit');
        Route::post('/update', 'update')->name('product.update');
    });
Route::get('/info', function () {
    echo phpinfo();
});
