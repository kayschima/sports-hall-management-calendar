<?php

namespace App\Http\Livewire;

use App\TrainingTime;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MyTrainingTimesComponent extends Component {

    public function cancelParticipation( $id ) {
        TrainingTime::find( $id )->users()->toggle( [ auth()->id() ] );
    }

    public function render() {
        return view( 'livewire.my-training-times-component', [
            'myTrainingTimes' => DB::table( 'training_time_user' )
                                   ->where( 'user_id', auth()->id() )
                                   ->join( 'training_times', 'training_times.id', '=', 'training_time_user.training_time_id' )
                                   ->join( 'halls', 'halls.id', '=', 'training_times.hall_id' )
                                   ->join( 'sports', 'sports.id', '=', 'training_times.sports_id' )
                                   ->select( 'training_time_user.id', 'training_times.date', 'training_times.time',
                                       'sports.name as sport', 'halls.name as hall', 'training_times.id as training_id' )
                                   ->get()
        ] );
    }
}
