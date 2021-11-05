<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use App\Event;
use App\Http\Traits\eventLivewire;

class EventNextMonth extends Component
{
    use eventLivewire;
    public $searchNextMonth;
    public function render()
    {
        $cek = Event::whereYear('start_date', date('Y'))->whereMonth('start_date', strtotime(today() . "+1 Month"))->orderByDesc('start_date')->orderByDesc('start_time')->take($this->ada);
        return view('livewire.event-next-month', [
            'data' => $this->searchNextMonth == null ? $cek->get() : $cek->where('title', 'Like', '%' . $this->searchNextMonth . '%')->get(),
            'Message' => 'Event ' . date('F', strtotime(today() . "+1 Month")),
            'search' => 'searchNextMonth'
        ]);
    }
}
