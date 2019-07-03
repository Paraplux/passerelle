<?php 

namespace App\Http\Controllers;

use App\Services\OpenWeather;
use App\Services\Location;
use App\Article;
use App\Fiche;
use App\Event;

class AccueilRepository {

    public function getWeather()
    {
        $location = new Location();
        $position = $location->getPosition();
        //Check if the ip is readable and return latitude and longitude
        if($position['city'] === null) {
            $city = 'Lille';
        } else {
            $city = $position['city'];
        }
        //Get Weather
        $weatherRequest = new OpenWeather('3154b6eaa845696b7a8ba58d1965be28');
        $results = $weatherRequest->getForecast($city);
    
        $weather = [
            'temp' => round($results['main']['temp']),
            'description' => $results['weather'][0]['description'],
            'status' => $results['weather'][0]['main'],
            'city' => $results['name']
        ];

        return $weather;
    }

    public function weatherAnimation($weahterStatus)
    {

        if($weahterStatus === 'Thunderstorm') {

            return '<i id="thunder-1" class="fas fa-bolt"></i><i id="thunder-2" class="fas fa-bolt"></i><i id="thunder-3" class="fas fa-cloud"></i>';
        
        } elseif ($weahterStatus === 'Rain' || $weahterStatus === 'Drizzle') {
            
            return '<i id="rain-1" class="fas fa-tint"></i><i id="rain-2" class="fas fa-tint"></i><i id="rain-3" class="fas fa-tint"></i><i id="rain-4" class="fas fa-cloud"></i>';
            
        } elseif ($weahterStatus === 'Snow') {
            
            return '<i id="snow-1" class="far fa-snowflake"></i><i id="snow-2" class="far fa-snowflake"></i><i id="snow-3" class="far fa-snowflake"></i>';
            
        } else if ($weahterStatus === 'Clear') {
            
            return '<i id="clear" class="fas fa-sun"></i>';
            
        } else if ($weahterStatus === 'Clouds') {
            
            return '<i id="clouds-1" class="fas fa-cloud"></i><i id="clouds-2" class="fas fa-cloud"></i>';
            
        } else {
            return '<i id="special" class="fas fa-exclamation"></i>';
        }
    }

    public function getArticles()
    {
        $articles = Article::all();

        return $articles;
    }

    public function getFormations ()
    {
        $formations = Fiche::with('structure.commune')->get();

        return $formations;
    }

    public function getEvents()
    {
        $events = Event::all();

        $array = array();

        foreach($events as $event) {
            $date = $event->calendarDate();
            $content = '<span>' . $event->name . '</span>';
        
            if(array_key_exists($date, $array)) {
                $array[$date] .= $content;
            } else {
                $array[$date] = $content;
            }
        }

        return $array;
    }

}