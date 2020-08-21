<?php

namespace App\Http\Controllers;

/**
 * Class SportsController
 * @package App\Http\Controllers
 */
class SportsController extends Controller {
    /**
     * SportsController constructor.
     */
    public function __construct() {
        $this->middleware( [ 'auth', 'is_admin' ] );
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view( 'sports' );
    }
}
