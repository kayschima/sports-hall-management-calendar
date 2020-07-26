<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingTime extends Model
{
    protected $guarded = [];
    protected $dates = [ 'date', 'time' ];

    public function hall() {
        return $this->BelongsTo( Hall::class );
    }

    public function sports() {
        return $this->BelongsTo( Sports::class );
    }

    public function users() {
        return $this->belongsToMany( User::class )->withTimestamps();
    }
}
