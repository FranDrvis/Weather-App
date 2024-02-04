<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        @include('nav')

        <div class="row left-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @auth
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <p>Dobrodošao, {{ Auth::user()->name }}!</p>
                            @if (Auth::user()->group)
                                <p>Vaša grupa: {{ Auth::user()->group->name }}</p>
                            @endif
                        @else
                            <p>{{ __('You are not logged in.') }}</p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection