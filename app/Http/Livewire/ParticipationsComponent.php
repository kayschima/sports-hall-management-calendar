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

    public function toggleParticipation( $user_id ) {
        TrainingTime::find( $this->trainingtime_id )->users()->toggle( [ $user_id ] );
    }

    public function render() {
        $participations = TrainingTime::with( [ 'users' ] )
                                      ->where( 'id', $this->trainingtime_id )->first();

        return view( 'livewire.participations-component', [
            'participations'       => $participations,
            'maxSlots'             => $participations->slots,
            'alreadyParticipating' => $participations->users->pluck( 'id' )->contains( auth()->id() )
        ] );
    }
}
