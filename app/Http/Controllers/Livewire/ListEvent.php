<?php

namespace App\Http\Controllers\Livewire;

use Illuminate\Support\Carbon;
use App\Event;
use App\Priority;
use Livewire\Component;

class ListEvent extends Component
{
    public $filter, $status, $search, $waktu;
    public function render()
    {
        return view('livewire.list-event', [
            'category' => Priority::all(),
            'event' => Event::with('priority')->when($this->filter, function ($query) {
                $query->where('priority_id', $this->filter);
            })->when($this->status, function ($query) {
                $query->where('type', $this->status);
            })->when($this->waktu == "today", function ($query) {
                $query->where('start_date', today());
            })->when($this->waktu == "month", function ($query) {
                $query->whereYear('start_date', date('Y'))->whereMonth('start_date', date('m'));
            })->when($this->waktu == "nextmonth", function ($query) {
                $query->whereYear('start_date', date('Y'))->whereMonth('start_date', strtotime(today() . "+1 Month"));
            })->search(trim($this->search))->orderBy('start_date', 'desc')->orderByDesc('start_time')->get()
        ])->extends('layouts.front2')
            ->section('body');
    }
}
