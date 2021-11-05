<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EventDetails extends Component
{
    public $title;
    public $evente;
    protected $listeners = [
        'getEvent' => 'ShowEvent'
    ];
    public function render()
    {
        return view('livewire.event-details');
    }

    public function ShowEvent($data)
    {
        $this->title = $data['title'];
        $this->evente = $data['foto'];
    }

    public function back()
    {
        $this->emit('back');
    }
}
