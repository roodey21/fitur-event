<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;

class Coba extends Component
{
    protected $listeners = ['queryToday' => 'dataToday'];
    public function render()
    {
        return view('livewire.coba');
    }
}
