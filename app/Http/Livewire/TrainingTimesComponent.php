<?php

namespace App\Http\Livewire;

use App\Hall;
use App\Sports;
use App\TrainingTime;
use Livewire\Component;

class TrainingTimesComponent extends Component
{
    public $sportid = null;
    public $hallid = null;
    public $allHalls;
    public $allSports;

    public function mount(  ) {
        $this->allHalls = Hall::all();
        $this->allSports = Sports::all();
    }
    public function render()
    {
        $trainingstimes = TrainingTime::with(['hall','sports']);

        if(!is_null($this->sportid)) {
            $trainingstimes = $trainingstimes->where('sports_id',$this->sportid);
        }
        if(!is_null($this->hallid)) {
            $trainingstimes = $trainingstimes->where('hall_id',$this->hallid);
        }

        $trainingstimes = $trainingstimes->withCount('participations')->get();

        return view('livewire.training-times-component', [
            'trainingtimes' => $trainingstimes,
            'allHalls' => $this->allHalls,
            'allSports' => $this->allSports
        ]);
    }
}
