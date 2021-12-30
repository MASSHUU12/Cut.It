<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class RedirectFromShortened extends Controller
{
    public function redirectFromShortened()
    {
        $url = ltrim("$_SERVER[REQUEST_URI]", "/");

        // Checks if the link is a shortened link length, thus reducing the number of database queries
        if (strlen($url) < 8 || strlen($url) > 8) abort(404);

        $result = DB::select('select original_link from shortened where shortened_link = :shortened_link', ['shortened_link' => $url]);
        DB::update('update shortened set last_used = ? where shortened_link = ?', [now(), $url]);

        // If the database did not return the address,
        // move the user to the error page, otherwise move to the destination page
        if (sizeof($result) == 0)
            abort(404);
        else {
            foreach ($result as $r) {
                return redirect($r->original_link);
            }
        }
    }
}
