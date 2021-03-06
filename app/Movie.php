<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Movie extends Model
{
	
    protected $fillable = [
        'name',
        'director',
        'imageURL',
        'duration',
        'releaseDate',
        'genres'
    ];

	public function getGenresAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setGenresAttribute($value)
    {
        $this->attributes['genres'] = json_encode($value);
    }

    public static function search($term, $take, $skip){
        return Movie::where('name', 'like', "%$term%")->skip($skip)->take($take)->get();
    }
}
