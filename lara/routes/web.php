<?php

use Illuminate\Support\Facades\Route;
use Dbfx\LaravelStrapi\LaravelStrapi;



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

Route::get('/', [\App\Http\Controllers\BlogController::class, 'home']);

Route::get('/test', function () {
    $strapi = new LaravelStrapi();
    // dd($strapi);
    // dd($strapi->collection('blogs'));
    return $blogs = $strapi->collection('blogs');
});

