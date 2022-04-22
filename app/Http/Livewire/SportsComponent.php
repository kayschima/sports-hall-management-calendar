<?php

namespace App\Http\Livewire;

use App\Sports;
use Livewire\Component;

class SportsComponent extends Component
{
    public ?int $sportid = null;
    public ?string $sportname = null;
    public bool $isDialogVisible = false;

    public function addSport($id, $name)
    {
        $this->sportid         = $id;
        $this->sportname       = $name;
        $this->isDialogVisible = true;
    }

    public function deleteSport(int $id)
    {
        Sports::destroy($id);
    }

    public function closeDialog()
    {
        $this->isDialogVisible = false;
    }

    public function addUpdateSport()
    {
        $this->validate([
            'sportname' => 'required',
        ]);

        Sports::updateOrCreate(
            ['id' => $this->sportid],
            [
                'id'   => $this->sportid,
                'name' => $this->sportname
            ]
        );

        $this->isDialogVisible = false;
    }

    public function render()
    {
        return view('livewire.sports-component', [
            'sports'          => Sports::all(),
            'isDialogVisible' => $this->isDialogVisible,
        ]);
    }
}
