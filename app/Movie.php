<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';

    protected $fillable = [
        'movie_id', 'title', 'description', 'director', 'producer', 'year', 'rt_score'
    ];

    public $timestamps = false;
}
