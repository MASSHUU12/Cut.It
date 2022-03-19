<?php

namespace App\Http\Controllers;

class LocaleController extends Controller
{
    public function main($locale)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
