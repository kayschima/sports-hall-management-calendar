<?php

namespace App\Http\Livewire;

use App\Hall;
use Livewire\Component;

class HallsComponent extends Component {

    public ?int $hallid;
    public ?string $hallname;
    public ?string $halldescription;
    public bool $isDialogVisible;

    public function mount() {
        $this->hallid          = null;
        $this->hallname        = null;
        $this->halldescription = null;
        $this->isDialogVisible = false;
    }

    public function addHall( $id, $name, $description ) {
        $this->hallid          = $id;
        $this->hallname        = $name;
        $this->halldescription = $description;
        $this->isDialogVisible = true;
    }

    public function deleteHall( int $id ) {
        Hall::destroy( $id );
    }

    public function closeDialog() {
        $this->isDialogVisible = false;
    }

    public function addUpdateHall() {
        $this->validate( [
            'hallname' => 'required',
        ] );

        Hall::updateOrCreate(
            [ 'id' => $this->hallid ],
            [
                'id'          => $this->hallid,
                'name'        => $this->hallname,
                'description' => $this->halldescription ?? '',
            ]
        );

        $this->isDialogVisible = false;
    }

    public function render() {
        return view( 'livewire.halls-component', [
            'halls' => Hall::all(),
            'isDialogVisible' => $this->isDialogVisible,
        ] );
    }
}
