<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class MyProfileComponent extends Component
{
    use WithFileUploads;

    public $user;
    public $email;
    public $photo;

    public function mount()
    {
        $this->user  = Auth::user();
        $this->email = $this->user->email;
        $this->photo = null;
    }

    public function updated()
    {
        $this->validate([
            'email' => 'required|email',
            'photo' => 'nullable|image|max:1000',
        ]);

        if ( ! is_null($this->photo)) {
            // save image ...
            $filename          = $this->photo->store('photos');
            $this->user->photo = $filename;

            // ... and resize it
            Image::make($filename)
                 ->resize(300, null, function ($constraint) {
                     $constraint->aspectRatio();
                 })
                 ->save($filename, 80);
        }

        $this->user->email = $this->email;
        $this->user->save();

        $this->photo = null;
    }

    public function deletePhoto()
    {
        User::where('id', auth()->id())
            ->update(['photo' => null]);

        $this->user = User::find(Auth::id());
    }

    public function deleteMyAccount()
    {
        sleep(5);
        User::destroy(auth()->id());
        Auth::logout();

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.my-profile-component', [
            'user' => $this->user
        ]);

    }
}
