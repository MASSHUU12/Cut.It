<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateShortenedLink;
use App\Http\Controllers\LocaleController;
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

// Route for locale change
Route::get('language/{locale}', [LocaleController::class, "main"]);


// Home
Route::get('/', function () {
    return view('home');
});

// Privacy policy
Route::get('/privacy', function () {
    return view('privacy');
});

// Cookie policy
Route::get('/cookie', function () {
    return view('cookie');
});

// Route for URL processing and sending it to database
Route::post('/shorten', [CreateShortenedLink::class, "shortenForWeb"]);

// Redirect from shortened
Route::get('/{url}', [RedirectFromShortened::class, "redirectFromShortened"]);
