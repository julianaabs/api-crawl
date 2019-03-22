<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table = 'characters';

    /** Permission to write on database. */
    protected $fillable = [
        'character_id', 'name', 'gender', 'age', 'eye_color', 'hair_color'
    ];

    /* Rules to validate data */
    public $rules = [
        'character_id' => 'unique:characters',
    ];

    public $timestamps = false;
}
