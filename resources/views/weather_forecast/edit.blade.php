<!-- resources/views/weather_forecast/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        @include('nav')

        <h1>Edit Weather Forecast</h1>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('weather_forecast.update', $weatherForecast->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group razmak">
                <label for="city_name">City Name</label>
                <input type="text" class="form-control inputsize" id="city_name" name="city_name" value="{{ $weatherForecast->city_name }}" required>
            </div>

            <div class="form-group razmak">
                <label for="temperature">Temperature (Kelvin)</label>
                <input type="number" class="form-control inputsize" id="temperature" name="temperature" value="{{ $weatherForecast->temperature }}" step=".01" required>
            </div>
            <div class="form-group razmak">
                <label for="temperature">Temperature (°C)</label>
                <input type="number" readonly="readonly" class="form-control inputsize" id="temperature" name="temperature" value="{{ $weatherForecast->temperature-273.15 }}" required>
            </div>
            <div class="form-group razmak">
                <label for="humidity">Humidity</label>
                <input type="number" class="form-control inputsize" id="humidity" name="humidity" value="{{ $weatherForecast->humidity }}" required>
            </div>

            <div class="form-group razmak">
                <label for="description">Description</label>
                <input type="text" class="form-control inputsize" id="description" name="description" value="{{ $weatherForecast->description }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Weather Forecast</button>
        </form>
    </div>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection