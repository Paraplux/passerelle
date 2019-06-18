<?php

namespace App\Http\Controllers;

use App\Question;
use App\Faq;
use App\Reponse;
use Illuminate\Support\Facades\Cookie;

class PartagerController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        $faqs = Faq::all();
        return view('partager.index', [
            'questions' => $questions,
            'faqs' => $faqs
        ]);
    }

    public function addQuestion()
    {
        Question::create([
            'question' => request('question'),
            'more' => request('more'),
            'mail' => request('mail'),
            'pseudo' => request('pseudo')
        ]);

        return back();
    }

    public function getQuestion()
    {
        $id = request('id');
        $question = Question::where('id', $id)->first();
        $reponses = Reponse::where('question_id', $id)->orderByDesc('thumbs_up')->get();

        return view('partager.question', [
            'question' => $question,
            'reponses' => $reponses
        ]);
    }

    public function addReponse()
    {
        $id = request('id');

        Reponse::create([
            'reponse' => request('reponse'),
            'pseudo' => request('pseudo'),
            'mail' => request('mail'),
            'question_id' => $id
        ]);

        return back();
    }

    public function vote()
    {
        $vote = request('vote');
        $id = request('id');
        $cookieKey = 'passerelle-numerique-vote_' . $id; 
        $cookieStatusUp = Cookie::get($cookieKey . '_up');
        $cookieStatusDown = Cookie::get($cookieKey . '_down');
        $cookieDelay = 1 * 60 * 24 * 365;

        if($vote == 'up') {
            if($cookieStatusUp == "true") {
                return back();
            } else if ($cookieStatusDown == "true") {
                Cookie::queue(Cookie::forget($cookieKey . '_down'));
                Reponse::where('id', $id)->decrement('thumbs_down');
            } 
            
            Reponse::where('id', $id)->increment('thumbs_up');
            return back()->cookie($cookieKey . '_up', 'true', $cookieDelay);

        } else if ($vote == 'down') {
            if($cookieStatusDown == "true") {
                return back();
            } else if ($cookieStatusUp == "true") {
                Cookie::queue(Cookie::forget($cookieKey . '_up'));
                Reponse::where('id', $id)->decrement('thumbs_up');
            }

            Reponse::where('id', $id)->increment('thumbs_down');
            return back()->cookie($cookieKey . '_down', 'true', $cookieDelay);
        }

        return back();

    }
}
