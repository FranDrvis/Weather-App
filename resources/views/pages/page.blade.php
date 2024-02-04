<!-- resources/views/admin/page.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
    @include('nav')
        <h1>Admin Pagee</h1>
        <p>This page is only accessible to users in the 'admin' group.</p>
    </div>
@endsection