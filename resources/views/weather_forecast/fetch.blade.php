<!-- resources/views/weather_forecast/fetch.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        @include('nav')

        <h1>Fetch Weather</h1>

        <form method="post" action="{{ route('weather_forecast.fetch') }}">
            @csrf

            <div class="form-group">
                <label for="city">Enter City:</label>
                <input type="text" id="city" name="city" required>
            </div>

            <button type="submit" class="razmakbutton">Fetch Weather</button>
        </form>
    </div>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection