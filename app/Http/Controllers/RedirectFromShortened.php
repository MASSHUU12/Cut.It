<?php

namespace App\Http\Controllers;

use App\Models\Link;

class RedirectFromShortened extends Controller
{
    public function getLink($url)
    {
        $result = Link::where('shortened_link', $url)->first();

        //If the database did not return the address,
        //return false, otherwise return original link
        if (empty($result->original_link)) return false;
        else {
            Link::where('shortened_link', $url)->last_used = now();
            return $result->original_link;
        }
    }

    public function redirectFromShortened()
    {
        $url = ltrim("$_SERVER[REQUEST_URI]", "/");
        $result = $this->getLink($url);

        if (!$result) abort(404);
        return redirect($result);
    }

    public function redirectForApi($link)
    {
        $result = $this->getLink($link);

        if (!$result) return ["message" => "There is no such link"];
        else return ["message" => $result];
    }
}
