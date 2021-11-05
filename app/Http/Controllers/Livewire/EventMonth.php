<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use App\Event;
use App\Http\Traits\eventLivewire;

class EventMonth extends Component
{
    use eventLivewire;
    public $searchMonth;
    public function mount()
    {
    }
    public function render()
    {
        $query = Event::whereYear('start_date', date('Y'))->whereMonth('start_date', date('m'))->orderByDesc('start_date')->orderByDesc('start_time')->take($this->ada);
        return view('livewire.event-month', [
            'data' => $this->searchMonth == null ? $query->get() : $query->where('title', 'like', '%' . $this->searchMonth . '%')->get(),
            'Message' => 'Event ' . date('F'),
            'search' => 'searchMonth'
        ]);
    }
}
