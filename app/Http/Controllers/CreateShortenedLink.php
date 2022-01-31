<?php

namespace App\Http\Controllers;

use App\Models\Link;
use chillerlan\QRCode\{QRCode, QROptions};

class CreateShortenedLink extends Controller
{
    public function validateUrl()
    {
        $data = request();
        $url = strtolower($data["url"]);

        if (filter_var($data["url"], FILTER_VALIDATE_URL)) {
            // Shortening url using 8 bit crc32 hash
            $s = hash('crc32', $url);

            // Check if it is a duplicate,
            // if yes update its date, otherwise send to database
            $result = Link::where('original_link', $url)->first();

            if ($result == "")
                Link::create([
                    'original_link' => $url,
                    'shortened_link' => $s,
                    'last_used' => now(),
                ]);
            else
                Link::where('original_link', $url)->update(['last_used' => now()]); // if duplicate just update last_used

            return redirect('/')->with('status', 'Shortened successfully')->with('qr', $this->createQR($url))->with('url', $_SERVER['HTTP_HOST'] . '/' . $s);
        } else
            return redirect('/')->with('status', 'Invalid URL');
    }

    // QR code generation
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
