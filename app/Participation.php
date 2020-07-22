<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model {

    protected $guarded = [];

    public function user() {
        return $this->belongsTo( User::class );
    }

    public function trainingTime() {
        return $this->belongsTo( TrainingTime::class );
    }

}
