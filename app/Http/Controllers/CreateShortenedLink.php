<?php

namespace App\Http\Controllers;

use App\Models\Link;
use chillerlan\QRCode\{QRCode, QROptions};
use Illuminate\Http\Request;

class CreateShortenedLink extends Controller
{
    public function validateLink($link)
    {
        $url = strtolower($link);

        if (filter_var($url, FILTER_VALIDATE_URL)) {
            // Shortening url using 8 bit crc32 hash
            $shortened = hash('crc32', $url);

            // Check if it is a duplicate,
            // if yes update its date, otherwise send to database
            $result = Link::where('original_link', $url)->first();

            if ($result == "")
                Link::create([
                    'original_link' => $url,
                    'shortened_link' => $shortened,
                    'last_used' => now(),
                ]);
            else
                Link::where('original_link', $url)->update(['last_used' => now()]); // if duplicate just update last_used
            return ["message" => $_SERVER['HTTP_HOST'] . '/' . $shortened, "qr" => $this->createQR($_SERVER['HTTP_HOST'] . '/' . $shortened)];
        } else return false;
    }

    public function shortenForWeb(Request $request)
    {
        $result = $this->validateLink($request->url);

        if (!$result) return redirect('/')->with('status', 'Invalid URL');
        else return redirect('/')->with(['status' => 'Shortened successfully', 'qr' => $result["qr"], 'url' => $result["message"]]);
    }

    public function shortenForApi(Request $request)
    {
        $result = $this->validateLink(implode($request->link));

        if (!$result) return ["message" => "Invalid link"];
        else return $result;
    }

    // QR code generator
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
