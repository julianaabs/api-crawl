<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';

    protected $fillable = [
        'movie_id', 'title', 'description', 'producer', 'year' 
    ];

    public $timestamps = false;
}
