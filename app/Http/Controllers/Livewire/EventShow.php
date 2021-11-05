<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use App\Event;

class EventShow extends Component
{

    public $statusDetails = false;
    public function render()
    {
        return view(
            'livewire.event-show',
            [
                'eventAll' => true,
                'eventHarian' => false,
                'monthActive' => false,
                'nextMonthActive' => false,
                'month' => date('F'),
                'NextMonth' => date("F", strtotime(today() . "+1 Month"))
            ]
        )->extends('layouts.front2')
            ->section('body');
    }
    /////////////////////////////Trigger/////////////////////////////////////
    public function getEvent($id)
    {
        $this->statusDetails = true;
        $data = Event::find($id);
        $this->emit('getEvent', $data);
    }

    public function getBulanIni()
    {
        $this->eventAll = false;
        $this->eventHarian = false;
        $this->monthActive = true;
        $this->nextMonthActive = false;
    }

    public function getBulanDepan()
    {
        $this->eventAll = false;
        $this->eventHarian = false;
        $this->monthActive = false;
        $this->nextMonthActive = true;
    }
    public function back()
    {
        $this->eventAll = true;
        $this->eventHarian = false;
        $this->monthActive = false;
        $this->nextMonthActive = false;
    }

    public function goToToday()
    {
        $this->eventAll = false;
        $this->eventHarian = true;
        $this->monthActive = false;
        $this->nextMonthActive = false;
    }
}
