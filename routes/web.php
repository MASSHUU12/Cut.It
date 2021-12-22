<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateShortenedLink;
use App\Http\Controllers\RedirectFromShortened;

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
    return view('home');
});

// route for URL processing and sending it to database
Route::post('/shorten', [CreateShortenedLink::class, "validateUrl"]);

// display shortened URL
Route::get('/shortened/{url}', function ($url) {
    return view('result');
});

// redirect from shortened
Route::get('/{url}', [RedirectFromShortened::class, "redirectFromShortened"]);
