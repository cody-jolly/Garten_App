<?php


namespace App\Models;
use App\Models\User;
use Exception;

/**
 * Class Weather
 * @package App\Models
 */
// Retrieves weather data from openweathermap.org api
class Weather
{
    // http://api.openweathermap.org/data/2.5/weather?id={city id}&appid={your api key}
    private $url = "http://api.openweathermap.org/data/2.5/weather?";
    private $apiKey = "ccc468a6efa8437dc081b82b4aa20e47";
    private $cityName;

    public function __construct($newCity = "")
    {
        if(!empty($newCity)) {
            $this->cityName = $newCity;
        } else {
            $user = new User();
            $this->cityName = $user->getUserCity();
        }
    }

    // Return weather data assoc. array or exception message
    public function getWeatherData()
    {
        // Adapted from https://github.com/guzzle/guzzle for api requests
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->request('GET', $this->url . "q={$this->cityName}" . "&appid={$this->apiKey}" . "&lang=de");
        } catch (Exception $e) {
            return json_encode(["exception" => $e->getMessage()]);
        }

        //echo $response->getStatusCode(); // 200
        //echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
        return (string) $response->getBody();
    }
}