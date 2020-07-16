<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class MyProfileComponent extends Component {
    use WithFileUploads;

    public $user;
    public $email;
    public $photo;

    public function mount() {
        $this->user = Auth::user();
        $this->email = $this->user->email;
        $this->photo = null;
    }

    public function updated() {
        $this->validate( [
            'email' => 'required|email',
            'photo' => 'nullable|image|max:200',
        ] );

        if ( ! is_null( $this->photo ) ) {
            $filename    = $this->photo->store( 'photos' );
            $this->user->photo = $filename;
        }
        $this->user->email = $this->email;
        $this->user->save();

        $this->photo = null;
    }

    public function deletePhoto(  ) {
        User::where('id',auth()->id())
            ->update(['photo' => null]);

        $this->user = User::find(Auth::id());
    }

    public function deleteMyAccount() {
        sleep(5);
        User::destroy(auth()->id());
        Auth::logout();
        return redirect('/');
    }

    public function render() {
        return view( 'livewire.my-profile-component', [
            'user' => $this->user
        ] );

    }
}
