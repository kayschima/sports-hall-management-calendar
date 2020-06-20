<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingTime extends Model
{
    protected $guarded = [];

    public function hall() {
        $this->belongsTo(Hall::class);
    }

    public function users() {
        $this->hasMany(User::class);
    }
}
