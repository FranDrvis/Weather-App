<?php
// app/Services/OpenWeatherMapService.php

namespace App\Services;

use GuzzleHttp\Client;

class OpenWeatherMapService
{
    //protected $apiKey='f7c7aff293cd359dd32d8cb2e3ecb81e';
    protected $baseUrl = 'http://api.openweathermap.org/data/2.5/weather';

    // public function __construct($apiKey)
    // {
    //     $this->apiKey = $apiKey;
    // }

    public function getWeatherByCity($city,$apiKey)
    {
        $client = new Client();

        $response = $client->get($this->baseUrl, [
            'query' => [
                'q' => $city,
                'appid' => $apiKey,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
?>