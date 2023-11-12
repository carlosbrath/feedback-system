<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use App\Models\User;
use Illuminate\Http\Request;

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
        $users = User::all();

        return view('home', ['users' => $users]);
    }
    public function getConnections(Request $request)
    {
        $skipCounter = $request->input('skipCounter');
        $takeAmount = $request->input('takeAmount');

        $connections = Connection::all();
        $user = User::get();

        return response()->json($user);
    }
    public function getSuggestions(Request $request)
    {
        // $skipCounter = $request->input('skipCounter');
        // $takeAmount = $request->input('takeAmount');
        $user = User::get();

        // $view = view('components.suggestion', ['users' => $user]);

        return response()->json($user);
    }
    public function getRequests(Request $request)
    {
        $skipCounter = $request->input('skipCounter');
        $takeAmount = $request->input('takeAmount');
        $user = User::get();

        $view = view('components.suggestion', ['users' => $user]);

        return response()->json($user);
    }
    function feedback(){
        $data = '';
        return view('feedback', ['data' => $data]);
    }
}
