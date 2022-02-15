<?php

namespace App;

use App\Priority;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $guarded = ['id'];
    protected $dates = ['end_date', 'start_date', 'start_time', 'end_time'];

    public function priority()
    {
        return $this->belongsTo(Priority::class)->withDefault(['name'=>'Semua Priority']);
    }

    public function scopeDateBetween($query, $start, $end)
    {
        return $query->whereBetween('start_date', [$start, $end]);
    }
    public function scopesearch($query, $term)
    {
        if (strlen($term) > 2) {
            $term = "%$term%";
            $query->where(function ($query) use ($term) {
                $query->Where('title', 'Like', $term);
            });
        }
    }
}
