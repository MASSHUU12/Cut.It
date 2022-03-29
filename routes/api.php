<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateShortenedLink;
use App\Http\Controllers\RedirectFromShortened;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Get destination of shortened link
Route::get('/destination/{string}', [RedirectFromShortened::class, "redirectForApi"]);

// Shorten link
Route::post('/shorten', [CreateShortenedLink::class, "shortenForApi"]);
