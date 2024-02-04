<!-- resources/views/weather_forecast/list.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        @include('nav')

        <h1>Weather Forecast List</h1>

        <form method="post" action="{{ route('weather_forecast.search') }}">
            @csrf

            <div class="form-group">
                <label for="search_city">Search by City:</label>
                <input type="text" id="search_city" name="search_city" required>
                <button type="submit">Search</button>
            </div>
        </form>

        @if(isset($city))
            <p>Search results for "{{ $city }}":</p>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>City Name</th>
                    <th>Temperature</th>
                    <th>Humidity</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($weatherForecasts as $weatherForecast)
                    <tr>
                        <td>{{ $weatherForecast->city_name }}</td>
                        <td>{{ round($weatherForecast->temperature - 273.15, 2) }}° C</td>
                        <td>{{ $weatherForecast->humidity }}</td>
                        <td>{{ $weatherForecast->description }}</td>
                        <td>{{ $weatherForecast->created_at->format('d.m.Y H:i:s') }}</td>
                        <td>{{ $weatherForecast->updated_at->format('d.m.Y H:i:s') }}</td>
                        <td>
                            <a href="{{ route('weather_forecast.edit', $weatherForecast->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('weather_forecast.destroy', $weatherForecast->id) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection