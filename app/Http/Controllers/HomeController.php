<?php

namespace App\Http\Controllers;

use App\Result;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->getData();
        return view('home', $data);
    }

    public function getData()
    {
        $data['testCount'] = Result::where('name', Auth::user()->name)->count();
        $data['averageScore'] = Result::where('name', Auth::user()->name)
            ->avg('score');
        $data['lowestScore'] = Result::where('name', Auth::user()->name)
            ->min('score');
        $data['highestScore'] = Result::where('name', Auth::user()->name)
            ->max('score');
        $data['users'] = User::orderBy('created_at', 'desc')->get();
        $data['results'] = Result::orderBy('created_at', 'desc')->get();
        $data['userResults'] = Result::where('name', Auth::user()->name)
            ->orderBy('created_at', 'desc')->get();
        return $data;
    }
}
