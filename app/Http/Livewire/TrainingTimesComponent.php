<?php

namespace App\Http\Livewire;

use App\Hall;
use App\Sports;
use App\TrainingTime;
use Carbon\Carbon;
use Livewire\Component;

class TrainingTimesComponent extends Component {
    public $sportid = null;
    public $hallid = null;
    public $allHalls;
    public $allSports;

    public $newID;
    public $newDescription;
    public $newSlots;
    public $newDate;
    public $newTime;
    public $newHallID;
    public $newSportID;

    public string $header = '';
    public bool $isDialogVisible;


    public function mount() {
        $this->allHalls = Hall::all();
        $this->hallid   = session()->get( 'shmc_hallid', 1 );

        $this->allSports = Sports::all();
        $this->sportid   = session()->get( 'shmc_sportid', 1 );

        $this->newID          = null;
        $this->newDescription = null;
        $this->newHallID      = null;
        $this->newSportID     = null;
        $this->newSlots       = config( 'shmc.defaultslots' );
        $this->newDate        = Carbon::now()->format( config( 'shmc.dateformat' ) );
        $this->newTime        = Carbon::now()->format( config( 'shmc.timeformat' ) );

        $this->isDialogVisible = false;
    }

    public function updated( $name, $value ) {
        session()->put( 'shmc_sportid', $this->sportid );
        session()->put( 'shmc_hallid', $this->hallid );
    }


    public function addTrainingtime( $id ) {
        if ( is_null( $id ) ) {
            $this->header         = __( 'Add trainingtime' );
            $this->newID          = null;
            $this->newDescription = '';
            $this->newSportID     = $this->sportid;
            $this->newHallID      = $this->hallid;
            $this->newSlots       = config( 'shmc.defaultslots' );
            $this->newDate        = Carbon::now()->format( config( 'shmc.dateformat' ) );
            $this->newTime        = Carbon::now()->format( config( 'shmc.timeformat' ) );
        } else {
            $this->header         = __( 'Edit trainingtime' );
            $trainingtime         = TrainingTime::find( $id );
            $this->newID          = $trainingtime->id;
            $this->newDescription = $trainingtime->description;
            $this->newSportID     = $trainingtime->sports_id;
            $this->newHallID      = $trainingtime->hall_id;
            $this->newSlots       = $trainingtime->slots;
            $this->newDate        = $trainingtime->date->format( config( 'shmc.dateformat' ) );
            $this->newTime        = $trainingtime->time->format( config( 'shmc.timeformat' ) );
        }

        $this->isDialogVisible = true;
    }

    public function deleteTrainingtime( $trainingtime_id ) {
        TrainingTime::destroy( [ $trainingtime_id ] );
    }

    public function closeDialog() {
        $this->isDialogVisible = false;
    }

    public function addUpdateTrainingtime() {

        $this->validate( [
            'newDescription' => 'required',
            'newDate'        => 'required|date_format:' . config( 'shmc.dateformat' ),
        ] );

        TrainingTime::updateOrCreate(
            [ 'id' => $this->newID ],
            [
                'description' => $this->newDescription,
                'sports_id'   => $this->newSportID,
                'hall_id'     => $this->newHallID,
                'slots'       => $this->newSlots,
                'date'        => $this->newDate,
                'time'        => $this->newTime,
            ] );

        $this->isDialogVisible = false;
    }


    public function render() {
        $trainingstimes = TrainingTime::with( [ 'hall', 'sports' ] );

        if ( ! is_null( $this->sportid ) ) {
            $trainingstimes = $trainingstimes->where( 'sports_id', $this->sportid );
        }
        if ( ! is_null( $this->hallid ) ) {
            $trainingstimes = $trainingstimes->where( 'hall_id', $this->hallid );
        }

        $trainingstimes = $trainingstimes->withCount( 'users' )->get();

        return view( 'livewire.training-times-component', [
            'trainingtimes' => $trainingstimes,
            'allHalls'      => $this->allHalls,
            'allSports'     => $this->allSports
        ] );
    }
}
