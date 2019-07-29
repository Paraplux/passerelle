<?php

namespace App\Http\Controllers;

use App\Engagement;
use App\Keyword;
use Illuminate\Http\Request;

class EngagementsController extends Controller
{
    public function index() {
        {
            $data['charte'] = Engagement::firstOrFail();
            $data['keyword'] = Keyword::all();

            return view('nos-engagements', [
                'data' => $data,
            ]);
        }
    }
}
