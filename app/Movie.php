<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	
    protected $fillable = [

    ];

	public function getGenresAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setGenresAttribute($value)
    {
        $this->attributes['genres'] = json_encode($value);
    }
}
