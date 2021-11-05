<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use App\Event;
use App\Http\Traits\eventLivewire;
use Livewire\WithPagination;

class EventAll extends Component
{
    use eventLivewire;
    public $searchAll;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
    }
    public function render()
    {
        return view('livewire.event-all', $this->AllEvent());
    }
    protected function AllEvent()
    {
        return [
            'data' => $this->searchAll === null ?
                Event::orderBy('start_date', 'desc')->orderByDesc('start_time')->paginate($this->ada) :
                Event::orderBy('start_date', 'desc')->orderByDesc('start_time')->where('title', 'like', '%' . $this->searchAll . '%')->take($this->ada)->get(),
            'Message' => 'All',
            'search' => 'searchAll'
        ];
    }
    public function addEvent()
    {
        $this->ada += 10;
    }
}
