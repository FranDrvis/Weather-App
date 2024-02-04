<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminPage()
    {
        return view('pages.page');
    }

    public function anotherPage()
    {
       $this->authorize('view-user-list');

        $users = User::with('group')->get();
       // dd($users);
        return view('user.pager', compact('users'));
    }

    public function userList()
    {
        // Ensure the user is in the 'admin' group
        $this->authorize('view-user-list');

        $users = User::with('group')->get();
        //dd($users);
        return view('user.list', compact('users'));
    }
}
