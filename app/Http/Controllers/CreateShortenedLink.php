<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CreateShortenedLink extends Controller
{
    public function validateUrl()
    {
        $data = request();
        $url = $data["url"];

        if (filter_var($data["url"], FILTER_VALIDATE_URL)) {
            // shortening url using 8 bit crc32 hash
            // and uploading it to database
            $s = hash('crc32', $url);

            DB::insert('insert into shortened (originalLink, shortenedLink, created_at) values (?, ?, ?)', [$url, $s, now()]);

            return redirect('/')->with('status', 'Shortened successfully')->with('url', $_SERVER['HTTP_HOST'] . '/' . $s);
        } else
            return redirect('/')->with('status', 'Invalid URL');
    }
}
