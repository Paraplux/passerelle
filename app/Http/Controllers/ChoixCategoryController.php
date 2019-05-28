<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;

class ChoixCategoryController extends Controller
{
    public function pro ()
    {
        $cookieKey = 'passerelle-numerique-choix-category'; 
        $cookieDelay = - 1 * 60 * 24 * 365;

        $cookieStatus = Cookie::get($cookieKey);

        if($cookieStatus === 'part') {
            Cookie::queue(Cookie::forget($cookieKey));
        }
        return back()->cookie($cookieKey, 'pro', $cookieDelay);
    }
    public function part ()
    {
        $cookieKey = 'passerelle-numerique-choix-category'; 
        $cookieDelay =  - 1 * 60 * 24 * 365;

        $cookieStatus = Cookie::get($cookieKey);

        if($cookieStatus === 'pro') {
            Cookie::queue(Cookie::forget($cookieKey));
        }
        return back()->cookie($cookieKey, 'part', $cookieDelay);
    }
}
