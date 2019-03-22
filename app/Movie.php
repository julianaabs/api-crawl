<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';

    /** Permission to write on database. */
    protected $fillable = [
        'movie_id', 'title', 'description', 'director', 'producer', 'year', 'rt_score'
    ];

    /* Rules to validate data */
    public $rules = [
        'movie_id' => 'unique:movies',
        'title' => 'unique:movies',
    ];

    public $timestamps = false;
}
