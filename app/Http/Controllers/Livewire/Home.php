<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.homes')->extends('layouts.front2')->section('body');
    }
}
