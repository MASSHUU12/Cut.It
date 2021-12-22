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

// Route for locale change
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});

Route::get('/', function () {
    return view('home');
});

// route for URL processing and sending it to database
Route::post('/shorten', [CreateShortenedLink::class, "validateUrl"]);

// redirect from shortened
Route::get('/{url}', [RedirectFromShortened::class, "redirectFromShortened"]);
