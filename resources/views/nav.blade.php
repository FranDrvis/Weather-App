<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/home">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                @can('viewUserList', App\Models\User::class)
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.page') }}">Admin Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.pager') }}">Admin another Page</a>
                    </li> -->
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.list') }}">Users list</a>
                    </li>
                    @endcan
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('weather_forecast.fetch.form') }}">Fetch Weather</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('weather_forecast.list') }}">Weather Forecast</a>
                    </li>
                    @endauth
                    <!-- Add more menu items as needed -->
                </ul>
            </div>
        </nav>