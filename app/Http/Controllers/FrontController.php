<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    private $maxPost = 8;

    public function index()
    {
        $events = Event::latest()->take($this->maxPost)->get();
        return view('layouts.front2', compact('events'));
    }
}
