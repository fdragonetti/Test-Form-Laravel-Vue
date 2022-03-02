<?php

namespace App\DatabaseJson\Models;

use DatabaseJson\Model;

class Contact extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    // public $timestamps = false;
    // protected $guarded = [];

    protected $fillable = [
        'name',
        'surname',
        'email',
    ];
}
