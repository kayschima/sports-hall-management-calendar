<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UsersComponent extends Component {

    public function deleteUser( int $id ) {

        if ( auth()->id() === $id ) {
            Auth::logout();
        }
        User::destroy( $id );
    }

    public function render() {
        return view( 'livewire.users-component', [
            'users' => User::all(),
        ] );
    }
}
