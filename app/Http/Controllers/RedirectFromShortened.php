<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class RedirectFromShortened extends Controller
{
    public function redirectFromShortened()
    {
        $url = ltrim("$_SERVER[REQUEST_URI]", "/");

        $result = DB::select('select originalLink from shortened where shortenedLink = :shortenedLink', ['shortenedLink' => $url]);

        if (sizeof($result) == 0)
            abort(404);
        else {
            foreach ($result as $r) {
                return redirect($r->originalLink);
            }
        }
    }
}
