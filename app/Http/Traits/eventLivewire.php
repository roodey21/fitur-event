<?php

namespace App\Http\Traits;

use App\Event;
use Illuminate\Support\Carbon;

/**
 * 
 */
trait eventLivewire
{

    public $description, $created, $image, $title, $mati;
    public $ada = 5;
    public function getModal($id)
    {
        $data = Event::findOrFail($id);
        Carbon::setLocale('id');
        $this->image = $data['foto'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->created = $data['start_date']->diffForHumans();
    }
    public function closeModal()
    {
        $this->image = null;
        $this->title = null;
        $this->description = null;
        $this->created = null;
    }

    public function addEvent()
    {
        // $count = Event::count(); //14
        // if ($this->ada <= $count) {
        //     $sisa = $count - $this->ada; //4
        //     $this->ada += 10;
        // }
        // if ($this->ada > $sisa) {
        //     $this->ada += $sisa;
        //     $this->mati = 'disabled';
        // }
        $this->ada += 10;
    }
}
