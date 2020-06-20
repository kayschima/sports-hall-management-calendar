<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    public function user(  ) {
        $this->belongsTo(User::class);
    }

    public function trainingTime(  ) {
        $this->belongsTo(TrainingTime::class);
    }

}
