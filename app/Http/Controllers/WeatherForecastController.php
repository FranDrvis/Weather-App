<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenWeatherMapService;
use App\Models\WeatherForecast;

class WeatherForecastController extends Controller
{
    protected $openWeatherMap;

    public function __construct(OpenWeatherMapService $openWeatherMap)
    {
        $this->openWeatherMap = $openWeatherMap;
    }

    public function showFetchForm()
    {
        return view('weather_forecast.fetch');
    }

    public function fetchWeather(Request $request)
    {
        $city = $request->input('city');
        $apiKey = config('services.openweathermap.api_key');

        // Fetch weather data from OpenWeatherMap API
        $weatherData = $this->openWeatherMap->getWeatherByCity($city, $apiKey);

        // Store weather data in the database
        WeatherForecast::create([
            'city_name' => $weatherData['name'],
            'temperature' => $weatherData['main']['temp'],
            'humidity' => $weatherData['main']['humidity'],
            'description' => $weatherData['weather'][0]['description'],
        ]);

        return redirect()->route('weather_forecast.list')->with('success', 'Weather data fetched and stored successfully.');
    }

    public function search(Request $request)
    {
        $city = $request->input('search_city');
        $weatherForecasts = WeatherForecast::where('city_name', 'LIKE', '%' . $city . '%')->get();

        return view('weather_forecast.list', compact('weatherForecasts', 'city'));
    }

    public function list()
    {
        $weatherForecasts = WeatherForecast::all();

        return view('weather_forecast.list', compact('weatherForecasts'));
    }

    public function edit($id)
    {
        $weatherForecast = WeatherForecast::findOrFail($id);
        return view('weather_forecast.edit', compact('weatherForecast'));
    }

    public function update(Request $request, $id)
    {
        $weatherForecast = WeatherForecast::findOrFail($id);
        $weatherForecast->update($request->all());

        return redirect()->route('weather_forecast.list')
            ->with('success', 'Weather forecast updated successfully');
    }

    public function destroy($id)
    {
        WeatherForecast::findOrFail($id)->delete();
        return redirect()->route('weather_forecast.list')
            ->with('success', 'Weather forecast deleted successfully');
    }
}
