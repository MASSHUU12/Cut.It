<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class RedirectFromShortened extends Controller
{
    public function redirectFromShortened()
    {
        $url = ltrim("$_SERVER[REQUEST_URI]", "/");

        $result = DB::select('select original_link from shortened where shortened_link = :shortened_link', ['shortened_link' => $url]);
        DB::update('update shortened set last_used = ? where shortened_link = ?', [now(), $url]);

        if (sizeof($result) == 0)
            abort(404);
        else {
            foreach ($result as $r) {
                return redirect($r->original_link);
            }
        }
    }
}
