<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    public function brands()
    {
        return $this->belongsToMany('App\Brand');
    }

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(4);
    }

}
