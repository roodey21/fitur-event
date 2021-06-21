<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

use App\Event;

class Inkubator extends Model
{
    protected $table = 'inkubators';

    public function events()
    {
        return $this->hasMany(Event::class, 'inkubator_id');
    }
}
