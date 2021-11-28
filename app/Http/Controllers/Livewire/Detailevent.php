<?php

namespace App\Http\Controllers\Livewire;

use App\Event;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class Detailevent extends Component
{
    public $eventid;
    public function mount($id)
    {

        $this->eventid = Event::findOrFail($id);
    }
    public function render()
    {
        return view('livewire.detailevent')->extends('layouts.front2')->section('body');
    }
}
