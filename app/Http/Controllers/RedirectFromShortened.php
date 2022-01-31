<?php

namespace App\Http\Controllers;

use App\Models\Link;

class RedirectFromShortened extends Controller
{
    public function redirectFromShortened()
    {
        $url = ltrim("$_SERVER[REQUEST_URI]", "/");

        // Checks if the link is a shortened link length, thus reducing the number of database queries
        if (strlen($url) < 8 || strlen($url) > 8) abort(404);

        $result = Link::where('shortened_link', $url)->first();

        // If the database did not return the address,
        // move the user to the error page, otherwise move to the destination page
        if (strlen($result->original_link) <= 8) abort(404);
        else {
            Link::where('shortened_link', $url)->last_used = now();
            return redirect($result->original_link);
        }
    }
}
