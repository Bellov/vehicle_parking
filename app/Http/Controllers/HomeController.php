<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AvtoParking;

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

    public function index()
    {
        $parking_occupied = AvtoParking::sum('parking_spots');
        $parking_space = 20 - $parking_occupied;
        return view('home', compact('parking_space'));
    }
}
