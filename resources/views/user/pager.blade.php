<!-- resources/views/admin/page.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
    @include('nav')
        <h1>Admin page for edit</h1>
        <p>This page is only accessible to users in the 'admin' group.</p>

        @can('view-user-list')
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Group</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->group ? $user->group->name : 'N/A' }}</td>
                            <td>
                                <a href="{{ route('user.edit', ['id' => $user->id]) }}">Edit</a>
                                <form method="post" action="{{ route('user.delete', ['id' => $user->id]) }}" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>You do not have permission to view this page.</p>
        @endcan

    </div>
@endsection