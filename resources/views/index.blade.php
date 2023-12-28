<table class="table">
    <thead>
        <tr>
            <th>Temperature</th>
            <th>Humidity</th>
            <th>Wind Speed</th>
            <!-- Add other fields as necessary -->
        </tr>
    </thead>
    <tbody>
        @foreach ($weatherData as $weather)
            <tr>
                <td>{{ $weather->temperature }}</td>
                <td>{{ $weather->humidity }}</td>
                <td>{{ $weather->wind_speed }}</td>
                <!-- Display other fields similarly -->
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('weather.create') }}" class="btn btn-primary">Add New Weather Data</a>
