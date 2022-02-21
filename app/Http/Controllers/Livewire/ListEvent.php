<?php

namespace App\Http\Controllers\Livewire;


use App\{Event,Priority};
use Livewire\{Component,WithPagination};
class ListEvent extends Component
{
    public $filter, $status, $search, $waktu, $totalRecord,$cek,$slug;
    protected $queryString = ['filter', 'status', 'search', 'waktu'];
    public $get = 8;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    protected function data()
    {
        $model = Event::with('priority')
            ->when($this->filter, function ($query) {
                $query->where('priority_id', $this->filter);
            })
            ->when($this->status && $this->status !='all', function ($query) {
                $query->where('type', $this->status);
            })
            ->when($this->waktu == "today", function ($query) {
                $query->where('start_date', today());
            })
            ->when($this->waktu == "this-week", function ($query) {
                $hari = date('Y-m-d',strtotime('mon'));
                $cek = date('Y-m-d', strtotime(today()));
                if ($hari == $cek) {
                    # code...
                    $senin = $hari;
                }else{
                    $senin = date('Y-m-d',strtotime('-7 days mon'));
                }
                $minggu = date('Y-m-d',strtotime('sun'));
                $query->whereBetween('start_date',[$senin,$minggu]);
            })
            ->when($this->waktu == "next-week", function ($query) {
                $hari = date('Y-m-d',strtotime('mon'));
                $cek = date('Y-m-d', strtotime(today()));
                if ($hari != $cek) {
                    # code...
                    $nextsenin = date('Y-m-d',strtotime('mon'));
                }else{
                    $nextsenin = date('Y-m-d',strtotime('+7 days mon'));
                }
                $nextminggu = date('Y-m-d',strtotime('sun +7 days'));
                $query->whereBetween('start_date',[$nextsenin,$nextminggu]);
            })
            ->when($this->waktu == "next-week", function ($query) {
                $query->where('start_date', today());
            })
            ->when($this->waktu == "this-month", function ($query) {
                $query->whereYear('start_date', date('Y'))->whereMonth('start_date', date('m'));
            })
            ->when($this->waktu == "next-month", function ($query) {
                $query->whereYear('start_date', date('Y'))->whereMonth('start_date', strtotime(today() . "+1 Month"));
            })->search($this->search);

            if ($this->filter || $this->status || $this->waktu || strlen($this->search) > 3 ) {
                # code...
                $this->cek = false;
                return $model->orderBy('start_date', 'desc')->orderByDesc('start_time')->where('publish', '1')->paginate(8);
            }else{
                $this->resetPage();
                $this->cek = true;
                $counting = $model->orderBy('start_date', 'desc')->orderByDesc('start_time')->where('publish', '1')->take($this->get)->get();
                $this->totalRecord = count($counting);
                return $counting;
                
            }
        
    }
    public function loadMore()
    {
        $this->get += 4;
    }
    public function resetWaktu(){
        $this->reset('waktu');
    }
    public function resetFilter(){
        $this->reset('filter');
    }
    public function resetStatus(){
        $this->reset('status');
    }
    public function resetSearch(){
        $this->reset('search');
    }
    public function render()
    {
        return view('livewire.listEvent', [
            'category' => Priority::all(),
            'event' => $this->data(),
        ])->extends('layouts.front2')->section('body');
    }
}