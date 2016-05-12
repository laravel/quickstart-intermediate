<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EdInfo extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * All attributes are mass assignable
     *
     * @var array
     */
    protected $guarded = [];
}
