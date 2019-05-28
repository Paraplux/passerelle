<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;

class ChoixCategoryController extends Controller
{
    public function pro ()
    {
        
        $cookieKey = 'passerelle-numerique-choix-category';

        $cookieStatus = Cookie::get($cookieKey);

        if($cookieStatus === 'part') {
            Cookie::queue(Cookie::forget($cookieKey));
        } 
        return back()->cookie($cookieKey, 'pro', 1 * 60 * 24 * 365);
    }
    public function part ()
    {
        $cookieKey = 'passerelle-numerique-choix-category';

        $cookieStatus = Cookie::get($cookieKey);

        if($cookieStatus === 'pro') {
            Cookie::queue(Cookie::forget($cookieKey));
        }
        return back()->cookie($cookieKey, 'part', 1 * 60 * 24 * 365);
    }
}
