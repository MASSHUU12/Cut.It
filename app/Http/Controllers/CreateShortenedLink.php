<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use chillerlan\QRCode\{QRCode, QROptions};

//require_once('../../../vendor/autoload.php');

class CreateShortenedLink extends Controller
{
    public function validateUrl()
    {
        $data = request();
        $url = strtolower($data["url"]);

        if (filter_var($data["url"], FILTER_VALIDATE_URL)) {
            // shortening url using 8 bit crc32 hash
            // and uploading it to database
            $s = hash('crc32', $url);

            // check if duplicate
            // $result = DB::select('select original_link from shortened where original_link = :original_link', ['original_link' => $url]);
            // if (sizeof($result) == 0)
            //     DB::insert('insert into shortened (original_link, shortened_link, created_at, last_used) values (?, ?, ?, ?)', [$url, $s, now(), now()]);
            // else
            //     DB::update('update shortened set last_used = ? where original_link = ?', [now(), $url]); // if duplicate just update last_used

            return redirect('/')->with('status', 'Shortened successfully')->with('qr', $this->createQR($url))->with('url', $_SERVER['HTTP_HOST'] . '/' . $s);
        } else
            return redirect('/')->with('status', 'Invalid URL');
    }

    public function createQR($url)
    {
        $options = new QROptions(
            [
                'version' => 5,
                'eccLevel' => QRCode::ECC_L,
                'outputType' => QRCode::OUTPUT_IMAGE_PNG,
                'imageTransparent' => false,
            ]
        );
        return (new QRCode($options))->render($url);
    }
}
