<?php

namespace App\Http\Controllers\Livewire;

use Illuminate\Support\Carbon;
use App\Event;
use App\Priority;
use Livewire\Component;

class ListEvent extends Component
{
    public $filter, $status, $search, $waktu, $totalRecord;
    protected $queryString = ['filter', 'status', 'search', 'waktu'];
    public $get = 3;

    protected function data()
    {
        $model = Event::with('priority')->when($this->filter, function ($query) {
            $query->where('priority_id', $this->filter);
        })->when($this->status, function ($query) {
            $query->where('type', $this->status);
        })->when($this->waktu == "today", function ($query) {
            $query->where('start_date', today());
        })->when($this->waktu == "month", function ($query) {
            $query->whereYear('start_date', date('Y'))->whereMonth('start_date', date('m'));
        })->when($this->waktu == "nextmonth", function ($query) {
            $query->whereYear('start_date', date('Y'))->whereMonth('start_date', strtotime(today() . "+1 Month"));
        })->orderBy('start_date', 'desc')->orderByDesc('start_time')->where('publish', '1')->take($this->get)->get();
        $this->totalRecord = count($model);
        return $model;
    }
    public function loadMore()
    {
        $this->get += 3;
    }
    public function render()
    {
        $searchResult = [];
        if (strlen($this->search) > 2) {
            $searchResult = Event::Where('title', 'Like', "%$this->search%")->where('publish', '1')->get();
        }
        return view('livewire.list-event', [
            'category' => Priority::all(),
            'event' => $this->data(),
            'searchResult' => $searchResult
        ])->extends('layouts.front2')
            ->section('body');
    }
}
