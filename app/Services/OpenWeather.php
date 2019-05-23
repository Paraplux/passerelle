<?php 

namespace App\Services;

class OpenWeather 
{

    private $apiKey;

    public function __construct(string $apiKey) 
    {

        $this->apiKey = $apiKey;

    }

    public function getForecast($city) : ?array 
    {
        $curl = curl_init("http://api.openweathermap.org/data/2.5/weather?q=$city&APPID={$this->apiKey}&units=metric&lang=fr");
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER  => true, 
            CURLOPT_TIMEOUT         => 1, 
            CURLOPT_CAINFO         => '../certificates/cert.cer'
        ]);
        $data = curl_exec($curl);
        if ($data === false || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) {
            return null;
        }
        $data = json_decode($data, true);
        return $data;
    }

}