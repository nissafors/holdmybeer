<?php

namespace App\Http\Controllers;

use App\Http\Requests;
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
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Home';
        $creatorURI = 'creator';
        $guideURI = 'guide';
        $tasterURI = 'taster';

        return view('home', compact('title', 'creatorURI', 'guideURI', 'tasterURI'));
    }
}
