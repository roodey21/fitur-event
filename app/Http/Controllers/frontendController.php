<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class frontendController extends Controller
{
    public function find(Event $event){
        $data = $event;
        $relationalEvent = $data->priority->event->load('priority')->where('publish', '1')->whereNotIn('id',[$data->id])->take(4);
        $random = Event::with('priority')->where([
                ['publish','=', '1'],
                ['priority_id','!=',$data->priority->id]
            ])->take(4)->get();
        return view('front.detail',compact('data','relationalEvent','random'));
    }
}
