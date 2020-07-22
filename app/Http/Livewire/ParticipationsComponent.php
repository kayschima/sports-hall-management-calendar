<?php

namespace App\Http\Livewire;

use App\Participation;
use App\TrainingTime;
use Livewire\Component;

class ParticipationsComponent extends Component {
    public $trainingtime_id;

    public function mount( $trainingtime_id ) {
        $this->trainingtime_id = $trainingtime_id;
    }

    public function attachParticipation() {
        Participation::create( [
            'training_time_id' => $this->trainingtime_id,
            'user_id'          => auth()->id()
        ] );
    }

    public function detachParticipation( $user_id ) {
        Participation::where( 'user_id', $user_id )
                     ->where( 'training_time_id', $this->trainingtime_id )
                     ->delete();
    }

    public function render() {
        $participations = Participation::with( [ 'user', 'trainingTime' ] )
                                       ->where( 'training_time_id', $this->trainingtime_id )->get();

        return view( 'livewire.participations-component', [
            'participations'       => $participations,
            'maxSlots'             => TrainingTime::find( $this->trainingtime_id )->slots,
            'alreadyParticipating' => $participations->pluck( 'user.id' )->contains( auth()->id() )
        ] );
    }
}
