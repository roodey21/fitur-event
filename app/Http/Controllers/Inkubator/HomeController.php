<?php

namespace App\Http\Controllers\Inkubator;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
        $event = Event::get();
        return view('inkubator.dashboard', compact('event'));
    }
}
