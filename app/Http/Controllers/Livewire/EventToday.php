<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use App\Event;
use App\Http\Traits\eventLivewire;

class EventToday extends Component
{
    use eventLivewire;
    public $searchToday;
    public function render()
    {
        $query = Event::where('start_date', today())->orderByDesc('start_time')->take($this->ada);
        return view('livewire.event-today', [
            'data' => $this->searchToday === null ?
                $query->get() : $query->where('title', 'like', '%' . $this->searchToday . '%')->get(),
            'Message' => 'Event Hari ini',
            'search' => 'searchToday'
        ]);
    }
}
