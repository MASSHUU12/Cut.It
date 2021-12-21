<?php

namespace App\Http\Controllers;

class CreateShortenedLink extends Controller
{
    public function validateUrl()
    {
        $data = request();

        echo $data["url"] . '<br />';

        //return redirect("/");
    }
}
