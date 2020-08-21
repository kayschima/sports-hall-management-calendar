<?php

namespace App\Http\Controllers;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller {
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view( 'users' );
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myProfile() {
        return view( 'myprofile' );
    }
}
