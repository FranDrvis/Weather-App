<!-- resources/views/user/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        @include('nav')

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit User') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('user.update', ['id' => $user->id]) }}">
                            @csrf
                            @method('put')

                            <div class="form-group row razmak">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row razmak">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row razmak">
                                <label for="group_id" class="col-md-4 col-form-label text-md-right">{{ __('User Group') }}</label>
                                <div class="col-md-6">
                                    <!-- Assuming $userGroups is available in the view -->
                                    <select id="group_id" class="form-control" name="group_id" required>
                                        @foreach($userGroups as $group)
                                            <option value="{{ $group->id }}" {{ $user->group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update User') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection